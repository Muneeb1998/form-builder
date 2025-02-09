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
    public $custom_fields;
    public $profile_lang;

    protected $listeners = [
        'settings-updated' => 'handleSettingsUpdate',
        'custom-fields-updated' => 'updateCustomFields', // Listen for updates
    ];

    public function mount()
    {
        $user = Auth::user();
        set_lang();
        $this->first_name = $user->first_name ?? '';
        $this->last_name = $user->last_name ?? '';
        $this->font = $user->font ?? 'Roboto';
        $this->background_color = $user->background_color ?? '#fff';
        $this->profile_lang = $user->profile_lang ?? 'de';
        $this->form_label = $user->form_label ?? false;
        $this->custom_fields = array_values(is_array($user->custom_fields)
            ? $user->custom_fields
            : json_decode($user->custom_fields, true) ?? []);
    }

    public function handleSettingsUpdate($field, $value)
    {
        $this->$field = $value;
    }

    public function updateCustomFields($fields)
    {
        // Update the custom_fields property when the child component emits an event
        $this->custom_fields = $fields;
    }

    public function save()
    {
        try {
            $user = Auth::user();
            $validatedData = $this->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'password' => 'nullable|min:6|confirmed',
                'font' => 'required|string',
                'background_color' => 'required|string',
                'profile_lang' => 'required|string',
                'form_label' => 'boolean',
                'custom_fields' => 'array',
                'custom_fields.*.type' => 'required|string',
                'custom_fields.*.value' => 'required|string',
            ]);
            if ($this->password) {
                $validatedData['password'] = Hash::make($this->password);
            } else {
                unset($validatedData['password']);
            }
            $validatedData['custom_fields'] = json_encode($validatedData['custom_fields']);
            $user->update($validatedData);
            session()->flash('success', 'Profile updated successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors
            session()->flash('error', 'Validation error: ' . $e->getMessage());
        } catch (\Exception $e) {
            // Handle all other errors
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.pages.dashboard.profile')
            ->layout('livewire.components.app')
            ->with([
                'formSettings' => [
                    'background_color' => $this->background_color,
                    'font' => $this->font,
                    'form_label' => $this->form_label,
                    'profile_lang' => $this->profile_lang,
                ],
                'fieldDropdown' => [
                    'custom_fields' => $this->custom_fields,
                ]
            ]);
    }
}
