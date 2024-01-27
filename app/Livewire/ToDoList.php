<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\On;
use Livewire\Component;
use Throwable;

class ToDoList extends Component
{
    public $searchString = "";

    #[On('list-changed')] 
    public function render()
    {
        $todos = Todo::where('description', 'like', "%$this->searchString%")->orderBy('is_completed')->orderBy('due_date', 'Desc')->orderBy('created_at', 'Asc')->paginate(10);
        return view('livewire.to-do-list', ['todos' => $todos]);
    }

    public function delete($id){
        try{
            $todo = Todo::find($id);

            $todo->delete();

            $this->render();
        
        }catch(Throwable $e){
            session()->flash('status', 'There was an issue processing your request. Please try again.');

            report($e);
        }
    }

}
