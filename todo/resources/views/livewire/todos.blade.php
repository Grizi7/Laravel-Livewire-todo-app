<?php

use function Livewire\Volt\{state, with};

state(['task']);

with([
    'todos' => fn() => auth()->user()->todos,
]);

$add = function () {

   auth()->user()->todos()->create([
    'task' => $this->task
   ]);

   $this->task = '';

};

$delete = fn(\App\Models\Todo $todo) => $todo->delete();

?>

<div>   
    <form wire:submit="add">
        <input type="text" name="" wire:model="task" required>
        <button type="submit">Add</button>
    </form>

    <div class="mt-2">
        <ul>
            @foreach($todos as $todo)
                <li>{{ $todo->task }}  <button wire:click="delete({{$todo->id}})">Delete</button></li>
            @endforeach
        </ul>
    </div>

</div>

