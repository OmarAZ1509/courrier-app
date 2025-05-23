<x-app-layout>

<div class="container mt-4">
    <h2>Liste des courriers</h2>

    @if (session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
        {{ session('success') }}
    </div>
    @endif

    <a href="{{ route('courriers.create') }}" class="btn btn-primary mb-3">Nouveau courrier</a>

    <div class="table-responsive">
        <table id="courriers-table" class="table table-bordered table-striped nowrap" style="width: 80%; margin: 0 auto;">
            <thead class="table-dark">
                <tr>
                    <th>Réf.</th>
                    <th>Objet</th>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Service</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($courriers as $courrier)
                    <tr>
                        <td class="td-small">{{ $courrier->reference }}</td>
                        <td class="td-small" >{{ $courrier->objet }}</td>
                        <td class="td-small">{{ $courrier->date_courrier }}</td>
                        <td class="td-small">{{ ucfirst($courrier->type) }}</td>
                        <td class="td-small">{{ $courrier->service->nom ?? '-' }}</td>
                        <td class="td-small">
                            <a href="{{ route('courriers.show', $courrier->id) }}" class="btn btn-sm btn-info">Voir</a>
                            <a href="{{ route('courriers.edit', $courrier->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                            <form action="{{ route('courriers.destroy', $courrier->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer ce courrier ?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Aucun courrier enregistré.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style>
        /* Réduit la taille des cellules de table */
        .td-small {
            font-size: 0.9rem;  /* Réduit la taille de la police */
            padding: 0.5rem;  /* Réduit le padding */
        }
        /* Réduit la taille de la police pour les en-têtes de table */

    </style>
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#courriers-table').DataTable({
                responsive: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json'
                }
            });
        });
    </script>
@endpush

</x-app-layout>
