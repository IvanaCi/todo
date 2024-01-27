<div class="grid">
    <div> 
        <h3>{{$todo->description}}</h3>
        @if($todo->due_date)
            <p>Due on: <span>{{$todo->due_date}}</span></p>
        @endif

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div>
        {{-- <button type="button" wire:click.prevent="startEditing({{$todo->id}})">Edit</button> --}}
        <button type="button" wire:click.prevent="delete({{$todo->id}})">Delete</button>
    </div>
</div>