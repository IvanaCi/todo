<div class="bg-sky-50 m-1 p-1 rounded" id='{{$todo->id.'-card'}}'>

    @if($editMode)
        @livewire('to-do-form', ['todoId'=>$todo->id])          
    @else


        <div class="grid grid-cols-[3fr_1fr]">
            <div class="grid grid-rows-2">
                <div class="flex items-center">
                    <input wire:change='updateCompleted()' type="checkbox" wire:model.live='completed'/>
                    <h3 class="ml-3">{{$todo->description}}</h3>
                </div>
                <div class="flex items-center">
                    @if($todo->due_date)
                        @if(!$todo->is_completed && $todo->due_date<now())
                            <div class="bg-red-700 text-white text-xs capitalize float-right p-1 mr-2 rounded">Overdue</div>
                        @endif
                        <p class='italic'>Due on: <span>{{$todo->due_date}}</span></p>                       
                    @endif

                </div>
            </div>

            <div class="grid grid-rows-2 p-4">
                <button class="text-sm capitalize bg-blue-600 p-1 m-1 rounded" type="button" wire:click.prevent="enterEditMode()">Edit</button>
                <button class="text-sm capitalize bg-red-600 p-1 m-1 rounded" type="button" wire:click.prevent="delete()">Delete</button>
            </div>
        </div>  

        
    @endif

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
</div>