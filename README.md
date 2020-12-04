# PHP Conference BR - Livewire

## Step 1 - Install Livewire

``` bash
composer require livewire/livewire
```

## Step 2 - Add @livewire to layouts/app.blade.php

`layouts/app.blade.php`
``` html
<head>
    ...
    @livewireStyles
</head>

<body>
....
@livewireScripts
</body>

</html>
```

## Step 2.1 - Show Example component


-----

## Step 2.2 - Show tests

-- Follow tests


## Step 3 - Create Livewire component

``` bash
php artisan make:livewire whatsapp
```

## Step 4 - Link route to livewire component

``` php
Route::get('whatsapp', \App\Http\Livewire\Whatsapp::class);
```

## Step 5 - Whatsapp Blade

Copy everything from `livewire.blade.php` to `whatsapp.blade.php`
``` php
<x-whatsapp>
    <div class="w-1/3 border flex flex-col">
        <x-whatsapp.contacts.header/>

        <div class="py-2 px-2 bg-gray-100">
            <x-whatsapp.contacts.search />
        </div>

        <div class="bg-white flex-1 overflow-auto">
            <x-whatsapp.contact
                    class="bg-gray-100"
                    contact="Arnold Schwarzenegger"
                    photo="https://www.biography.com/.image/t_share/MTE5NDg0MDU1MTIyMTE4MTU5/arnold-schwarzenegger-9476355-1-402.jpg"
                    time="12:45 pm"
                    message="Tudo bom?"
                />

                <x-whatsapp.contact
                    class="bg-white"
                    contact="Russell Crowe"
                    photo="https://www.famousbirthdays.com/headshots/russell-crowe-6.jpg"
                    time="12:45 pm"
                    message="Tranquilo aí?"
                />

            @foreach($contacts as $contact)
                <x-whatsapp.contact
                    wire:click="selectContact({{ $contact->id }})"
                    wire:key="{{ $contact->id }}"
                    class="{{ $contact->id == $selectedContact->id ? 'bg-gray-100' : 'bg-white'}}"
                    :contact=" $contact->name"
                    :photo="$contact->photo"
                    :time="$contact->lastMessage->created_at->diffForHumans()"
                    :message="$contact->lastMessage->message"
                />
            @endforeach
        </div>

    </div>


</x-whatsapp>

```

``` php
<x-whatsapp>
    <div class="w-1/3 border flex flex-col">
        <x-whatsapp.contacts.header/>

        <div class="py-2 px-2 bg-gray-100">
            <x-whatsapp.contacts.search />
        </div>

        <div class="bg-white flex-1 overflow-auto">
            @foreach($contacts as $contact)
                <x-whatsapp.contact
                    wire:key="{{ $contact->id }}"
                    {{-- class="{{ $contact->id == $selectedContact->id ? 'bg-gray-100' : 'bg-white'}}" --}}
                    :contact=" $contact->name"
                    :photo="$contact->photo"
                    :time="$contact->lastMessage->created_at->diffForHumans()"
                    :message="$contact->lastMessage->message"
                />
            @endforeach
        </div>

    </div>


</x-whatsapp>

```

`Livewire\Messages.php`

``` php
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
        $contacts = Contact::query()
            ->when($this->search, fn(Builder $query) => $query->where('name', 'like', "%{$this->search}%"))
            ->withLastMessage()
            ->get();

        if (!$this->selectedContact) {
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

```


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




<form wire:submit.prevent="save" class="border flex flex-col bg-gray-100 w-2/3"
      x-data
      @contact-selected.window="$refs.scroll.scrollTop = $refs.scroll.scrollHeight"
      @message-send.window="$refs.scroll.scrollTop = $refs.scroll.scrollHeight"
      x-init="
        $refs.scroll.scrollTop = $refs.scroll.scrollHeight
      ">

    <x-whatsapp.conversation.header
        :contact="$contact->name"
        :photo="$contact->photo"
    />

    @if($this->image)
        <div class="h-full bg-gray-200">
            <div class="flex bg-teal-500 text-white text-lg px-6 py-3 space-x-8 items-center">
                <button wire:click="cancel">
                    <x-icons.x class="h-5 w-5 text-white"/>
                </button>
                <span>Preview</span>
            </div>

            <div class="bg-gray-100 flex flex-col h-3/4 justify-center w-full py-4">
                <img class="h-5/6 m-auto"
                     src="{{ $image->temporaryUrl() }}"
                     alt="Image">

                <input type="text"
                       class="border-0 border-b-2 border-teal-500 w-1/2 mx-auto bg-gray-100 focus:outline-none"
                       placeholder="Add a caption..." wire:model="text"/>
            </div>

            <div class="relative">
                <button wire:click="save"
                        class="hover:bg-emerald-500 -mt-8 absolute bg-emerald-300 flex h-16 items-center justify-center mr-24 right-0 rounded-full w-16">
                    <x-icons.airplane class="text-white h-8 w-8 "/>
                </button>
            </div>
        </div>

    @else

        <div class="flex-1 overflow-auto bg-warmGray-300" x-ref="scroll"
        >
            <div class="py-2 px-3">
                @foreach($contact->messages()->orderBy('send_at')->get()->groupBy('send_at') as $day => $messages)
                    <x-whatsapp.conversation.day :day="$day"/>

                    @if($loop->first)
                        <x-whatsapp.conversation.security-disclaimer/>
                    @endif

                    @foreach($messages as $message)
                        <x-whatsapp.conversation.message
                            :direction="$message->direction"
                            :image="$message->image"
                            :message="$message->message"
                            :time="$message->created_at->format('h:i a')"
                        />
                    @endforeach

                @endforeach
            </div>
        </div>


        <div class="bg-gray-100 px-4 py-4 flex items-center space-x-4">
            <button type="button">
                <x-icons.emoji/>
            </button>

            <input type="file" id="attachment" class="hidden" accept="image/x-png,image/gif,image/jpeg"
                   wire:model="image">
            <button type="button" onclick="document.getElementById('attachment').click()">
                <x-icons.attachment/>
            </button>

            <div class="flex-1">
                <input class="w-full rounded-full px-4 py-2 focus:outline-none text-sm text-gray-600 "
                       type="text" placeholder="Type a message" wire:model="text"/>
            </div>

            @if(strlen($text) > 0)
                <button type="submit">
                    <x-icons.airplane class="text-gray-400 h-7 w-7"/>
                </button>
            @else
                <button type="button">
                    <x-icons.mic/>
                </button>
            @endif
        </div>
    @endif
</form>
