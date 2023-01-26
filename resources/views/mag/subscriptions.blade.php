<x-app-layout>
    <div class="bg-gray-200 font-sans h-screen w-full flex flex-row justify-center items-center">
        @foreach($subscriptions as $subscription)
            <div class="card w-96 mx-auto bg-white  shadow-xl hover:shadow">
                <img class="w-32 h-32 mx-auto rounded-full -mt-20 border-8 border-white" src="{{ asset('images/' . $subscription->magazine->image) }}" alt="">
                <div class="text-center mt-2 text-3xl font-medium">{{$subscription->magazine->slug}}</div>
                <div class="text-center mt-2 font-light text-sm">{{$subscription->magazine->name}}</div>
                <div class="text-center font-normal text-lg">{{$subscription->magazine->user->name}}</div>
                <div class="px-6 text-center mt-2 font-light text-sm">
                    <p>
                        {{$subscription->magazine->description}}
                    </p>
                </div>
                <hr class="mb-2">
                <div class="flex p-4">
                    <div class="w-1/2 text-center">
                        <span class="font-bold">{{$subscription->magazine->subscribes->count()}}</span> {{ Str::plural('Follower', $subscription->magazine->subscribes->count()) }}
                    </div>
                <div class="w-0 border border-gray-300">
                    
                </div>
                    <div class="w-1/2 text-center">
                        <span class="font-bold">{{$subscription->magazine->drafts->where('visibility', 'LIKE', 'public')->whereNotNull('title', 'abstract')->count()}}</span> {{ Str::plural('Articles', $subscription->magazine->drafts->count()) }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>