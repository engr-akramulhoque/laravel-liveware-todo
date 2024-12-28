<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Signup extends Component
{
    #[Validate('required|string')]
    public $name;

    #[Validate('required|email|unique:users,email')]
    public $email;

    #[Validate('required|min:8|confirmed')]
    public $password;

    #[Validate('required|min:8')]
    public $password_confirmation;

    public function createNewUser()
    {
        $this->validate();

        $user = $this->storeUser();

        if(!$user){
            return back()->with('Registration Failed');
        }

        Auth::login($user);
        
        session()->flash('success', "Registration Successful");

        return $this->redirectRoute('home', navigate: true);

    }

    protected function storeUser() : User 
    {
        return User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' =>bcrypt($this->password),
        ]);
    }

    public function render()
    {
        return view('livewire.auth.signup');
    }
}
