<x-app-layout>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg" style="width: 600px;">
            <div class="card-header text-center">
                <h2>Créer un nouveau courrier</h2>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Erreur !</strong> Veuillez corriger les champs suivants :
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('courriers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="reference" class="form-label">Référence</label>
                        <input type="text" class="form-control" name="reference" value="{{ old('reference') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="objet" class="form-label">Objet</label>
                        <input type="text" class="form-control" name="objet" value="{{ old('objet') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="date_courrier" class="form-label">Date du courrier</label>
                        <input type="date" class="form-control" name="date_courrier" value="{{ old('date_courrier') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select name="type" class="form-select" required>
                            <option value="entrant" {{ old('type') == 'entrant' ? 'selected' : '' }}>Entrant</option>
                            <option value="sortant" {{ old('type') == 'sortant' ? 'selected' : '' }}>Sortant</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="expediteur" class="form-label">Expéditeur</label>
                        <input type="text" class="form-control" name="expediteur" value="{{ old('expediteur') }}">
                    </div>

                    <div class="mb-3">
                        <label for="destinataire" class="form-label">Destinataire</label>
                        <input type="text" class="form-control" name="destinataire" value="{{ old('destinataire') }}">
                    </div>

                    <div class="mb-3">
                        <label for="service_id" class="form-label">Service concerné</label>
                        <select name="service_id" class="form-select" required>
                            <option value="">-- Sélectionner --</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                    {{ $service->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="user_id" class="form-label">Utilisateur responsable</label>
                        <select name="user_id" class="form-select" required>
                            <option value="">-- Sélectionner --</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="observations" class="form-label">Observations</label>
                        <textarea class="form-control" name="observations" rows="3">{{ old('observations') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="pieces_jointes" class="form-label">Pièces jointes (PDF, DOC, JPG, PNG)</label>
                        <input type="file" class="form-control" name="pieces_jointes[]" multiple>
                    </div>

                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <a href="{{ route('courriers.index') }}" class="btn btn-secondary">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
