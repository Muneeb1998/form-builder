<?php

namespace App\Livewire\Pages\Auth;

use Livewire\Component;
use App\Livewire\Forms\LoginForm;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]

class Login extends Component
{
    public LoginForm $form;

    public function login()
    {
        $this->form->authenticate();

        return redirect()->route('dashboard'); // Redirect after successful login
    }

    public function render()
    {
        return view('livewire.pages.auth.login', [
            'adiClass' => 'min-h-[calc(100vh-64px)] flex justify-center items-center'
        ]);
    }
}
