<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Whatsapp extends Component
{
    public string $search = '';

    public object $contacts;

    public Contact $selectedContact;

    public function mount()
    {
        $this->search = '';

        $this->contacts = Contact::with('lastMessage')->get();

        $this->selectedContact = $this->contacts->first();
    }

    public function updatedSearch()
    {
        $this->contacts = Contact::with('lastMessage')
            ->when($this->search, fn(Builder $query) => $query->where('name', 'like', "%{$this->search}%"))
            ->get();
    }

    public function selectContact($id)
    {
        $this->selectedContact = Contact::firstOrFail($id);

        $this->emit('contactSelected', $id);
        $this->dispatchBrowserEvent('contact-selected');
    }

    public function render()
    {
        return view('livewire.whatsapp');
    }
}
