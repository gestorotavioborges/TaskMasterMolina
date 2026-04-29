<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trabalho;
use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|file|max:10240',
        ]);

        $trabalho = Trabalho::findOrFail($id);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            
            $originalName = $file->getClientOriginalName();
            
            $path = $file->store('attachments', 'public');

            Attachment::create([
                'trabalho_id' => $trabalho->id,
                'file_name' => $originalName,
                'file_path' => $path,
            ]);
        }

        return back()->with('success', 'Arquivo anexado com sucesso!');
    }

    public function destroy($id)
    {
        $attachment = Attachment::findOrFail($id);
        
        Storage::disk('public')->delete($attachment->file_path);
        
        $attachment->delete();

        return back()->with('success', 'Anexo removido.');
    }
}

