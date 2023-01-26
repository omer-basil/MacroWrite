<x-app-layout>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <main class="py-8 container mx-auto px-6 md:px-12 relative max-h-100 grid  place-items-center">
                        <div class="main-layout">
                            <div id="canvas" class="panel panel-sq a"></div>
                            <div id="canvas" class="panel panel-sq b"></div>
                            <div id="canvas" class="panel panel-sq c"></div>
                            <div id="canvas" class="panel panel-sq d"></div>
                            <div id="canvas" class="panel panel-sq e"></div>
                            <div id="canvas" class="panel panel-sq f"></div>
                            <div id="canvas" class="panel panel-sq g"></div>
                            <div id="canvas" class="panel panel-sq h"></div>
                        </div>
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
                                                <div x-data="{ open: false }">
                                                    <button x-on:click="open = ! open">
                                                        <img src="https://esquilo.io/png/thumb/nOpY8oluHZN2NdE-Captain-Levi-Ackerman-PNG-Pic.png" alt="" class="w-8 h-8">
                                                    </button>
                                                
                                                    <div x-show="open" x-transition class="w-full h-72 border border-blue-400">
                                                        <div x-data="{openTab: 1, activeClasses: 'border-l border-t border-r rounded-t text-blue-700', inactiveClasses: 'text-blue-500 hover:text-blue-800'}" class="w-full p-2">
                                                            <ul class="flex border-b">
                                                                <li @click="openTab = 1" class="mr-1">
                                                                    <a href="#" :class="openTab === 1 ? activeClasses : inactiveClasses" class="bg-white inline-block py-2">
                                                                        Face reactions
                                                                    </a>
                                                                </li>
                                                                <li @click="openTab = 2" class="mr-1">
                                                                    <a href="#" :class="openTab === 2 ? activeClasses : inactiveClasses" class="bg-white inline-block py-2">
                                                                        Body reactions
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <div class="w-full bg-white p-4" onclick="addCharacter(event)">
                                                                <div x-show="openTab === 1">
                                                                    <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/7c6f1009-9bed-42c1-90b2-5672c47100ef/d6kzomo-0ffe995d-4983-4d43-9496-6bf31bce0eae.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzdjNmYxMDA5LTliZWQtNDJjMS05MGIyLTU2NzJjNDcxMDBlZlwvZDZrem9tby0wZmZlOTk1ZC00OTgzLTRkNDMtOTQ5Ni02YmYzMWJjZTBlYWUucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.b62yRtncM1ItBnmJu1lB1CZoaB83skj2GbkQC4hJ-vU" alt="levai" class="w-18 h-24">
                                                                    <img src="http://assets.stickpng.com/thumbs/5f4cd3b42766800004e5e936.png" alt="levai" class="w-18 h-24">
                                                                </div>
                                                                <div x-show="openTab === 2">
                                                                    <img src="https://www.pngall.com/wp-content/uploads/2016/07/Anime-PNG-Picture.png" alt="" class="w-18 h-24">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </nav>
                                        </div>  
                                    </div>
                                    <main class="flex items-center flex-1">
                                        <!-- Page content -->
                                        <button @click="isSidebarOpen = true" class="-rotate-90 transform-gpu fixed p-2 text-white bg-black shadow-lg rounded-lg top-72 right-0 absolute -mr-10">
                                            Anime
                                        </button>
                                    </main>
                                </div>
                            </div>
                        <!-- end of side -->
                    </main>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script type="module" src="https://unpkg.com/@deckdeckgo/drag-resize-rotate@latest/dist/deckdeckgo-drag-resize-rotate/deckdeckgo-drag-resize-rotate.esm.js"></script>

<script async>
    //adding the element to the selected panel
    function addCharacter(event) {
        let comic = document.createElement('div');
        let wrapper = document.createElement('deckgo-drr');
        comic.classList.add("bat");
        // wrapper.style.height = "20%";
        // wrapper.style.width = "20%";
        wrapper.setAttribute("style", "--width: 30%; --height: 30%; --top: 25%; --left: 10%;");
        comic.style.backgroundImage = "url('" + event.target.src + "')";
        wrapper.appendChild(comic);
        document.querySelector(".selected").appendChild(wrapper);
    }
</script>

<script async src="{{ asset('js/canvas.js') }}"></script>

