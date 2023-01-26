<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                <main class="py-16 container mx-auto px-6 md:px-12">
                    <section>
                    <h1 class="text-3xl font-bold text-gray-600 mb-10">Drafts you have liked..</h1>
                    <div class="grid sm:grid-cols-3 gap-4 grid-cols-2">
                        @foreach($likeds as $liked)
                            <div class="w-96 h-64 py-4 px-8 bg-white shadow-lg rounded-lg my-20 relative">
                                <div class="flex justify-center md:justify-end -mt-16">
                                    <img class="w-20 h-20 object-cover rounded-full border-2 border-indigo-500" src="{{ asset('/images/' . $liked->draft->magazine->image) }}">
                                </div>
                                <div>
                                    <h2 class="text-gray-800 text-3xl font-semibold">{{ $liked->draft->title }}</h2>
                                    <p class="mt-2 text-gray-600">
                                        {{ $liked->draft->abstract }}
                                    </p>
                                    <a href="{{ route('draft.show', $liked->draft->uid) }}" class="text-red-500 inline-flex items-center m-4 absolute bottom-0 left-5">Read More
                                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="flex justify-end m-4 absolute bottom-0 right-5">
                                    <a href="{{ route('mag.show', $liked->draft->magazine) }}" class="text-xl font-medium text-indigo-500">{{ $liked->draft->magazine->slug }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr class="w-40 my-14 border-4 rounded-md sm:mx-0 mx-auto" />

                <footer class="mb-6 px-6 md:px-0">
                    <div class="grid gap-5 grid-cols-5 container mx-auto space-x-6">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-500">MacroWrite</h1>
                        <p>Think aloud</p>
                        <spa>© MacroWrite 2022</spa>
                    </div>
                    <div class="pt-2">
                        <ul>
                            <li><i class="fas fa-circle"></i>Create an account</li>
                            <li><i class="fas fa-circle"></i>Create a magazine</li>
                            <li><i class="fas fa-circle"></i>Write your thoughts</li>
                            <li><i class="fas fa-circle"></i>Publish your thoughts</li>
                            <li><i class="fas fa-circle"></i>Discuss your point of view</li>
                        </ul>
                    </div>
                    <div class="pt-2">
                        <ul>
                            
                        </ul>
                    </div>
                    <div class="pt-2">
                        <ul>
                        
                        </ul>
                    </div>
                    <div class="pt-2">
                        <div>
                        <div class="flex space-x-4 text-gray-500 text-center">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </span>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M5 3a2 2 0 00-2 2v1c0 8.284 6.716 15 15 15h1a2 2 0 002-2v-3.28a1 1 0 00-.684-.948l-4.493-1.498a1 1 0 00-1.21.502l-1.13 2.257a11.042 11.042 0 01-5.516-5.517l2.257-1.128a1 1 0 00.502-1.21L9.228 3.683A1 1 0 008.279 3H5z" />
                                </svg>
                            </span>
                        </div>
                        <div class="mt-12">
                            <a href="#">Privacy & Cookies</a>
                            <br>
                            <a href="#">Terms of use</a>
                        </div>
                        </div>
                    </div>
                    </div>
                </footer>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>