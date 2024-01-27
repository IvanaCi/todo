<div class="h-4/5 grid drid-rows-4">
    <div>
        {{-- Display response statuses --}}
        @if(session('status'))
        <div class="alert">
            {{ session('status') }}
        </div>

        @endif

        <div>
            @if($addMode)
                
                @include('livewire.includes.add-to-do')
            @else
                <button class="text-sm capitalize bg-blue-600 p-2 mx-3 rounded float-right" type="button" wire:click.prevent='enterAddMode()'>Add Task</button>
            @endif
        </div>
        
    </div>

    <div>
        @foreach ($todos as $todo)
            
            @livewire(ToDoCard::class, ['todo' => $todo], key($todo->id))
            
        @endforeach

    </div>

    <div class="flex w-full items-center">
        <label for="search-string" class="font-semibold">Search:</label>
        <input wire:model.live='searchString' name='search-string' class="rounded border-solid border-4 border-slate-50 mx-3 p-2 flex-grow"/>
    </div>
    {{ $todos->links()}}
    
</div>
