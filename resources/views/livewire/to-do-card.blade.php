<div class="grid grid-cols-2" id='{{$todo->id.'-card'}}'>

    @if($editMode)
        <div>

            <div>
                <input wire:model="description" type="text"/>
                    @error('description') <span class="error">{{ $message }}</span> @enderror
            <div>

            <div>
                <label for="due-date">Due Date</label>
                <input wire:model="dueDate" name="due-date" type="datetime-local"/>
                    @error('dueDate') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div>
            <button wire:click.prevent="update" type="button">Save</button>
            <button wire:click.prevent="toggleEditMode" type="button">Cancel</button>
        </div>
        
    @else
        <div>

            <div class="{{$completed ? 'completed' : 'pending'}}"> 
                <input wire:change='updateCompleted()' type="checkbox" wire:model.live='completed'/>
                <h3>{{$todo->description}}</h3>
                @if($todo->due_date)
                    <p>Due on: <span>{{$todo->due_date}}</span></p>
                @endif
            </div>

            <div>
                <button type="button" wire:click.prevent="toggleEditMode()">Edit</button>
                <button type="button" wire:click.prevent="delete()">Delete</button>
            </div>
        </div>
        
    @endif

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
</div>