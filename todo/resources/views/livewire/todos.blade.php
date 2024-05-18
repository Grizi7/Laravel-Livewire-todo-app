<?php

use function Livewire\Volt\{state};

state(['task']);


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
    
</div>

