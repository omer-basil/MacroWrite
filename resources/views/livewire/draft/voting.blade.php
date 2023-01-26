<div class="flex items-center justify-center">
    @auth()
        <i class="far fa-bookmark mx-4 text-gray-200 @if($bookmarkActive) text-red-600 @endif" style="cursor: pointer" wire:click.prevent="bookmark"> {{ $bookmarks }}</i>
        <i class="far fa-thumbs-up mx-2 text-gray-200 @if($likeActive) text-red-600 @endif" style="cursor: pointer" wire:click.prevent="like"> {{ $likes }}</i>
        <i class="far fa-thumbs-down mx-2 text-gray-200 @if($dislikeActive) text-red-600 @endif" style="cursor: pointer" wire:click.prevent="dislike"> {{ $dislikes }}</i>
    @else
        <div x-data="{ open: false }">
            <a class="far fa-bookmark mx-2 text-gray-200" x-on:click="open = ! open"></a>
            <a class="far fa-thumbs-up mx-2 text-gray-200" x-on:click="open = ! open"></a>
            <a class="far fa-thumbs-down mx-2 text-gray-200" x-on:click="open = ! open"></a>
        
            <p class="bg-white shadow absolute px-4 py-2 mx-2 text-gray-600 .ease-in" x-show="open">
                Ops! you have to log in to proceed.
            </p>
        </div>
    @endauth
</div>
