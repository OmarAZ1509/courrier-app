<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier le courrier') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow-sm">
            <form action="{{ route('courriers.update', $courrier->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Objet -->
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Objet</label>
                    <input type="text" name="objet" value="{{ old('objet', $courrier->objet) }}" class="mt-1 block w-full rounded border-gray-300" required>
                </div>

                <!-- Référence -->
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Référence</label>
                    <input type="text" name="reference" value="{{ old('reference', $courrier->reference) }}" class="mt-1 block w-full rounded border-gray-300" required>
                </div>

                <!-- Expéditeur -->
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Expéditeur</label>
                    <input type="text" name="expediteur" value="{{ old('expediteur', $courrier->expediteur) }}" class="mt-1 block w-full rounded border-gray-300" required>
                </div>

                <!-- Destinataire -->
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Destinataire</label>
                    <input type="text" name="destinataire" value="{{ old('destinataire', $courrier->destinataire) }}" class="mt-1 block w-full rounded border-gray-300" required>
                </div>

                <!-- Date -->
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Date du courrier</label>
                    <input type="date" name="date_courrier" value="{{ old('date_courrier', $courrier->date_courrier) }}" class="mt-1 block w-full rounded border-gray-300" required>
                </div>

                <!-- Type -->
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Type</label>
                    <select name="type" class="mt-1 block w-full rounded border-gray-300" required>
                        <option value="entrant" {{ $courrier->type === 'entrant' ? 'selected' : '' }}>Entrant</option>
                        <option value="sortant" {{ $courrier->type === 'sortant' ? 'selected' : '' }}>Sortant</option>
                    </select>
                </div>

                <!-- Service -->
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Service concerné</label>
                    <select name="service_id" class="mt-1 block w-full rounded border-gray-300" required>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}" {{ $courrier->service_id == $service->id ? 'selected' : '' }}>
                                {{ $service->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Pièce jointe -->
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Pièce jointe (facultatif)</label>
                    <input type="file" name="piece_jointe" class="mt-1 block w-full rounded border-gray-300">
                    @if($courrier->piece_jointe)
                        <p class="text-sm mt-2">Pièce actuelle :
                            <a href="{{ asset('storage/'.$courrier->piece_jointe) }}" target="_blank" class="text-blue-600 underline">
                                Voir / Télécharger
                            </a>
                        </p>
                    @endif
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