<!-- <script async>
    document.addEventListener('click', (event) => {

    var boxWrapper = document.getElementById("box-wrapper");
    var box = document.getElementById("box");
    const minWidth = 40;
    const minHeight = 40;

    var initX, initY, mousePressX, mousePressY, initW, initH, initRotate;

    function repositionElement(x, y) {
        boxWrapper.style.left = x + 'px';
        boxWrapper.style.top = y + 'px';
    }

    function resize(w, h) {
        box.style.width = w + 'px';
        box.style.height = h + 'px';
    }


    function getCurrentRotation(el) {
        var st = window.getComputedStyle(el, null);
        var tm = st.getPropertyValue("-webkit-transform") ||
            st.getPropertyValue("-moz-transform") ||
            st.getPropertyValue("-ms-transform") ||
            st.getPropertyValue("-o-transform") ||
            st.getPropertyValue("transform")
        "none";
        if (tm != "none") {
            var values = tm.split('(')[1].split(')')[0].split(',');
            var angle = Math.round(Math.atan2(values[1], values[0]) * (180 / Math.PI));
            return (angle < 0 ? angle + 360 : angle);
        }
        return 0;
    }

    function rotateBox(deg) {
        boxWrapper.style.transform = `rotate(${deg}deg)`;
    }
    console.log(boxWrapper);
    // drag support
    // document.getElementById('box-wrapper').addEventListener('mousedown', function (event) {
    boxWrapper?.addEventListener('mousedown', function (event) {
        if (event.target.className.indexOf("dot") > -1) {
            console.log(boxWrapper);
            return;
        }

        initX = this.offsetLeft;
        initY = this.offsetTop;
        mousePressX = event.clientX;
        mousePressY = event.clientY;


        function eventMoveHandler(event) {
            repositionElement(initX + (event.clientX - mousePressX),
                initY + (event.clientY - mousePressY));
        }

        boxWrapper?.addEventListener('mousemove', eventMoveHandler, false);
        window.addEventListener('mouseup', function eventEndHandler() {
            boxWrapper?.removeEventListener('mousemove', eventMoveHandler, false);
            window.removeEventListener('mouseup', eventEndHandler);
        }, false);

    }, false);

    // done drag support

    // handle resize
    var rightMid = document.getElementById("right-mid");
    var leftMid = document.getElementById("left-mid");
    var topMid = document.getElementById("top-mid");
    var bottomMid = document.getElementById("bottom-mid");

    var leftTop = document.getElementById("left-top");
    var rightTop = document.getElementById("right-top");
    var rightBottom = document.getElementById("right-bottom");
    var leftBottom = document.getElementById("left-bottom");

    function resizeHandler(event, left = false, top = false, xResize = false, yResize = false) {
        initX = boxWrapper.offsetLeft;
        initY = boxWrapper.offsetTop;
        mousePressX = event.clientX;
        mousePressY = event.clientY;

        initW = box.offsetWidth;
        initH = box.offsetHeight;

        initRotate = getCurrentRotation(boxWrapper);
        var initRadians = initRotate * Math.PI / 180;
        var cosFraction = Math.cos(initRadians);
        var sinFraction = Math.sin(initRadians);
        function eventMoveHandler(event) {
            var wDiff = (event.clientX - mousePressX);
            var hDiff = (event.clientY - mousePressY);
            var rotatedWDiff = cosFraction * wDiff + sinFraction * hDiff;
            var rotatedHDiff = cosFraction * hDiff - sinFraction * wDiff;

            var newW = initW, newH = initH, newX = initX, newY = initY;

            if (xResize) {
                if (left) {
                    newW = initW - rotatedWDiff;
                    if (newW < minWidth) {
                    newW = minWidth;
                    rotatedWDiff = initW - minWidth;
                    }
                } else {
                    newW = initW + rotatedWDiff;
                    if (newW < minWidth) {
                    newW = minWidth;
                    rotatedWDiff = minWidth - initW;
                    }
                }
                newX += 0.5 * rotatedWDiff * cosFraction;
                newY += 0.5 * rotatedWDiff * sinFraction;
            }

            if (yResize) {
                if (top) {
                    newH = initH - rotatedHDiff;
                    if (newH < minHeight) {
                    newH = minHeight;
                    rotatedHDiff = initH - minHeight;
                    }
                } else {
                    newH = initH + rotatedHDiff;
                    if (newH < minHeight) {
                    newH = minHeight;
                    rotatedHDiff = minHeight - initH;
                    }
                }
                newX -= 0.5 * rotatedHDiff * sinFraction;
                newY += 0.5 * rotatedHDiff * cosFraction;
            }

            resize(newW, newH);
            repositionElement(newX, newY);
        }


        window.addEventListener('mousemove', eventMoveHandler, false);
        window.addEventListener('mouseup', function eventEndHandler() {
            window.removeEventListener('mousemove', eventMoveHandler, false);
            window.removeEventListener('mouseup', eventEndHandler);
        }, false);
    }


    rightMid?.addEventListener('mousedown', e => resizeHandler(e, false, false, true, false));
    leftMid?.addEventListener('mousedown', e => resizeHandler(e, true, false, true, false));
    topMid?.addEventListener('mousedown', e => resizeHandler(e, false, true, false, true));
    bottomMid?.addEventListener('mousedown', e => resizeHandler(e, false, false, false, true));
    leftTop?.addEventListener('mousedown', e => resizeHandler(e, true, true, true, true));
    rightTop?.addEventListener('mousedown', e => resizeHandler(e, false, true, true, true));
    rightBottom?.addEventListener('mousedown', e => resizeHandler(e, false, false, true, true));
    leftBottom?.addEventListener('mousedown', e => resizeHandler(e, true, false, true, true));

    // handle rotation
    var rotate = document.getElementById("rotate");
    rotate?.addEventListener('mousedown', function (event) {
        // if (event.target.className.indexOf("dot") > -1) {
        //     return;
        // }

        initX = this.offsetLeft;
        initY = this.offsetTop;
        mousePressX = event.clientX;
        mousePressY = event.clientY;


        var arrow = document.querySelector("#box");
        var arrowRects = arrow.getBoundingClientRect();
        var arrowX = arrowRects.left + arrowRects.width / 2;
        var arrowY = arrowRects.top + arrowRects.height / 2;

        function eventMoveHandler(event) {
            var angle = Math.atan2(event.clientY - arrowY, event.clientX - arrowX) + Math.PI / 2;
            rotateBox(angle * 180 / Math.PI);
        }

        window.addEventListener('mousemove', eventMoveHandler, false);

        window.addEventListener('mouseup', function eventEndHandler() {
            window.removeEventListener('mousemove', eventMoveHandler, false);
            window.removeEventListener('mouseup', eventEndHandler);
        }, false);
    }, false);


    resize(300, 200);
    repositionElement(200, 200);

    });
</script> -->

