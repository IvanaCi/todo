<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Validate;
use Livewire\Component;
use SebastianBergmann\Type\NullType;
use Throwable;

class ToDoForm extends Component
{
    #[Validate('required|min:3')] 
    public $taskDescription;
    #[Validate('date|nullable')]
    public $dueDate;

    public $todo;
    public $submitAction;
    public $submitLabel;

    public function mount($todoId = null){
        $this->submitAction = is_null($todoId) ? 'create' : 'update';
        $this->submitLabel = is_null($todoId) ? 'Add' : 'Save';
        if(!is_null($todoId)){
            $this->todo = Todo::find($todoId);
            $this->taskDescription =  $this->todo->description;
            $this->dueDate =  $this->todo->due_date;
            
        }
    }

    public function render()
    {
        return view('livewire.to-do-form');
    }

    public function submit(){
        $this->{$this->submitAction}();
        $this->exitEditor();
    }

    private function create(){
        
        $this->validate();

        try{
            $todo = Todo::create([
                'description' => $this->taskDescription,
                'due_date' => $this->dueDate,
            ]);

            session()->flash('status', 'Task added to the list.');
            $this->dispatch('list-changed');
        
        }catch(Throwable $e){
            session()->flash('status', 'There was an issue processing your request. Please try again.');

            report($e);
        }
     

    }

    private function update(){

        $this->validate();

        try{


            $this->todo->description=$this->taskDescription;

            $this->todo->due_date = $this->dueDate;

            $this->todo->save();
        
        }catch(Throwable $e){
            session()->flash('status', 'There was an issue processing your request. Please try again.');

            report($e);
        }
    }

    public function exitEditor(){
        
        $this->dispatch('editor-exited');
        $this->reset('taskDescription','dueDate', 'todo', 'submitAction', 'submitLabel');   
    }
}
