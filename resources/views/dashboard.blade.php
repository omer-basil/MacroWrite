<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <header>
                    <!-- Section Hero -->
                    <!-- <div class="container mx-auto bg-gray-400 h-96 rounded-md flex items-center">
                        <div class="sm:ml-20 text-gray-50 text-center sm:text-left">
                            <h1 class="text-5xl font-bold mb-4">
                            Search <br />
                            everywhere.
                            </h1>
                            <p class="text-lg inline-block sm:block"></p>
                            <button class="mt-8 px-4 py-2 bg-gray-600 rounded">Browse saunas</button>
                        </div>
                    </div> -->
                </header>

                <main class="py-16 w-full container mx-auto px-6 md:px-12">
                    <section>
                        <div class="grid md:grid-cols-3 gap-4 justify-items-center flex flex-wrap">
                            
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
                
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
