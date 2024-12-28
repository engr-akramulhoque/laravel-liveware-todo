<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Signin extends Component
{
    #[Validate('required|email')]
    public $email  = '';

    #[Validate('required|min:8')]
    public $password = '';

    public function signIn()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->flash('success', 'Login Successful');
            return $this->redirectRoute('home', navigate:true);
        }

        $this->addError('email', 'Invalid email or password.');

    }

    public function render()
    {
        return view('livewire.auth.signin');
    }
}
