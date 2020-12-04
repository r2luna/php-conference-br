<x-whatsapp>
    <div class="w-1/3 border flex flex-col">
        <x-whatsapp.contacts.header/>

        <div class="py-2 px-2 bg-gray-100">
            <x-whatsapp.contacts.search wire:model="search"/>
        </div>

        <div class="bg-white flex-1 overflow-auto">
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
