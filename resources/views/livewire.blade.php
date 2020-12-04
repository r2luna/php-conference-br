<x-app-layout>
    <x-whatsapp>
        <div class="w-1/3 border flex flex-col">
            <x-whatsapp.contacts.header/>

            <div class="py-2 px-2 bg-gray-100">
                <x-whatsapp.contacts.search/>
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
            </div>
        </div>

        <div class="w-2/3 border flex flex-col bg-gray-100">
            <x-whatsapp.conversation.header
                contact="Arnold Schwarzenegger"
                photo="https://www.biography.com/.image/t_share/MTE5NDg0MDU1MTIyMTE4MTU5/arnold-schwarzenegger-9476355-1-402.jpg"
            />

            @if(request()->has('image'))
                <div class="h-full bg-gray-200">
                    <div class="flex bg-teal-500 text-white text-lg px-6 py-3 space-x-8 items-center">
                        <a href="/">
                            <x-icons.x class="h-5 w-5 text-white"/>
                        </a>
                        <span>Preview</span>
                    </div>

                    <div class="bg-gray-100 flex flex-col h-3/4 justify-center w-full py-4">
                        <img class="h-5/6 m-auto"
                             src="https://devsquad.com/wp-content/uploads/2020/09/DevSquad_Web-AboutPage_Icons_4_Developers-1.svg"
                             alt="Image">

                        <input type="text"
                               class="border-0 border-b-2 border-teal-500 w-1/2 mx-auto bg-gray-100 focus:outline-none"
                               placeholder="Add a caption..."/>
                    </div>

                    <div class="relative">
                        <button
                            class="hover:bg-emerald-500 -mt-8 absolute bg-emerald-300 flex h-16 items-center justify-center mr-24 right-0 rounded-full w-16">
                            <x-icons.airplane class="text-white h-8 w-8 "/>
                        </button>
                    </div>
                </div>

            @else

                <div class="flex-1 overflow-auto bg-warmGray-300">

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

                        <x-whatsapp.conversation.in
                            message="Olha que legal"
                            time="12:55 pm"
                            photo="https://webmeup.com/upload/blog/lead-image-105.png"
                        />
                    </div>
                </div>

                <div class="bg-gray-100 px-4 py-4 flex items-center space-x-4">
                    <button>
                        <a href="?image1">
                            <x-icons.emoji/>
                        </a>
                    </button>

                    <input type="file" id="attachment" class="hidden" accept="image/x-png,image/gif,image/jpeg">
                    <button onclick="document.getElementById('attachment').click()">
                        <x-icons.attachment/>
                    </button>

                    <div class="flex-1">
                        <input class="w-full border rounded px-2 py-2 focus:outline-none" type="text"/>
                    </div>

                    <button>
                        {{-- <x-icons.airplane class="text-gray-400 h-7 w-7"/> --}}
                        <x-icons.mic/>
                    </button>

                </div>
            @endif
        </div>
    </x-whatsapp>
</x-app-layout>
