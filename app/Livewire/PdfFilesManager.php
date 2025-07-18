<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PdfFile;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class PdfFilesManager extends Component
{
    use WithFileUploads;

    public $pdf, $name = '';
    public $pdfId = null;
    public $editMode = false;


    protected $rules = [
        'name' => 'required|string|max:255',
        'pdf' => 'required|file|mimes:pdf|max:10240',
    ];

    protected $messages = [
        'pdf.required' => 'Please select a PDF file.',
        'pdf.mimes' => 'The file must be a PDF.',
        'pdf.max' => 'The file size cannot exceed 10MB.',
        'name.required' => 'Please enter a name for the PDF.',
    ];

    public function updatedPdf()
    {
        $this->validateOnly('pdf');
    }

    public function submit()
{
    try {
        $this->validate();

       $path = $this->pdf->store('pdf_files', 'public');

        PdfFile::create([
            'name' => $this->name,
            'file_path' => $path,
        ]);

        $this->reset(['pdf', 'name']);
        session()->flash('message', 'PDF uploaded successfully!');
    } catch (\Exception $e) {
        $this->addError('pdf', 'Upload failed. Please try again.');
    }
}

    public function download($id)
    {
        try {
            $pdf = PdfFile::findOrFail($id);

            if (!Storage::disk('public')->exists($pdf->file_path)) {
                session()->flash('error', 'File not found.');
                return;
            }

            return Storage::disk('public')->download($pdf->file_path, $pdf->name . '.pdf');
        } catch (\Exception $e) {
            Log::error('PDF Download Error: ' . $e->getMessage());
            session()->flash('error', 'Download failed.');
        }
    }

    public function delete($id)
    {
        try {
            $pdf = PdfFile::findOrFail($id);

            Storage::disk('public')->delete($pdf->file_path);
            $pdf->delete();

            session()->flash('message', 'PDF deleted successfully!');
        } catch (\Exception $e) {
            Log::error('PDF Delete Error: ' . $e->getMessage());
            session()->flash('error', 'Delete failed.');
        }
    }

    public function edit($id)
{
    $pdf = PdfFile::findOrFail($id);
    $this->pdfId = $pdf->id;
    $this->name = $pdf->name;
    $this->editMode = true;
}

public function update()
{
    try {
        $this->validate([
            'name' => 'required|string|max:255',
            'pdf' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        $pdfFile = PdfFile::findOrFail($this->pdfId);

        $path = $pdfFile->file_path;

        if ($this->pdf) {
            // Delete old file
            Storage::disk('public')->delete($pdfFile->file_path);

            // Store new one
            $path = $this->pdf->store('pdf_files', 'public');
        }

        $pdfFile->update([
            'name' => $this->name,
            'file_path' => $path,
        ]);

        $this->reset(['pdf', 'name', 'pdfId', 'editMode']);
        session()->flash('message', 'PDF updated successfully!');
    } catch (\Exception $e) {
        Log::error('PDF Update Error: ' . $e->getMessage());
        $this->addError('pdf', 'Update failed. Please try again.');
    }
    }

    public function render()
    {
        return view('livewire.pdf-files-manager', [
            'pdfs' => PdfFile::latest()->get(),
        ]);
    }
}
