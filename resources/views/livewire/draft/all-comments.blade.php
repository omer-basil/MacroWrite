<div>
    <h3 class="mb-4 text-lg font-semibold text-gray-900">{{ $draft->allCommentsCount() }} {{ Str::plural('Comment', $draft->allCommentsCount()) }}</h3>
    <div class="space-y-4">
        @include('includes.replies', ['comments' => $draft->comments])
    </div>
</div>
