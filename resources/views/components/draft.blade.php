@props(['draft' => $draft])
<div class="w-96 h-64 py-4 px-8 bg-white shadow-lg rounded-lg my-20 relative">
    <div class="flex justify-center md:justify-end -mt-16">
        <img class="w-20 h-20 object-cover rounded-full border-2 border-indigo-500" src="{{ asset('/images/' . $draft->magazine->image) }}">
    </div>
    <div>
        <div class="flex wrap">
            <i class="flex wrap">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div class="not-italic flex inline-block align-bottom">
                    <p>
                        {{ $draft->readTime }}
                    </p>
                    <span class="text-xs">
                        :Min
                    </span>
                </div>
            </i>
            <i class="flex wrap">
                @if($draft->visibility !== 'public')
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                    </svg>
                @endif
            </i>
        </div>
        <h2 class="text-gray-800 text-lg font-semibold">{{ $draft->title }}</h2>
        <p class="mt-2 text-xs text-gray-600">
            {{ $draft->abstract }}
        </p>
        <a href="{{ route('draft.show', $draft->uid) }}" class="text-red-500 inline-flex items-center m-4 absolute bottom-0 left-5">Read More
            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14"></path>
                <path d="M12 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>
    <div class="flex justify-end m-4 absolute bottom-0 right-5">
        <a href="{{ route('mag.show', $draft->magazine) }}" class="text-xl font-medium text-indigo-500">{{ $draft->magazine->slug }}</a>
    </div>
</div>