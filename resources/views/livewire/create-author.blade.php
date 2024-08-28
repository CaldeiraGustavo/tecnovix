<div class="fixed inset-0 flex items-center justify-center">
    <div class="bg-white p-5 rounded-lg">
        <h2>{{ $author_id ? 'Editar Autor' : 'Criar Autor' }}</h2>

        <form wire:submit.prevent="store">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" wire:model="name">
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="cep">CEP</label>
                <input type="text" class="form-control" id="cep" wire:model="cep">
                @error('cep') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-success">{{ $author_id ? 'Atualizar' : 'Criar' }}</button>
            <button type="button" class="btn btn-secondary" wire:click="closeModal()">Cancelar</button>
        </form>
    </div>
</div>
