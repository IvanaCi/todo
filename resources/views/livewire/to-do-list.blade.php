<div>
    <div>
        <label for="search-string" class="font-semibold">Search:</label>
        <input wire:model.live='searchString' name='search-string' class="rounded border-solid border-4 border-slate-50 mx-3 p-2"/>
        
    </div>

    <div>
        @foreach ($todos as $todo)
            
            @livewire(ToDoCard::class, ['todo' => $todo], key($todo->id))
            
        @endforeach

    </div>

    {{ $todos->links()}}
</div>
