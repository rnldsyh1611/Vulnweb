<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function showUploadForm()
    {
        return view('halaman.upload');
    }

    public function processUpload(Request $request)
    {
        // Simpan file tanpa validasi dan sanitasi
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Simpan langsung ke folder public/uploads tanpa validasi apa pun
            $file->move(public_path('uploads'), $file->getClientOriginalName());

            return redirect('/upload')->with('success', 'File berhasil diupload tanpa validasi.');
        }

        return redirect('/upload')->with('error', 'Tidak ada file yang diupload.');
    }
}
