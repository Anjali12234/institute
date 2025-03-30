<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\RequiredDocument;
use App\Http\Requests\StoreRequiredDocumentRequest;
use App\Http\Requests\UpdateRequiredDocumentRequest;
use Illuminate\Console\View\Components\Alert;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class RequiredDocumentController extends Controller
{
   
    public function index()
    {
        $requiredDocuments = RequiredDocument::latest()->paginate(10);
        return view('admin.requiredDocument.index',compact('requiredDocuments')); 
    }

   
    public function create()
    {
        return view('admin.requiredDocument.create');
    }

  
    public function store(StoreRequiredDocumentRequest $request)
    {
        RequiredDocument::create($request->validated());
        FacadesAlert::success("Data stored successfully");
        return redirect(route('admin.requiredDocument.index'));
    }

  
    public function edit(RequiredDocument $requiredDocument)
    {
        return view('admin.requiredDocument.edit',compact('requiredDocument'));
    }

   
    public function update(UpdateRequiredDocumentRequest $request, RequiredDocument $requiredDocument)
    {

        $requiredDocument->update($request->validated());
         FacadesAlert::success('RequiredDocument updated successfully');
        return redirect(route('admin.requiredDocument.index'));
    }

    public function destroy(RequiredDocument $requiredDocument)
    {
        $requiredDocument->delete();
         FacadesAlert::success('RequiredDocument deleted successfully');
        return back();
    }

    public function updateStatus(RequiredDocument $requiredDocument)
    {
        $requiredDocument->update([
            'status' => !$requiredDocument->status
        ]);
        toast('Status updated successfully', 'success');
        return back();
    }
}
