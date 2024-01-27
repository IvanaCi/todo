<div class="grid grid-cols-[3fr_1fr] bg-sky-50 m-2 p-4 rounded" id='{{$todo->id.'-card'}}'>

    @if($editMode)
        <div class="grid grid-rows-2">

            <div>
                <input wire:model="description" type="text"/>
                    @error('description') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="due-date">Due Date</label>
                <input wire:model="dueDate" name="due-date" type="datetime-local"/>
                    @error('dueDate') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="grid grid-rows-2  p-4">
            <button class="text-sm capitalize bg-green-300 p-3 rounded" wire:click.prevent="update" type="button">Save</button>
            <button class="text-sm capitalize bg-red-600 p-3 rounded" wire:click.prevent="toggleEditMode" type="button">Cancel</button>
        </div>
        
    @else
        
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
            <button class="text-sm capitalize bg-blue-600 p-2 m-1 rounded" type="button" wire:click.prevent="toggleEditMode()">Edit</button>
            <button class="text-sm capitalize bg-red-600 p- m-1 rounded" type="button" wire:click.prevent="delete()">Delete</button>
        </div>

        
    @endif

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
</div>