<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des services') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('services.create') }}" class="bg-blue-600 text-black px-4 py-2 rounded">Ajouter un service</a>

            <div class="mt-6 bg-white shadow-sm rounded-lg p-6">
                <table class="w-full text-left border">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border">#</th>
                            <th class="px-4 py-2 border">Nom</th>
                            <th class="px-4 py-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                            <tr>
                                <td class="px-4 py-2 border">{{ $service->id }}</td>
                                <td class="px-4 py-2 border">{{ $service->nom }}</td>
                                <td class="px-4 py-2 border">
                                    <a href="{{ route('services.edit', $service) }}" class="text-blue-500">Modifier</a>
                                    <form action="{{ route('services.destroy', $service) }}" method="POST" class="inline-block" onsubmit="return confirm('Confirmer la suppression ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-500 ml-2">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
