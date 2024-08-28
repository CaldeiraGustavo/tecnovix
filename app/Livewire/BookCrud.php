<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Book;
use App\Models\Author;

class BookCrud extends Component
{
    public $books, $title, $publication_year, $author_id, $ISBN, $book_id;
    public $isModalOpen = 0;

    public function render()
    {
        $this->books = Book::all();
        return view('livewire.book-crud', [
            'authors' => Author::all()
        ]);
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
        $this->title = '';
        $this->publication_year = '';
        $this->author_id = '';
        $this->ISBN = '';
        $this->book_id = '';
    }

    public function store()
    {
        $this->validate([
            'title' => 'required|string',
            'publication_year' => 'required|numeric',
            'author_id' => 'required|exists:autores,id',
            'ISBN' => 'required|string|unique:livros,ISBN,' . $this->book_id,
        ]);

        Book::updateOrCreate(['id' => $this->book_id], [
            'titulo' => $this->title,
            'ano_publicacao' => $this->publication_year . '-01-01',
            'autor_id' => $this->author_id,
            'ISBN' => $this->ISBN,
        ]);

        session()->flash('message', $this->book_id ? 'Livro atualizado com sucesso.' : 'Livro criado com sucesso.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $book = Book::with('author')->findOrFail($id);
        $this->book_id = $id;
        $this->title = $book->titulo;
        $this->publication_year = $book->ano_publicacao;
        $this->author_id = $book->autor_id;
        $this->ISBN = $book->ISBN;

        $this->openModal();
    }

    public function delete($id)
    {
        Book::find($id)->delete();
        session()->flash('message', 'Livro deletado com sucesso.');
    }
}
