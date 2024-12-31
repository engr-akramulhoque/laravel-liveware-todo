<?php

namespace App\Livewire\Todo;

use App\Models\Todo;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;
use Livewire\Component;

class TodoList extends Component
{
    public $user = null;
    public $todos = [];

    #[Validate('string')]
    public string $search = '';

    public function mount(Request $request)
    {
        $this->user = $request->user()->id;
        $this->refreshTodos();
        $this->authorizeAction($request);
    }

    private function refreshTodos()
    {
        $query = Todo::where('user_id', $this->user);

        if ($this->search) {
            $query->where('title', 'like', "%{$this->search}%")
            ->orWhere('description', 'like', "%{$this->search}%");
        }

        $this->todos = $query->latest()->get();
    }

    public function searchTodo(){
        $this->refreshTodos();
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
