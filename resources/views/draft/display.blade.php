<x-app-layout :title="$draft->title">
    <div>
        <!-- main panel -->
            <div class="w-full flex-initial">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
                <div class="bg-grayDark mt-10" x-data="{ atTop: true }" x-on:scroll.window="atTop =( window.pageYOffset > 10) ? false : true ">
                    <div class="w-full md:pl-4 lg:pl-10 md:pr-4 flex self-start flex-col mt-5">
                        <div class="selectable-text-area w-full max-h-100 touch-auto sm:max-96 rounded overflow-y-auto shadow-inner bg-white flex flex-col p-6 md:py-8 lg:py-12 xl:py-16 md:px-8 lg:px-12 xl:px-20">
                            {!! $draft->body !!}
                            @auth()
                                @if(Auth::user()->owns($draft))
                                    <div class="inline-flex">
                                        <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
                                            <a href="{{ route('draft.edit', $draft->uid) }}">Edit</a>
                                        </button>
                                        <form action="{{ route('draft.delete', $draft) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            @endauth
                            <!-- quote section -->
                                <div x-data="{ showModal : false }">
                                    <button @click="showModal = !showModal" id="twitter-share-btn"><i class="fas fa-quote-right"></i></button>
                                    <!-- Modal Background -->
                                    <div x-show="showModal" class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0" x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                                        <!-- Modal -->
                                        <div x-show="showModal" class="bg-white rounded-xl shadow-2xl p-6 w-96 mx-10" @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform" x-transition:enter-start="opacity-0 scale-90 translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease duration-100 transform" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                                            <!-- Title -->
                                            <span class="font-bold block text-2xl mb-3">Quote </span>
                                            <!--Form to show the selected text as output-->
                                            <form name="quoteForm" id="quoteForm" >
                                                @csrf
                                                <div class="text-green-600" role="alert" id="successMsg" style="display: none" >
                                                    The quote was cited successfully! 
                                                </div>
                                                <div class="mb-2">
                                                    <input type="text" id="quoteBody" name="quoteBody" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium resize-none"/>
                                                    <span class="text-danger" id="quoteBodyErrMsg"></span>
                                                    <!-- <textarea name="quoteBody" id="quoteBody" cols="30" rows="10" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium resize-none"></textarea> -->
                                                </div>               
                                                <!-- Buttons -->
                                                <div class="text-right space-x-5 mt-5">
                                                    <button type="submit" id="submit" target="_blank" class="px-4 py-2 text-sm bg-white rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-500 focus:outline-none focus:ring-0 font-bold hover:bg-gray-50 focus:bg-indigo-50 focus:text-indigo">Save quote</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <!-- end of quote section -->
                        </div>
                    </div>
                </div>
                <div class="bg-grayDark" x-data="{ atTop: true }" x-on:scroll.window="atTop =( window.pageYOffset > 10) ? false : true ">
                    <div class="w-full md:pl-4 lg:pl-10 md:pr-4 flex self-start flex-col mt-5">
                        <div class="w-full rounded overflow-hidden shadow-lg bg-white flex flex-col">

                            <h1 class="text-lg mb-5 ml-5 font-bold ml-6 mt-12 md:mx-8 lg:mx-12 xl:mx-20">{{ $draft->title }}</h1>
                                
                            <h2 class="text-base mb-12 ml-5 ml-6  md:mx-8 lg:mx-12 xl:mx-20">
                                {{ $draft->abstract }}
                            </h2>

                            <!-- stats section -->
                                <div class="flex items-center justify-center relative">
                                    <div class="w-full justify-center rounded text-white bg-gray-900">
                                        <div class="flex flex-wrap justify-end md:mr-8 -mt-16">
                                            <img class="w-20 h-20 object-cover rounded-full  shadow-lg" src="{{ asset('/images/' . $draft->magazine->image) }}">
                                            <p class="text-gray-900 text-xl indent-8 shadow-lg mt-2 rounded-full h-12 p-2">{{ $draft->magazine->slug }}</p>
                                        </div>

                                        <h3 class="text-white p-3 md:text-2xl lg:text-2xl text-lg"></h3>
                                        <div class="p-5 pt-1 flex-wrap  flex items-center gap-2 justify-center">
                                            <div class="bg-gradient-to-r flex-auto  w-42 h-42  from-gray-800 to-gray-700    shadow-lg    rounded-lg">
                                                <div class="md:p-7 p-4">
                                                    <h2 class="text-xl text-center text-gray-200 capitalize">{{$visits}}</h2>
                                                    <h3 class="text-sm  text-gray-400  text-center">Reads</h3>
                                                </div>
                                            </div>
                                            <div class="bg-gradient-to-r flex-auto  w-42 h-42  from-gray-800 to-gray-700    shadow-lg    rounded-lg">
                                                <div class="md:p-7 p-4">
                                                    <h2 class="text-lg text-center text-gray-200 capitalize">
                                                        <span>{{$draft->created_at->format('Y-m-d')}}</span>
                                                    </h2>
                                                    <h3 class="text-sm  text-gray-400  text-center">Published on</h3>
                                                </div>
                                            </div>
                                            <div class="bg-gradient-to-r flex-auto w-42 h-42  from-gray-800 to-gray-700    shadow-lg    rounded-lg">
                                                <div class="md:p-7 p-4">
                                                    <livewire:draft.voting :draft="$draft" />
                                                    <h3 class="text-sm  text-gray-400  text-center">__________</h3>
                                                </div>
                                            </div>
                                            <div class="bg-gradient-to-r flex-auto  w-42 h-42  from-gray-800 to-gray-700    shadow-lg    rounded-lg">
                                                <div>
                                                    <livewire:magazine.subscribe :magazine="$draft->magazine" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- end of stats section -->

                        </div>
                    </div>
                    <div class="w-full md:pl-4 lg:pl-10 md:pr-4 flex self-start flex-col mt-2">
                        <div class="w-full rounded overflow-hidden shadow-lg bg-white flex flex-col p-6 md:py-8 lg:py-8 xl:py-8 md:px-8 lg:px-12 xl:px-20">
                                <hr>
                                <div class="">
                                    @auth()
                                        <livewire:draft.create-comment :draft="$draft" :col="0" :key="$draft->id"/>
                                    @endauth()
                                    <livewire:draft.all-comments :draft="$draft"/>
                                </div>              

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- end main panel -->

        <!-- side -->   

            <div x-data="setup()" x-init="$refs.loading.classList.add('hidden');">
                <div class="flex antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">

                    <!-- Sidebar -->
                    <div x-transition:enter="transform transition-transform duration-300" x-transition:enter-start="translate-x-full" x-transition:enter-start="translate-x-0" x-transition:leave="transform transition-transform duration-300" x-transition:leave-start="-translate-x-0" x-transition:leave-end="translate-x-full" x-show="isSidebarOpen" class="fixed inset-y-0 z-10 flex w-80 bg-white shadow-lg right-0">

                        <!-- Sidebar content -->
                        <div class="z-10 flex flex-col flex-1">
                            <div class="flex items-center justify-between flex-shrink-0 w-64 p-4">
                                <!-- Close btn -->
                                <button @click="isSidebarOpen = false" class="p-1 rounded-lg focus:outline-none focus:ring">
                                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    <span class="sr-only">Close sidebar</span>
                                </button>

                            </div>
                            <nav class="flex flex-col flex-1 w-full p-4 mt-4">
                                @foreach($recos as $reco)
                                    <div class="bg-white rounded-3xl border shadow-xl p-4 w-full">
                                        <div class="flex justify-between items-center">
                                            <div>
                                                <span class="font-bold text-green-500"><a href="{{ route('draft.show', $reco->uid) }}">{{$reco->title}}</a></span><br />
                                                <span class="font-medium text-xs text-gray-500 flex justify-end">{{$reco->abstract}}</span>
                                            </div>
                                        </div>
                                        <div>
                                            <h3 class="font-semibold text-sm text-gray-400">
                                                {{ $reco->created_at->diffForHumans() }}, 
                                                <span>{{$reco->likes->count()}} {{Str::plural('like', $reco->likes->count())}}</span>
                                            </h3>
                                            <h1 class="font-semibold text-xl text-gray-700 mb-2"></h1>
                                        </div>
                                    </div>
                                @endforeach
                            </nav>
                        </div>  
                    </div>
                    <main class="flex items-center flex-1">
                        <!-- Page content -->
                        <button @click="isSidebarOpen = true" class="-rotate-90 transform-gpu fixed p-2 text-white bg-black shadow-lg rounded-lg top-72 right-0 -mr-10">
                            Recomended
                        </button>
                    </main>
                </div>
            </div>

        <!-- end of side -->

    </div>


    <script>
        const selectableTextArea = document.querySelectorAll(".selectable-text-area");
            const twitterShareBtn = document.querySelector("#twitter-share-btn");

            selectableTextArea.forEach(elem => {
            elem.addEventListener("pointerup", selectableTextAreaPointerUp);
            });

            twitterShareBtn.addEventListener("click", twitterShareBtnClick);

            document.addEventListener("pointerdown", documentPointerDown);

            function selectableTextAreaPointerUp(event) {
            setTimeout(() => { // In order to avoid some weird behavior...
                const selectedText = window.getSelection().toString().trim();
                if(selectedText.length) { 
                const x = event.pageX;
                const y = event.pageY;
                const twitterShareBtnWidth = Number(getComputedStyle(twitterShareBtn).width.slice(0,-2));
                const twitterShareBtnHeight = Number(getComputedStyle(twitterShareBtn).height.slice(0,-2));

                if(document.activeElement !== twitterShareBtn) {
                    twitterShareBtn.style.left = `${x - twitterShareBtnWidth*0.5}px`;
                    twitterShareBtn.style.top = `${y - twitterShareBtnHeight*1.25}px`;
                    twitterShareBtn.style.display = "block";
                    twitterShareBtn.classList.add("btnEntrance");
                }
                else {
                    twitterShareBtn.style.left = `${x-twitterShareBtnWidth*0.5}px`;
                    twitterShareBtn.style.top = `${y-twitterShareBtnHeight*0.5}px`;
                }
                }    
            }, 0);
            }

        function documentPointerDown(event) {
        if(event.target.id!=="twitter-share-btn" && getComputedStyle(twitterShareBtn).display==="block") {
            twitterShareBtn.style.display = "none";
            twitterShareBtn.classList.remove("btnEntrance");
            window.getSelection().empty();
        }
        }

        function twitterShareBtnClick(event) {
            const selectedText = window.getSelection().toString().trim();
            if(selectedText.length) {
                // General Twitter Share URL: https://twitter.com/intent/tweet?text={title}&url={url}&hashtags={hash_tags}&via={user_id}
                const twitterShareUrl = document.quoteForm.quoteBody;
                const text = `${(selectedText)}`;
                // const text = `${encodeURIComponent(selectedText)}`;
                // const currentUrl = encodeURIComponent(window.location.href);
                // const hashtags = "helloworld, test, testing";
                // const via = "CodingJrney";
                // console.log(selectedText);
                // window.open(`${twitterShareUrl}?text="${text}"`);
                // window.prompt("Please enter your name", `${text}`);
                window.document.quoteForm.quoteBody.value = `${text}`;
                console.log(`${text}`);
                
                // Alternatively, we could include everything in the "text" field -> more room to customize the tweet:
                // window.open(`${twitterShareUrl}?text="${text}" by @${via} ${hashtags.split(",").map(h => "%23"+h.trim()).join(" ")} ${currentUrl}`);
                
                // We could also specify new window features:
                // const newWindowOptions = "height=400,width=550,top=0,left=0,resizable=yes,scrollbars=yes";
                // window.open(`${twitterShareUrl}?text="${text}"&url=${currentUrl}&hashtags=${hashtags}&via=${via}`, "ShareOnTwitter", newWindowOptions);
            }
        }

    </script>

    <script type="text/javascript">

        $('#quoteForm').on('submit',function(e){
            e.preventDefault();

            let quoteBody = $('#quoteBody').val();
            
            $.ajax({
                url: "{{route('quote.store', $draft)}}",
                type:"POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    quoteBody:quoteBody,
                },
                success:function(response){
                    $('#successMsg').show();
                    console.log(response);
                    document.getElementById("quoteForm").reset();
                },
                error: function(response) {
                    $('#quoteBodyErrMsg').text(response.responseJSON.errors.quoteBody);
                },
            });
        });
    </script>

</x-app-layout>