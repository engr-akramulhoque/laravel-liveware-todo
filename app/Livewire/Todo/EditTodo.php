<?php

namespace App\Livewire\Todo;

use App\Models\Todo;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditTodo extends Component
{
    public $todo;
    
    public $user;

    #[Validate('required|string|max:255')]
    public $title;

    #[Validate('nullable|string')]
    public $description;

    #[Validate('required|date')]
    public $date;

    #[Validate('required|date_format:H:i')]
    public $from;

    #[Validate('required|date_format:H:i')]
    public $to;

    public function mount(Todo $todo)
    {
        $this->todo = $todo;
        $this->user = auth()->id();

        $this->bindProperty($todo);
    }

    protected function bindProperty($todo){
        $this->title = $todo->title;
        $this->description = $todo->description;
        $this->date = $todo->date;
        $this->from = $this->convertTo24HourFormat($todo->from);
        $this->to = $this->convertTo24HourFormat($todo->to);
    }

    private function convertTo24HourFormat($time)
    {
        return date('H:i', strtotime($time));
    }

    public function updateTodo()
    {
        $this->validate();

        $this->todo->update([
            'title' => $this->title,
            'description' => $this->description,
            'date' => $this->date,
            'from' => date('h:i A', strtotime($this->todo->from)),
            'to' => date('h:i A', strtotime($this->todo->to))
        ]);

        session()->flash('success', 'Task updated successfully.');
        return $this->redirectRoute('home', navigate:true);
    }

    public function render()
    {
        return view('livewire.todo.edit-todo', [
            'todo' => $this->todo,
        ]);
    }
}
