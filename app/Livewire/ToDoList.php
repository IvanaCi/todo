<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\On;
use Livewire\Component;

class ToDoList extends Component
{
    public $searchString = "";

    #[On('todo-created')] 
    public function render()
    {
        $todos = Todo::where('description', 'like', "%$this->searchString%")->orderBy('is_completed')->orderBy('due_date', 'Desc')->orderBy('created_at', 'Asc')->paginate(10);
        return view('livewire.to-do-list', ['todos' => $todos]);
    }

}
