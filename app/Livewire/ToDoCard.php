<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Throwable;

class ToDoCard extends Component
{
    #[Validate('required|min:3')] 
    public $description;
    #[Validate('date|nullable')]
    public $dueDate;
    #[Validate('boolean|nullable')]
    public $completed;
    public $editMode = false;
    public $todo;

    public function mount(Todo $todo){
        $this->description = $todo->description;
        $this->dueDate = $todo->due_date;
        $this->completed = (bool) $todo->is_completed;
        $this->todo = $todo;
    }

    public function render()
    {
        return view('livewire.to-do-card');
    }

    public function enterEditMode(){
        $this->editMode = true;
    }

    #[On('editor-exited')]
    public function exitEditMode(){
        $this->editMode = false;
        $this->refreshList();

    }

    public function update(){

        $this->validate();

        try{

            $this->todo->description=$this->description;

            $this->todo->due_date = $this->dueDate;

            $this->todo->is_completed = $this->completed;

            $this->todo->save();
        
        }catch(Throwable $e){
            session()->flash('status', 'There was an issue processing your request. Please try again.');

            report($e);
        }

        $this->toggleEditMode();
    }

    public function delete(){
        try{

            $this->todo->delete();

            $this->refreshList();
        
        }catch(Throwable $e){
            session()->flash('status', 'There was an issue processing your request. Please try again.');

            report($e);
        }
    }

    public function updateCompleted(){
        
        $this->todo->is_completed = $this->completed;
        
        try{
            $this->todo->save();
            
        }catch(Throwable $e){
            session()->flash('status', 'There was an issue processing your request. Please try again.');

            report($e);
        }

        $this->refreshList();
    }

    public function refreshList(){
        $this->dispatch('list-changed');
    }
}
