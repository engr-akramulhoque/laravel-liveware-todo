<?php

namespace App\Livewire\Todo;

use App\Models\Todo;
use Illuminate\Http\Request;
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

    #[Validate('required|timestamp')]
    public $from = null;

    #[Validate('required|timestamp')]
    public $to = null;

    public $user = null;

    public function mount(Request $request){
        $this->user = $request->user()->id;
    }

    public function storeTodo(){
        $this->validate();

        $todo = Todo::create([
            'title' => $this->title,
            'description' => $this->description,
            'date' => $this->date,
            'from' => $this->from,
            'to' => $this->to,
            'user_id' => $this->user,
        ]);

        if(!$todo){
            session()->flash('error', 'Failed to add todo');
            return;
        }

        session()->flash('success', 'Todo added successfully');

        // $this->reset(['title', 'description', 'date', 'from', 'to']);

        return $this->redirectRoute('home', navigate:true);
    }

    public function render()
    {
        return view('livewire.todo.add-todo');
    }
}
