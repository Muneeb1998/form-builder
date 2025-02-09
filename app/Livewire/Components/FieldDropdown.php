<?php

namespace App\Livewire\Components;

use Livewire\Component;

class FieldDropdown extends Component
{
    public $custom_fields;

    public function mount($custom_fields)
    {
        $this->custom_fields = $custom_fields;
    }

    public function addField(string $type)
    {
        // Add a new field to the custom_fields array
        $this->custom_fields[] = [
            'type' => $type,
            'value' => ''
        ];

        // Emit event to update parent
        $this->dispatch('custom-fields-updated', fields: $this->custom_fields);
    }

    public function updateField(string $type, string $value, int $index)
    {
        // Update the field at the specified index
        if (isset($this->custom_fields[$index])) {
            $this->custom_fields[$index] = [
                'type' => $type,
                'value' => $value
            ];

            // Emit event to update parent
            $this->dispatch('custom-fields-updated', fields: $this->custom_fields);
        }
    }

    public function removeField(int $index)
    {
        // Remove the field at the specified index
        if (isset($this->custom_fields[$index])) {
            unset($this->custom_fields[$index]);
            $this->custom_fields = array_values($this->custom_fields); // Re-index the array

            // Emit event to update parent
            $this->dispatch('custom-fields-updated', fields: $this->custom_fields);
        }
    }

    public function render()
    {
        return view('livewire.components.field-dropdown');
    }
}