<div class="container">
    <h1 class="text-center">Gerenciamento de Livros</h1>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <button wire:click="create()" class="btn btn-primary">Criar Novo Livro</button>

    @if($isModalOpen)
        @include('livewire.create-book')
    @endif

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Título</th>
                <th>Ano de Publicação</th>
                <th>Autor</th>
                <th>ISBN</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{ $book->titulo }}</td>
                <td>{{ substr($book->ano_publicacao, 0, 4) }}</td>
                <td>{{ $book->author->nome }}</td>
                <td>{{ $book->ISBN }}</td>
                <td>
                    <button wire:click="edit({{ $book->id }})" class="btn btn-primary">Editar</button>
                    <button wire:click="delete({{ $book->id }})" class="btn btn-danger">Deletar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
