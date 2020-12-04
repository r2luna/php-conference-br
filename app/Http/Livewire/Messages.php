<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Illuminate\Http\UploadedFile;
use Livewire\Component;
use Livewire\WithFileUploads;

class Messages extends Component
{
    use WithFileUploads;

    /** @var UploadedFile|null */
    public $image;

    public ?Contact $contact = null;

    public ?string $text = '';

    public $listeners = ['contactSelected'];

    public function render()
    {
        return view('livewire.messages');
    }

    public function contactSelected($id)
    {
        $this->contact = Contact::query()->find($id);
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:1024',
        ]);
    }

    public function cancel()
    {
        $this->image = null;
    }

    public function save()
    {
        $this->validate([
            'text' => 'required',
        ]);

        if ($this->image) {
            $filename = $this->image->store('/', 'public');
        }

        $this->contact->messages()->create([
            'message'   => $this->text,
            'direction' => 'out',
            'send_at'   => now(),
            'image'     => $filename ?? null,
        ]);

        $this->text  = '';
        $this->image = null;

        $this->dispatchBrowserEvent('message-send');
    }
}
