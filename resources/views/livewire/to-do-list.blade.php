<div>
    <div>
        @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <label for="search-string" class="font-semibold">Search:</label>
        <input wire:model.live='searchString' name='search-string' class="rounded border-solid border-4 border-slate-50 mx-3 p-2"/>
        @if($addMode)
            
            @include('livewire.includes.add-to-do')
        @else
            <button class="text-sm capitalize bg-blue-600 p-2 m-1 rounded" type="button" wire:click.prevent='enterAddMode()'>Add Task</button>
        @endif
        
    </div>

    <div>
        @foreach ($todos as $todo)
            
            @livewire(ToDoCard::class, ['todo' => $todo], key($todo->id))
            
        @endforeach

    </div>

    {{ $todos->links()}}
</div>
