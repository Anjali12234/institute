<?php

namespace App\Livewire;

use App\Models\Bill;
use App\Models\Student;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class StudentFormLivewire extends Component
{
    public Student $student;
    public ?Bill $bill = null;

    public $received_amount = 0;
    public $due = 0;
    public $paid_by;
    public $payment_type;
    public $remarks;

    public function mount(Student $student, Bill $bill = null)
    {
        $this->student = $student;
        $this->bill = $bill;

        // Prefill values if editing
        if ($this->bill) {
            $this->received_amount = $this->bill->received_amount;
            $this->due = $this->bill->due;
            $this->paid_by = $this->bill->paid_by;
            $this->payment_type = $this->bill->payment_type;
            $this->remarks = $this->bill->remarks;
        } else {
            $latestBill = $student->bills()->latest()->first();
            $this->due = $latestBill ? $latestBill->due : ($student->course->fee ?? 0);
        }
    }

    public function updatedReceivedAmount($value)
    {
        $totalFee = $this->student->course->fee ?? 0;
        $received = (float) $value;

        if ($received > $totalFee) {
            $received = $totalFee;
            $this->received_amount = $totalFee;
        }

        $latestBill = $this->student->bills()->latest()->first();
        $previousDue = $latestBill ? $latestBill->due : $totalFee;

        $this->due = max(0, $previousDue - $received);
    }

    public function save()
    {
        $this->validate([
            'received_amount' => 'required|numeric|min:0',
            'due' => 'required|numeric|min:0',
            'paid_by' => 'required|string|max:255',
            'payment_type' => 'required|string|max:255',
            'remarks' => 'nullable|string|max:500',
        ]);

        if ($this->bill) {
            // Update existing bill
            $this->bill->update([
                'received_amount' => $this->received_amount,
                'due' => $this->due,
                'paid_by' => $this->paid_by,
                'payment_type' => $this->payment_type,
                'remarks' => $this->remarks,
                'billing_date' => now(),
            ]);

            Alert::success('Bill Updated Successfully');
        } else {
            // Create new bill
            dd($this);

            Bill::create([
                'student_id' => $this->student->id,
                'received_amount' => $this->received_amount,
                'due' => $this->due,
                'paid_by' => $this->paid_by,
                'payment_type' => $this->payment_type,
                'remarks' => $this->remarks,
                'billing_date' => now(),
            ]);

            Alert::success('Bill Added Successfully');
        }

        return redirect(route('admin.bill.index'));
    }

    public function render()
    {
        return view('livewire.student-form-livewire', [
            'paymentTypes' => \App\Enums\PaymentMethod::cases(),
        ]);
    }
}
