<?php

namespace App\Http\Controllers;

use App\Models\Certificat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CertificatController extends Controller
{
    

public function create() {
    return view('certificats.create');
}

public function store(Request $request) {
    $certificat = Certificat::create($request->all());
    return redirect()->route('certificats.pdf', $certificat);
}

public function generatePDF($id) {
    $certificat = Certificat::findOrFail($id);

    // ⚠️ On envoie deux fois le même certificat pour remplir la page
    $pdf = Pdf::loadView('certificats.pdf', [
        'certificat1' => $certificat,
        'certificat2' => $certificat
    ])->setPaper('A4', 'landscape');
    

    return $pdf->stream('certificat.pdf'); // ou ->download() si tu veux le téléchargement
}

}
