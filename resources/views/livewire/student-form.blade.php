<div class="mb-4">
    <label for="student_type" class="inline-block mb-2 text-base font-medium">
        Student Type <span class="text-red-500">*</span>
    </label>
    <select wire:model="selectedStudentType" class="form-select" id="student_type" name="student_type">
        <option selected="" disabled="" value="">Choose...</option>
        @foreach ($studentTypes as $type)
            <option value="{{ $type->value }}">{{ $type->label() }}</option>
        @endforeach
    </select>
</div>

<!-- DOB Field (Visible Only for Admission) -->
@if ($showAdmissionFields)
    <div class="mb-4">
        <label for="d_o_b" class="inline-block mb-2 text-base font-medium">
            Date of Birth <span class="text-red-500">*</span>
        </label>
        <input type="date" class="form-input" id="d_o_b" name="d_o_b">
    </div>

    <!-- Admission Date Field -->
    <div class="mb-4">
        <label for="admission_date" class="inline-block mb-2 text-base font-medium">
            Admission Date <span class="text-red-500">*</span>
        </label>
        <input type="date" class="form-input" id="admission_date" name="admission_date">
    </div>
@endif