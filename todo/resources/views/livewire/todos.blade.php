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

<div class="max-w-md mx-auto bg-white shadow-lg rounded-lg p-6">
    <form wire:submit="add" class="flex items-center space-x-2">
        <input 
            type="text" 
            name="" 
            wire:model="task" 
            required 
            class="flex-grow border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Add a new task"
        >
        <button 
            type="submit" 
            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none"
        >
            Add
        </button>
    </form>

    <div class="mt-4">
        <ul class="space-y-2">
            @foreach($todos as $todo)
                <li class="flex justify-between items-center bg-gray-100 p-2 rounded">
                    <span>{{ $todo->task }}</span>
                    <button 
                        wire:click="delete({{$todo->id}})" 
                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 focus:outline-none"
                    >
                        Delete
                    </button>
                </li>
            @endforeach
        </ul>
    </div>
</div>


