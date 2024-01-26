<div class="card">
    <h3>{{$todo->description}}</h3>
    @if($todo->due_date)
        <p>Due on: <span>{{$todo->due_date}}</span></p>
    @endif
</div>