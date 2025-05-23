<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Liste des services
    public function index()
    {
        $services = Service::latest()->paginate(10);
        return view('services.index', compact('services'));
    }

    // Formulaire de création
    public function create()
    {
        return view('services.create');
    }

    // Enregistrer un nouveau service
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255|unique:services,nom',
        ]);

        Service::create($request->all());

        return redirect()->route('services.index')->with('success', 'Service ajouté avec succès.');
    }

    // Afficher un service (optionnel selon ton besoin)
    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    // Formulaire d'édition
    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    // Mettre à jour un service
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'nom' => 'required|string|max:255|unique:services,nom,' . $service->id,
        ]);

        $service->update($request->all());

        return redirect()->route('services.index')->with('success', 'Service mis à jour avec succès.');
    }

    // Supprimer un service
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service supprimé avec succès.');
    }
}
