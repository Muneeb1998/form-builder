<?php

namespace App\Livewire\Pages\Dashboard;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

#[Layout('livewire.components.app')]
class Profile extends Component
{
    public $first_name;
    public $last_name;
    public $password;
    public $password_confirmation;
    public $font;
    public $background_color;
    public $form_label;
    protected $listeners = ['settings-updated' => 'handleSettingsUpdate'];

    public function mount()
    {
        $user = Auth::user();
        $this->first_name = $user->first_name ?? '';
        $this->last_name = $user->last_name ?? '';
        $this->font = $user->font ?? 'Roboto';
        $this->background_color = $user->background_color ?? 'white';
        $this->form_label = $user->form_label ?? false;
    }
    public function handleSettingsUpdate($field, $value)
    {
        $this->$field = $value;
    }
    public function save()
    {
        $user = Auth::user();

        $validatedData = $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'password' => 'nullable|min:6|confirmed',
            'font' => 'required|string',
            'background_color' => 'required|string',
            'form_label' => 'boolean',
        ]);

        if ($this->password) {
            $validatedData['password'] = Hash::make($this->password);
        } else {
            unset($validatedData['password']);
        }
        $user->update($validatedData);

        session()->flash('success', 'Profile updated successfully!');
    }

    public function render()
    {
        return view('livewire.pages.dashboard.profile')
            ->layout('livewire.components.app')
            ->with([
                'formSettings' => [
                    'background_color' => $this->background_color,
                    'font' => $this->font,
                    'form_label' => $this->form_label
                ]
            ]);;
    }
}
