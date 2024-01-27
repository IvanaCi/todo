<div class="bg-sky-50 m-2 p-4 rounded" id='{{$todo->id.'-card'}}'>

    @if($editMode)
        @livewire('to-do-form')        
    @else
        <div class="grid grid-cols-[3fr_1fr]">
            <div class="grid grid-rows-2">
                <div class="flex">
                    <input wire:change='updateCompleted()' type="checkbox" wire:model.live='completed'/>
                    <h3 class="ml-3">{{$todo->description}}</h3>
                </div>
                <div>
                    @if($todo->due_date)
                        <p class='italic'>Due on: <span>{{$todo->due_date}}</span></p>
                    @endif
                </div>
            </div>

            <div class="grid grid-rows-2 p-4">
                <button class="text-sm capitalize bg-blue-600 p-2 m-1 rounded" type="button" wire:click.prevent="enterEditMode()">Edit</button>
                <button class="text-sm capitalize bg-red-600 p- m-1 rounded" type="button" wire:click.prevent="delete()">Delete</button>
            </div>
        </div>  

        
    @endif

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
</div>