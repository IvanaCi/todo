<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Throwable;

class AddToDo extends Component
{
    #[Validate('required|min:3')] 
    public $taskDescription;
    #[Validate('date|nullable')]
    public $dueDate;

    public function render()
    {
        return view('livewire.add-to-do');
    }

    public function store(){
        
        $this->validate();

        try{
            $todo = Todo::create([
                'description' => $this->taskDescription,
                'due_date' => $this->dueDate,
            ]);

            session()->flash('status', 'Task added to the list.');
            $this->dispatch('todo-created');
        
        }catch(Throwable $e){
            session()->flash('status', 'There was an issue processing your request. Please try again.');

            report($e);
        }

        $this->reset('taskDescription','dueDate');
     

    }
}
