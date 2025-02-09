<?php

namespace App\Livewire\Components;

use Livewire\Component;

class FormSettings extends Component
{
    public $background_color;
    public $font;
    public $form_label;

    public function mount($background_color, $font, $form_label)
    {
        $this->background_color = $background_color;
        $this->font = $font;
        $this->form_label = $form_label;
    }

    // Add these methods to emit updates
    public function updatedBackgroundColor($value)
    {
        $this->dispatch('settings-updated', field: 'background_color', value: $value);
    }

    public function updatedFont($value)
    {
        $this->dispatch('settings-updated', field: 'font', value: $value);
    }

    public function updatedFormLabel($value)
    {
        $this->dispatch('settings-updated', field: 'form_label', value: $value);
    }

    public function render()
    {
        return view('livewire.components.form-settings');
    }
}