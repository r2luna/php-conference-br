@props(['contact', 'photo'])

<div class="py-2 px-3 bg-gray-100 flex flex-row justify-between items-center">
    <div class="flex items-center">
        <div>
            <img class="w-10 h-10 rounded-full" alt="{{ $contact }}"
                 src="{{ $photo }}"/>
        </div>
        <div class="ml-4">
            <p class="text-gray-600est">
                {{ $contact }}
            </p>
            <p class="text-gray-600er text-xs mt-1">
                click here for contact info
            </p>
        </div>
    </div>

    <div class="flex space-x-6">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path fill="#263238" fill-opacity=".5"
                      d="M15.9 14.3H15l-.3-.3c1-1.1 1.6-2.7 1.6-4.3 0-3.7-3-6.7-6.7-6.7S3 6 3 9.7s3 6.7 6.7 6.7c1.6 0 3.2-.6 4.3-1.6l.3.3v.8l5.1 5.1 1.5-1.5-5-5.2zm-6.2 0c-2.6 0-4.6-2.1-4.6-4.6s2.1-4.6 4.6-4.6 4.6 2.1 4.6 4.6-2 4.6-4.6 4.6z"></path>
            </svg>
        </div>

        <div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path fill="#263238" fill-opacity=".6"
                      d="M12 7a2 2 0 1 0-.001-4.001A2 2 0 0 0 12 7zm0 2a2 2 0 1 0-.001 3.999A2 2 0 0 0 12 9zm0 6a2 2 0 1 0-.001 3.999A2 2 0 0 0 12 15z"></path>
            </svg>
        </div>
    </div>
</div>
