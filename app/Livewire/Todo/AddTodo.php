<?php

namespace App\Livewire\Todo;

use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AddTodo extends Component
{
    #[Validate('required|string|max:100')]
    public string $title = '';

    #[Validate('required|string|max:500')]
    public string $description = '';

    #[Validate('required|date')]
    public $date = null;

    #[Validate('required')]
    public $from = null;

    #[Validate('required')]
    public $to = null;

    public $user = null;

    public function mount()
    {
        $this->user = Auth::id();
    }

    public function storeTodo()
    {
        $this->validate();

        // Validate time range
        $fromTime = Carbon::createFromFormat('H:i', $this->from)->format('h:i A');
        $toTime = Carbon::createFromFormat('H:i', $this->to)->format('h:i A');

        $this->validateTimeSlot($fromTime, $toTime);

        $todo = $this->store($fromTime, $toTime);
        if(!$todo){
            session()->flash('error', 'Failed to add todo');
            return;
        }

        session()->flash('success', 'Todo added successfully');
        return $this->redirectRoute('home', navigate:true);
    }

    private function validateTimeSlot($fromTime, $toTime)
    {
        // Check if the start time is before the end time
        if ($fromTime >= $toTime) {
            session()->flash('error', 'Start time must be before end time');
            return;
        }
    }

    private function store($from = null, $to = null):?Todo
    {
        return Todo::create([
            'title' => $this->title,
            'description' => $this->description,
            'date' => $this->date,
            'from' => $from,
            'to' => $to,
            'user_id' => $this->user,
        ]);
    }

    public function render()
    {
        return view('livewire.todo.add-todo');
    }
}
