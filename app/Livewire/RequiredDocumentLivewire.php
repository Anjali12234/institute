<?php

namespace App\Livewire;

use Livewire\Component;

class RequiredDocumentLivewire extends Component
{
    public $courseID;
    public $studentID;
    public $requiredDocuments = [];

    public function mount($courseID = null)
    {
        $this->requiredDocuments = [['document_title' => '']];
        $this->requiredDocuments = [['document' => '']];
    }

    public function loadCourse()
    {
        $product = Product::with('productKeyFeatures','productSteps')->findOrFail($this->productId);

        $this->title = $product->title;
        $this->bg_title = $product->bg_title;
        $this->description = $product->description;
        $this->product_category_id = $product->product_category_id;
        $this->productKeyFeatures = $product->productKeyFeatures->map(function ($keyFeature) {
            return ['feature' => $keyFeature->feature];
        })->toArray();
        $this->productSteps = $product->productSteps->map(function ($productStep) {
            return [
                'step_no' => $productStep->step_no,
                'step_name' => $productStep->step_name,
                'image' => $productStep->image,
                'product_name' => $productStep->product_name,
                'coat' => $productStep->coat
            ];
        })
        ->toArray();
    }
    public function render()
    {
        return view('livewire.required-document-livewire');
    }
}
