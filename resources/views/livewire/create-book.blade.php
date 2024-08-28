<div class="fixed inset-0 flex items-center justify-center">
    <div class="bg-white p-5 rounded-lg">
        <h2>{{ $book_id ? 'Editar Livro' : 'Criar Livro' }}</h2>

        <form wire:submit.prevent="store">
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" class="form-control" id="title" wire:model="title">
                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="publication_year">Ano de Publicação</label>
                <input type="number" class="form-control" id="publication_year" wire:model="publication_year">
                @error('publication_year') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="author_id">Autor</label>
                <select class="form-control" id="author_id" wire:model="author_id">
                    <option value="">Selecione o autor</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->nome }}</option>
                    @endforeach
                </select>
                @error('author_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="ISBN">ISBN</label>
                <input type="text" class="form-control" id="ISBN" wire:model="ISBN">
                @error('ISBN') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-success">{{ $book_id ? 'Atualizar' : 'Criar' }}</button>
            <button type="button" class="btn btn-secondary" wire:click="closeModal()">Cancelar</button>
        </form>
    </div>
</div>
