@extends('layouts.app')
@section('content')
        <div class="row mt-4">
            <div class="row-block-top">
                <div class="row-recherch">
                    <input type="text" id="clientSearch" placeholder="Rechercher par Nom........." class="input-recherche">
                </div>
                <div class="position-absolute top-4 end-0 mx-4">
                    <a href="ajouter-client" class="btn btn-success btn-ajout">Ajouter client</a>
                </div>
            </div>
            @if(session('message'))
            <div class="alert alert-success mt-3 fs-5" role="alert">
                {{ session('message') }}
            </div>
            @endif
            @if(session('messagesup'))
            <div class="alert alert-danger mt-3 fs-5" role="alert">
                {{ session('messagesup') }}
            </div>
            @endif
            <table class="width-table mt-3">
                <thead>
                    <tr class="bg-secondary">
                        <th class="p-2 fs-5 text-white">N°</th>
                        <th class="p-2 fs-5 text-white"><input type="checkbox" name="" class="mx-2">Nom</th>
                        <th class="p-2 fs-5 text-white"><input type="checkbox" name="" class="mx-2">E-mail</th>
                        <th class="p-2 fs-5 text-white"><input type="checkbox" name="" class="mx-2">Phone</th>
                        <th class="p-2 fs-5 text-white"><input type="checkbox" name="" class="mx-2">Status</th>
                        <th class="p-2 fs-5 text-white">Actions</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @if($clients->count() > 0)
                    @foreach($clients as $key => $client)
                    <tr class="bg-white">
                        <td class="p-2 mt-1 fw-bold">{{ $key+1 }}</td>
                        <td class="p-2 mt-1"><input type="checkbox" name="" class="mx-2">{{ $client->nom }}</td>
                        <td class="p-2 mt-1"><input type="checkbox" name="" class="mx-2">{{ $client->email }}</td>
                        <td class="p-2 mt-1"><input type="checkbox" name="" class="mx-2">{{ $client->phone }}</td>
                        <td class="p-2 mt-1"><input type="checkbox" name="" class="mx-2">{{ $client->status }}</td>
                        <td class="p-2 mt-1 d-flex">

                            <a href="edit-client?id={{ $client->id }}" class="">Modifier&nbsp;|&nbsp;</a>
                            
                            <form action="delete-client/{{$client->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn-supp" type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
   <!-- Affichage des liens de pagination -->
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const clientSearchInput = document.getElementById('clientSearch');
        const clientRows = document.querySelectorAll('.row tbody tr');


        clientSearchInput.addEventListener('input', function() {
            const searchValue = clientSearchInput.value.toLowerCase();

            clientRows.forEach(function(row) {
                const cleintName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                if (cleintName.includes(searchValue)) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>

@endsection