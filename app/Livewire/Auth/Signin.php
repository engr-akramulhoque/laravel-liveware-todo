<?php

namespace App\Livewire\Auth;

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

        if(Auth::attempt(['email' => $this->email, 'password' => $this->password])){
            return to_route('home');
        }
        
        // $this->addError('email', 'Invalid email or password');
        return back()->with('error', 'Invalid Email or Password');
    }

    public function render()
    {
        return view('livewire.auth.signin');
    }
}
