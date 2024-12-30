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
        $this->refreshTodos();
        $this->authorizeAction($request);
    }

    private function refreshTodos()
    {
        $this->todos = Todo::where('user_id', $this->user)->latest()->get();
    }

    private function authorizeAction($request)
    {
        if (!$request->user()) {
            abort(403, 'Unauthorized action.');
        }
    }

    private function isAuthorized($todo)
    {
        return $todo && $todo->user_id == $this->user;
    }

    public function deleteTodo($id)
    {
        $todo = Todo::find($id);

        if (!$this->isAuthorized($todo)) {
            session()->flash('error', 'You are not authorized to delete this todo.');
        }

        $todo->delete();
        session()->flash('success', 'Todo deleted successfully.');
        $this->refreshTodos();
    }

    public function markAsCompleted($id)
    {
        $todo = Todo::find($id);

        if (!$this->isAuthorized($todo)) {
            session()->flash('error', 'You are not authorized to update this todo.');
        }

        $todo->update([
            'status' => 'completed',
        ]);
        session()->flash('success', 'Todo status updated successfully.');
        $this->refreshTodos();
    }

    public function render()
    {
        return view('livewire.todo.todo-list', [
            'todos' => $this->todos,
        ]);
    }
}
