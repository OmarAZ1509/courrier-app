<?php

namespace App\Http\Controllers;

use App\Models\Courrier;
use App\Models\PieceJointe;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class CourrierController extends Controller
{
    /**
     * Affiche la liste des courriers.
     */
    public function index()
    {
        $courriers = Courrier::with('service', 'user')->latest()->get();
        return view('courriers.index', compact('courriers'));
    }

    /**
     * Affiche le formulaire de création d’un courrier.
     */
    public function create()
    {
        $services = Service::all();
        $users = User::all();
        return view('courriers.create', compact('services', 'users'));
    }

    /**
     * Enregistre un nouveau courrier.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'reference' => 'required|string|max:255',
        'objet' => 'required|string',
        'date_courrier' => 'required|date',
        'type' => 'required|in:entrant,sortant',
        'expediteur' => 'nullable|string|max:255',
        'destinataire' => 'nullable|string|max:255',
        'service_id' => 'required|exists:services,id',
        'user_id' => 'required|exists:users,id',
        'observations' => 'nullable|string',
        'pieces_jointes.*' => 'file|mimes:pdf,jpg,jpeg,png,doc,docx|max:2048',
    ]);

    // 1. Créer d'abord le courrier
    $courrier = Courrier::create($validated);

    // 2. Ensuite, enregistrer les pièces jointes
    if ($request->hasFile('pieces_jointes')) {
        foreach ($request->file('pieces_jointes') as $file) {
            $path = $file->store('pieces_jointes', 'public');

            PieceJointe::create([
                'courrier_id' => $courrier->id,
                'filename' => $file->getClientOriginalName(),
                'filepath' => $path,
                'mime_type' => $file->getClientMimeType(),
            ]);
        }
    }

    return redirect()->route('courriers.index')->with('success', 'Courrier ajouté avec pièces jointes.');
}

    /**
     * Affiche un courrier spécifique.
     */
    public function show(Courrier $courrier)
    {
        return view('courriers.show', compact('courrier'));
    }

    /**
     * Affiche le formulaire d’édition d’un courrier.
     */
    public function edit(Courrier $courrier)
    {
        $services = Service::all();
        $users = User::all();
        return view('courriers.edit', compact('courrier', 'services', 'users'));
    }

    /**
     * Met à jour un courrier existant.
     */
    public function update(Request $request, Courrier $courrier)
    {
        $validated = $request->validate([
            'objet' => 'required|string|max:255',
            'reference' => 'required|string|max:255',
            'expediteur' => 'required|string|max:255',
            'destinataire' => 'required|string|max:255',
            'date_courrier' => 'required|date',
            'type' => 'required|in:entrant,sortant',
            'service_id' => 'required|exists:services,id',
            'piece_jointe' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:2048',
        ]);
    
        // Gestion de la pièce jointe
        if ($request->hasFile('piece_jointe')) {
            if ($courrier->piece_jointe && Storage::disk('public')->exists($courrier->piece_jointe)) {
                Storage::disk('public')->delete($courrier->piece_jointe);
            }
        
            $validated['piece_jointe'] = $request->file('piece_jointe')->store('pieces_jointes', 'public');
        }
        
    
        $courrier->update($validated);
    
        return redirect()->route('courriers.index')->with('success', 'Courrier mis à jour avec succès.');
    }

    /**
     * Supprime un courrier.
     */
    public function destroy(Courrier $courrier)
    {
        $courrier->delete();
        return redirect()->route('courriers.index')->with('success', 'Courrier supprimé avec succès.');
    }
}
