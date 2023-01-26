@foreach($comments->reverse() as $comment)
    <div class="flex" x-data="{ open:false, openReply:false }">
        <div class="flex-shrink-0 mr-3">
            <!-- <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="{{ asset('/images/' . $comment->image) }}" alt=""> -->
            @if(!$comment->user->magazine)
                <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="/images/anon.png" alt="">
            @else
                <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="{{ asset('/images/' . $comment->user->magazine->image) }}" alt="">   
            @endif
        </div>
        <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
            @if(!$comment->user->magazine)
                <strong>{{ $comment->user->name }}</strong>
                @else
                <strong><a href="{{ route('mag.show', $comment->user->magazine) }}">{{ $comment->user->magazine->slug }}</a></strong>
            @endif
            <span class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>

            <p class="text-sm">
                {{ $comment->body }}
            </p>
            <a href="" @click.prevent="openReply = !openReply">Reply</a>
            @if($comment->replies->count())
                <div class="text-sm text-gray-500 font-semibold">
                    <a href="" @click.prevent="open = !open">
                        View {{ $comment->replies->count() }} {{ Str::plural('Reply', $comment->replies->count()) }}
                    </a>
                </div>
                <div x-show="open">
                    @include('includes.replies', ['comments' => $comment->replies])
                </div>
            @endif
            <div x-show="openReply">
                    @auth()
                        <livewire:draft.create-comment :draft="$draft" :col="$comment->id" :key="$comment->id . uniqid()"/>
                    @endauth()
                </div>
        </div>
    </div>
@endforeach
