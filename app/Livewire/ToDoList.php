<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class ToDoList extends Component
{
    use WithPagination;

    public $searchString = "";
    public $editingId = null;

    #[Validate('required|min:3')] 
    public $newDescription;
    #[Validate('date|nullable')]
    public $newDueDate;
 
    public function render()
    {
        $todos = Todo::where('description', 'like', "%$this->searchString%")->orderBy('is_completed')->orderBy('due_date', 'Desc')->orderBy('created_at', 'Asc')->paginate(5);
        return view('livewire.to-do-list', ['todos' => $todos]);
    }

    #[On('list-changed')]
    public function refreshList(){
        $this->resetPage();
        $this->render();
    }

}
