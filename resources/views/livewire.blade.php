<x-app-layout>
    <x-whatsapp>
        <div class="w-1/3 border flex flex-col">
            <x-whatsapp.contacts.header/>

            <div class="py-2 px-2 bg-gray-100">
                <x-whatsapp.contacts.search/>
            </div>

            <div class="bg-gray-100 flex-1 overflow-auto">
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
            </div>
        </div>

        <div class="w-2/3 border flex flex-col">
            <x-whatsapp.conversation.header
                contact="Arnold Schwarzenegger"
                photo="https://www.biography.com/.image/t_share/MTE5NDg0MDU1MTIyMTE4MTU5/arnold-schwarzenegger-9476355-1-402.jpg"
            />

            <div class="flex-1 overflow-auto" style="background-color: #DAD3CC">
                <div class="py-2 px-3">
                    <x-whatsapp.conversation.day day="December 1, 2020"/>

                    <x-whatsapp.conversation.security-disclaimer/>

                    <x-whatsapp.conversation.in
                        message="Opa!"
                        time="12:45 pm"
                    />

                    <x-whatsapp.conversation.in
                        message="Tudo bom?"
                        time="12:46 pm"
                    />

                    <x-whatsapp.conversation.out
                        message="Oi Mano!"
                        time="12:50 pm"
                    />
                </div>
            </div>

            <div class="bg-gray-100 px-4 py-4 flex items-center space-x-4">
                <div>
                    <x-icons.emoji/>
                </div>

                <div>
                    <x-icons.attachment/>
                </div>

                <div class="flex-1">
                    <input class="w-full border rounded px-2 py-2" type="text"/>
                </div>

                <div>
                    {{-- <x-icons.airplane /> --}}
                    <x-icons.mic/>
                </div>
            </div>
        </div>
    </x-whatsapp>
</x-app-layout>
