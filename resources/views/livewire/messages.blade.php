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
                       placeholder="Add a caption..." wire:model.defer="text"/>
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
