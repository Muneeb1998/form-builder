<?php

namespace App\Livewire\Pages\Dashboard;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Contact;

#[Layout('livewire.components.app')]
class Support extends Component
{
    public $subject;
    public $message;
    public function mount()
    {
        set_lang();
    }
    public function save()
    {
        try {
            $validatedData = $this->validate([
                'subject' => 'required|string|max:100',
                'message' => 'required|string|max:2000',
            ]);
            $validatedData['user_id'] = auth()->id();
            Contact::create($validatedData);
            session()->flash('success', 'Thank you for contacting us. We will revert to you shortly.');
            $this->reset(['subject', 'message']);
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
        return view('livewire.pages.dashboard.support');
    }
}
