<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mx-auto container max-w-2xl md:w-3/4 shadow-md">
                <div class="bg-gray-100 p-4 border-t-2 bg-opacity-5 border-indigo-400 rounded-t">
                    <div class="max-w-sm mx-auto md:w-full md:mx-0">
                        @if($magazine)
                            <div class="inline-flex items-center space-x-4">
                                <img class="w-10 h-10 object-cover rounded-full" alt="User avatar" src="{{ asset('images/' . $user->magazine->image) }}"/>
                                <a href="{{ route('mag.show', $magazine) }}" class="text-gray-600 font-serif text-2xl">{{ $user->magazine->slug }}</a>
                            </div>
                        @else
                            <h1 class="text-gray-600 font-serif text-2xl">Create a magazine</h1>
                        @endif
                    </div>
                    </div>
                    <div class="bg-white space-y-6">
                        <div class="md:inline-flex space-y-4 md:space-y-0 w-full p-4 text-gray-500 items-center font-mono">
                            <h2 class="md:w-1/3 max-w-sm mx-auto">Account</h2>
                            <div class="md:w-2/3 max-w-sm mx-auto">
                                <label class="text-sm text-gray-400">Email</label>
                                <div class="w-full inline-flex border">
                                    <div class="pt-2 w-1/12 bg-gray-100 bg-opacity-50">
                                        <svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <input type="email" class="w-11/12 focus:outline-none focus:text-gray-600 p-2" placeholder="{{ $user->email }}" disabled/>
                                </div>
                            </div>
                        </div>

                        <hr/>
                        <form action="{{ route('mag.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="md:inline-flex  space-y-4 md:space-y-0  w-full p-4 text-gray-500 items-center font-mono">
                                <h2 class="md:w-1/3 mx-auto max-w-sm">Magazine info</h2>
                                <div class="md:w-2/3 mx-auto max-w-sm space-y-5">
                                    <div>
                                        <label class="text-sm text-gray-400">Full name</label>
                                        <div class="w-full inline-flex border">
                                            <div class="w-1/12 pt-2 bg-gray-100">
                                                <svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                                </svg>
                                            </div>
                                            <input type="text" class="w-11/12 focus:outline-none focus:text-gray-600 p-2 @error('magname') border-red-500 @enderror" placeholder="Choose a name for your magazine" name="magname" @if($magazine) value="{{ $user->magazine->name }}" @else value="{{ old('magname') }}" @endif/>
                                        </div>
                                        @error('magname')
                                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                                Field must be filled.
                                            </span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="text-sm text-gray-400">Description</label>
                                        <div class="w-full inline-flex border">
                                            <div class="pt-2 w-1/12 bg-gray-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 text-gray-400 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                                </svg>
                                            </div>
                                            <input type="text" class="w-11/12 focus:outline-none focus:text-gray-600 p-2 @error('magdesc') border-red-500 @enderror" placeholder="Describe your activities" name="magdesc" @if($magazine) value="{{ $user->magazine->description }}" @else value="{{ old('magdesc') }}" @endif/>
                                            @error('magdesc')
                                                <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                                    Field must be filled.
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr/>
                            <div class="md:inline-flex w-full space-y-4 md:space-y-0 p-8 text-gray-500 items-center font-mono">
                                <h2 class="md:w-4/12 max-w-sm mx-auto">Choose an image</h2>

                                <div class="extraOutline p-4 bg-white w-max bg-whtie m-auto rounded-lg">
                                    <div class="mb-5 text-center">
                                        <div class="mx-auto w-32 h-32 mb-2 border rounded-full relative bg-gray-100 mb-4 shadow-inset">
                                            <img id="image" class="object-cover w-full h-32 rounded-full" :src="image" />
                                        </div>
                                        
                                        <label for="fileInput" type="button" class="cursor-pointer inine-flex justify-between items-center focus:outline-none border py-2 px-4 rounded-lg shadow-sm text-left text-gray-600 bg-white hover:bg-gray-100 font-medium">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-flex flex-shrink-0 w-6 h-6 -mt-1 mr-1" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                                <path d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                                                <circle cx="12" cy="13" r="3" />
                                            </svg>						
                                            Browse Photo
                                        </label>

                                        <div class="mx-auto w-48 text-gray-500 text-xs text-center mt-1">Click to add profile picture</div>

                                        <input name="image" id="fileInput" accept="image/*" class="hidden" type="file" onchange="loadFile(event)" change="let file = document.getElementById('fileInput').files[0]; var reader = new FileReader(); reader.onload = (e) => image = e.target.result; reader.readAsDataURL(file);">
                                    </div>
                                    @error('image')
                                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                            Image must be uploaded.
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <hr />
                            
                            <div class="w-full p-4 text-right text-gray-500">
                                <button class="inline-flex items-center focus:outline-none mr-4" type="submit" name="magupdate">
                                    <svg fill="none" class="w-4 text-white mr-2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    </svg>
                                    @if($magazine)
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                        </svg>
                                        Update
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z" />
                                        </svg>
                                        Create
                                    @endif
                                </button>
                            </div>
                        </form>

                        <hr />
                        @if($magazine)
                            <form action="{{ route('mag.delete', $magazine) }}" method="post">
                                @csrf
                                @method('delete')
                                <div class="w-full p-4 text-right text-gray-500" x-data="{ 'showModal': false }" @keydown.escape="showModal = false">
                                    <button class="inline-flex items-center focus:outline-none mr-4" name="magdelete" type="button" @click="showModal = true">
                                        <svg fill="none" class="w-4 mr-2" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                        Delete magazine
                                    </button>
                                    <!-- Modal -->
                                    <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50" x-show="showModal">
                                        <!-- Modal inner -->
                                        <div class="max-w-3xl px-6 py-4 mx-auto text-left bg-white rounded shadow-lg" @click.away="showModal = false" x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
                                            <!-- Title-->
                                            <div class="flex items-center justify-between">
                                                <h5 class="mr-3 font-serif text-2xl text-gray-800">Delete Magazine</h5>
                                            </div>
                                            <hr>
                                            <!-- content -->
                                            <div class="text-center font-mono text-lg text-gray-800 my-8">
                                                Are you certain about deleting your magazine?
                                                <br>
                                                This process cannot be undone!
                                            </div>
                                            <div class="font-mono text-lg text-gray-800">
                                                <button type="submit" class="bg-red-500 hover:bg-red-400 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow" @click="showModal = false">Confirm</button>
                                                <button type="button" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow" @click="showModal = false">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var loadFile = function(event) {
            var output = document.getElementById('image');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
    
</x-app-layout>
