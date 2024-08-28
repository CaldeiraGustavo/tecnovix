<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Author;
use App\Adapters\External\ViaCepAdapter;

class AuthorCrud extends Component
{
    public $authors, $name, $author_id, $cep;
    public $isModalOpen = 0;

    public function render()
    {
        $this->authors = Author::all();
        return view('livewire.author-crud');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->author_id = '';
        $this->cep = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'cep' => 'required',
        ]);
        $viacep = new ViaCepAdapter();
        $cepData = $viacep->getAllData($this->cep);

        Author::updateOrCreate(['id' => $this->author_id], [
            'nome' => $this->name,
            'cep' => $cepData['cep'],
            'uf' => $cepData['uf'],
            'cidade' => $cepData['localidade'],
            'bairro' => $cepData['bairro'],
            'logradouro' => $cepData['logradouro'],
        ]);

        session()->flash('message', $this->author_id ? 'Autor atualizado com sucesso.' : 'Autor criado com sucesso.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $author = Author::findOrFail($id);
        $this->author_id = $id;
        $this->name = $author->nome;
        $this->cep = $author->cep;

        $this->openModal();
    }

    public function delete($id)
    {
        Author::find($id)->delete();
        session()->flash('message', 'Autor deletado com sucesso.');
    }
}
