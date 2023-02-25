<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use PDF;

class PdfController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function exportPdf()
    {
        $teste = 'Variável dinamica';
        $pdf = PDF::loadView('index', compact('teste'));
        $fileName = time() . '.' . 'pdf';
        Storage::disk('pdf')->put($fileName, $pdf->output());
        $fileUrl = Storage::disk('pdf')->url($fileName);

        return $fileUrl;
    }
}
