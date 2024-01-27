<div class="grid grid-cols-[3fr_1fr]">
    <div class="grid grid-rows-2">

        <div>
            <label for="task-description">Task Description</label>
            <input wire:model="taskDescription" type="text" name="task-description"/>
                @error('taskDescription') <div class="text-sm text-red-700 italic">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="due-date">Due Date</label>
            <input wire:model="dueDate" name="due-date" type="datetime-local"/>
                @error('dueDate') <div class="text-xs text-red-700 italic">{{ $message }}</div> @enderror
        </div>
    </div>
    <div class="grid grid-rows-2  p-4">
        <button class="text-sm capitalize bg-green-300 p-3 rounded" wire:click.prevent="submit()" type="button">{{$submitLabel}}</button>
        <button class="text-sm capitalize bg-red-600 p-3 rounded" wire:click.prevent="exitEditor()" type="button">Cancel</button>
    </div>
</div>
