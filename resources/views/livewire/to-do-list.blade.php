<div>
    <div>
        <label for="search-string">Search</label>  
        <input wire:model.live='searchString' name='search-string'/>
    </div>

    @foreach ($todos as $todo)
        <div wire:key='{{$todo->id}}'>
            @include('livewire.includes.to-do-card', $todo)
        </div>
    @endforeach
</div>
