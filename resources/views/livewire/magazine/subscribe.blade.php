<div>
    <div class="flex">
        @auth
            <button wire:click.prevent="toggle" class="h-full w-full md:p-6 p-4 text-gray-100 text-lg rounded-lg focus:border-4 {{ $userSubscribed ? 'bg-gray-500 border-gray-300' : 'bg-red-500 border-red-300'}}">
                <h2 class="text-xl text-center text-gray-200 capitalize">{{$magazine->subscribers()}}</h2>
                <h3 class="text-sm  text-gray-400  text-center">{{Str::plural('Subscribtion', $magazine->subscribers())}}</h3>
            </button>
        @else
            <button type="button" class="h-full w-full md:p-6 p-4 text-gray-100 text-lg rounded-lg focus:border-4 bg-red-500 border-red-300" data-bs-toggle="popover" data-bs-title="Popover title" data-bs-content="And here's some amazing content. It's very engaging. Right?">
                <h2 class="text-xl text-center text-gray-200 capitalize">{{$magazine->subscribers()}}</h2>
                <h3 class="text-sm  text-gray-400  text-center">{{Str::plural('Subscribtion', $magazine->subscribers())}}</h3>
            </button>
        @endauth
    </div>

</div>