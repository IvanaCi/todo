<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class ToDoList extends Component
{
    use WithPagination;

    public $searchString = "";
    public $addMode = false;

    #[Validate('required|min:3')] 
    public $newDescription;
    #[Validate('date|nullable')]
    public $newDueDate;
 
    public function render()
    {
        $todos = Todo::where('description', 'like', "%$this->searchString%")->orderBy('is_completed')->orderByRaw('-`due_date` DESC')->orderBy('created_at', 'Desc')->paginate(5);
        return view('livewire.to-do-list', ['todos' => $todos]);
    }

    #[On('list-changed')]
    public function refreshList(){
        $this->resetPage();
        $this->render();
    }

    public function enterAddMode(){
        $this->addMode = true;
    }

    #[On('editor-exited')]
    public function exitAddMode(){
        $this->addMode = false;
        $this->refreshList();
    }

}
