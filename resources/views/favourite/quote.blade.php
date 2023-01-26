<x-app-layout>
    <div class="container mb-2 flex mx-auto w-full items-center justify-center">
        <ul class="flex flex-col p-4">
            @foreach($quotes as $quote)
                <li class="border-gray-400 flex flex-row">
                    <div class="select-none flex flex-1 items-center p-4 transition duration-500 ease-in-out transform hover:-translate-y-2 rounded-2xl border-2 p-6 hover:shadow-2xl border-red-400">
                        <div class="flex-1 pl-1 mr-16">
                            <div class="font-medium">
                                {{$quote->quoteBody}}
                            </div>
                            <span>({{$quote->draft->magazine->user->name}}, </span>
                            <span>{{$quote->created_at->year}})</span>
                        </div>
                        <button class="cursor-pointer w-16 h-8 text-wrap text-center flex text-white text-bold flex-col rounded-md bg-red-500 justify-center items-center mr-10 p-2">
                            <a class="fas fa-plus-circle" href="{{ route('draft.show', $quote->draft->uid) }}">Reread</a>
                        </button>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>