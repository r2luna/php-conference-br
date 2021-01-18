<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Whatsapp extends Component
{
    public ?string $search = '';

    public ?Contact $selectedContact = null;

    public function render()
    {
        $contacts = Contact::with('lastMessage')
            ->when($this->search, fn(Builder $query) => $query->where('name', 'like', "%{$this->search}%"))
            ->get();

        if (! $this->selectedContact) {
            $this->selectedContact = $contacts->first();
        }

        return view('livewire.whatsapp', [
            'contacts' => $contacts,
        ]);
    }

    public function selectContact($id)
    {
        $this->selectedContact = Contact::query()->find($id);

        $this->emit('contactSelected', $id);
        $this->dispatchBrowserEvent('contact-selected');
    }
}
