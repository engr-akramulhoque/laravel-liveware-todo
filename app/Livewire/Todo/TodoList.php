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

    public function deleteTodo($id)
    {
        $todo = Todo::query()->find($id);
        
        if($todo->user_id == $this->user)
        {
            $todo->delete();
            session()->flash('success', 'Todo deleted successfully.');
        }else{
            session()->flash('error', 'You are not authorized to delete this todo.');
        }

        return $this->redirectRoute('home', navigate:true);
    }

    public function render()
    {
        return view('livewire.todo.todo-list', [
            'todos' => $this->todos,
        ]);
    }
}
