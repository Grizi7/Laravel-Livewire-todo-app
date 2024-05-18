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
?>

<div>   
    <form wire:submit="add">
        <input type="text" name="" wire:model="task">
        <button type="submit">Add</button>
    </form>

    <div class="mt-2">
        <ul>
            @foreach($todos as $todo)
                <li>{{ $todo->task }}</li>
            @endforeach
        </ul>
    </div>

</div>

