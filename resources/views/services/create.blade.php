<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un service') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-md mx-auto bg-white p-6 rounded shadow-sm">
            <form action="{{ route('services.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm font-medium">Nom du service</label>
                    <input type="text" name="nom" class="mt-1 block w-full border-gray-300 rounded" required>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
