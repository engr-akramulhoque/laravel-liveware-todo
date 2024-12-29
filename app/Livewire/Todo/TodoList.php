<?php

namespace App\Livewire\Todo;

use App\Models\Todo;
use Illuminate\Http\Request;
use Livewire\Component;

class TodoList extends Component
{
    public $user = null;
    public $todos = [];

    public function mount(Request $request)
    {
        $this->user = $request->user()->id;
        $this->todos = Todo::query()->where('user_id', '=', $this->user)->latest()->get();
    }

    public function render()
    {
        return view('livewire.todo.todo-list', [
            'todos' => $this->todos,
        ]);
    }
}
