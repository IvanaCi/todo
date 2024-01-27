<div>
    <div>
        <label for="search-string">Search</label>  
        <input wire:model.live='searchString' name='search-string'/>
    </div>

    <div>
        @foreach ($todos as $todo)
            
            @livewire(ToDoCard::class, ['todo' => $todo], key($todo->id))
            
        @endforeach

    </div>

    {{ $todos->links()}}
</div>
