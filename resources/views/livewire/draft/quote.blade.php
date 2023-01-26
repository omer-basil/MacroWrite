<div>
    <div x-data="{ showModal : false }">
        <!-- Button -->
        <button @click="showModal = !showModal" class="px-4 py-2 text-sm bg-red-400 rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-500 focus:outline-none focus:ring-0 font-bold hover:bg-gray-50 focus:bg-indigo-50 focus:text-indigo"><i class="fas fa-quote-right"></i></button>

        <!-- Modal Background -->
        <div x-show="showModal" class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0" x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            <!-- Modal -->
            <div x-show="showModal" class="bg-white rounded-xl shadow-2xl p-6 w-96 mx-10" @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform" x-transition:enter-start="opacity-0 scale-90 translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease duration-100 transform" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                <!-- Title -->
                <span class="font-bold block text-2xl mb-3">Quote </span>
                <!--Form to show the selected text as output-->
                <form name="quoteForm">
                    <div class="mb-2">
                        <!-- <input type="text" id="qouteBody" wire:model="quoteBody" name="quoteBody" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium resize-none"/> -->
                        <textarea name="quoteBody" id="qouteBody" cols="30" rows="10" wire:model="quoteBody" ></textarea>
                    </div>
                    @error('quoteBody')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror                
                    <!-- Buttons -->
                    <div class="text-right space-x-5 mt-5">
                        <a wire:click.prevent="submit" target="_blank" class="px-4 py-2 text-sm bg-white rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-500 focus:outline-none focus:ring-0 font-bold hover:bg-gray-50 focus:bg-indigo-50 focus:text-indigo">Save quote</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- <script>
    
    // Function to get the Selected Text 
    function getSelectedText() {
        var qouteBody = '';

        // window.getSelection
        if (window.getSelection) {
            qouteBody = window.getSelection().toString().trim();
        }
        // document.getSelection
        else if (document.getSelection) {
            qouteBody = document.getSelection().toString().trim();
        }
        // document.selection
        else if (document.selection) {
            qouteBody = document.selection.createRange().text;
        } else return;
        // To write the selected text into the textarea
        document.quoteForm.qouteBody.value += qouteBody;
        
    }
</script> -->