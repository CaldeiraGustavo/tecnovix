<div class="container">
    <h1 class="text-center">Gerenciamento de Autores</h1>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <button wire:click="create()" class="btn btn-primary">Criar Novo Autor</button>

    @if($isModalOpen)
        @include('livewire.create-author')
    @endif

    <table class="table mt-4">
        <thead>
            <tr>
                <th> Nome </th>
                <th> CEP </th>
                <th> UF </th>
                <th> Cidade </th>
                <th> Bairro </th>
                <th> Logradouro </th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($authors as $author)
            <tr>
                <td>{{ $author->nome }}</td>
                <td>{{ $author->cep }}</td>
                <td>{{ $author->uf }}</td>
                <td>{{ $author->cidade }}</td>
                <td>{{ $author->bairro }}</td>
                <td>{{ $author->logradouro }}</td>
                <td>
                    <button wire:click="edit({{ $author->id }})" class="btn btn-primary">Editar</button>
                    <button wire:click="delete({{ $author->id }})" class="btn btn-danger">Deletar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
