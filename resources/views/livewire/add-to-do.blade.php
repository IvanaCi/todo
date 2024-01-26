<div>
    
    <div>
        <label for="task-description">Description</label>
        <input wire:model="taskDescription" name="task-description" type="text" placeholder="Enter your task" />
            @error('taskDescription') <span class="error">{{ $message }}</span> @enderror
    <div>

    <div>
        <label for="due-date">Due Date</label>
        <input wire:model="dueDate" name="due-date" type="datetime-local"/>
            @error('dueDate') <span class="error">{{ $message }}</span> @enderror
    </div>
    <button wire:click.prevent="store" type="button">Add</button>
    
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

</div>
