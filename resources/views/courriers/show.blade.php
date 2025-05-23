<x-app-layout>

<div class="container mt-4">
    <h2>Détails du courrier</h2>

    <div class="card mb-4">
        <div class="card-body">
            <p><strong>Référence :</strong> {{ $courrier->reference }}</p>
            <p><strong>Objet :</strong> {{ $courrier->objet }}</p>
            <p><strong>Date :</strong> {{ $courrier->date_courrier }}</p>
            <p><strong>Type :</strong> {{ ucfirst($courrier->type) }}</p>
            <p><strong>Expéditeur :</strong> {{ $courrier->expediteur ?? '-' }}</p>
            <p><strong>Destinataire :</strong> {{ $courrier->destinataire ?? '-' }}</p>
            <p><strong>Service :</strong> {{ $courrier->service->nom ?? '-' }}</p>
            <p><strong>Utilisateur :</strong> {{ $courrier->user->name ?? '-' }}</p>
            <p><strong>Observations :</strong><br>{{ $courrier->observations ?? 'Aucune' }}</p>
        </div>
    </div>

    <h4>Pièces jointes</h4>
    @if ($courrier->piecesJointes->count())
        <ul class="list-group mb-3">
            @foreach ($courrier->piecesJointes as $pj)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $pj->filename }}
                    <a href="{{ asset('storage/' . $pj->filepath) }}" target="_blank" class="btn btn-sm btn-outline-primary">Télécharger</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>Aucune pièce jointe.</p>
    @endif

    <a href="{{ route('courriers.index') }}" class="btn btn-secondary">Retour</a>
</div>
</x-app-layout>
