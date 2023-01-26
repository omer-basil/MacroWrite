<x-app-layout :title="$magazine->slug">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <header>
                    <!-- Section Hero -->
                    <div class="container mx-auto bg-gray-400 h-96 rounded-md flex items-center">
                        <div class="sm:ml-20 text-gray-50 text-center sm:text-left">
                            <h1 class="text-5xl font-bold mb-4">
                            Search <br />
                            everywhere.
                            </h1>
                            <p class="text-lg inline-block sm:block"></p>
                            <div class="mt-8 px-4 py-2 rounded">
                                <livewire:magazine.subscribe :magazine="$magazine" />
                            </div>
                            
                        </div>
                    </div>
                </header>

                <main class="py-16 container mx-auto px-6 md:px-12">
                    <section>
                    <h1 class="text-3xl font-bold text-gray-600 mb-10">{{ $magazine->slug }}</h1>
                    <div class="grid sm:grid-cols-3 gap-4 grid-cols-2">
                        
                                @foreach($drafts as $draft)
                                    <x-draft :draft="$draft"/>
                                @endforeach

                    </div>
                    <hr class="w-40 my-14 border-4 rounded-md sm:mx-0 mx-auto" />
                    </section>
                    <section>
                        <h1 class="inline-block text-gray-600 font-bold text-3xl">
                            Publish your thoughts
                            <br/>
                            (or think aloud).
                        </h1>

                        <div class="grid grid-cols-3 gap-4 mt-10">
                            <div>
                            <h3 class="text-lg font-semibold text-gray-500 mt-2">1. Browse and save</h3>
                            <p class="text text-gray-400">
                                You can search for what you want to read about, once you find it, you can add it to your list to be red multipile times, react with it, share it and save quotes,
                            </p>
                            </div>
                            <div>
                            <h3 class="text-lg font-semibold text-gray-500 mt-2">2. Have a great experiance</h3>
                            <p class="text text-gray-400">
                                You can have your own magazine for free; not only but also, you can saave quotes and include them in your articles.
                            </p>
                            </div>
                            <div>
                            <h3 class="text-lg font-semibold text-gray-500 mt-2">3. Review and discuss</h3>
                            <p class="text text-gray-400">
                                You can discuss and share your comments on others publications, and discuss your point of view here or in any other platforms, simply by sharing it by the share button or the link. 
                            </p>
                            </div>
                        </div>
                    </section>
                </main>
                
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
