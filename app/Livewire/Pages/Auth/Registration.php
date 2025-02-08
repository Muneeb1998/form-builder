<?php

namespace App\Livewire\Pages\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Registration extends Component
{
    public $first_name, $last_name, $email, $password, $password_confirmation;


    protected $rules = [
        'first_name' => 'nullable|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
    ];
    protected $messages = [
        'password.confirmed' => 'The password confirmation does not match.',
    ];
    public function register()
    {
        $this->validate();
        User::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('success', 'Registration successful!');
        $this->reset(); // Clear the form fields
    }

    public function render()
    {
        return view('livewire.pages.auth.register');
    }
}
