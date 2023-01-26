// selecting the panel which should element be added to
const panels = document.querySelectorAll(".a, .b, .c, .d, .e, .f, .g, .h");

for (const panel of panels) {
  panel.addEventListener("click", function handleClick(){
    // 1. Remove Class from All List
    for (const panel of panels) {
      panel.classList.remove('selected');
    }
    
    // 2. Add Class to Relevant Li
    this.classList.add('selected');
  });
}
//a better way to it is by creating a new window when clicking on the frame
//therefore the frame will expand allowing to edit the content of the frame
//otherwise if we display property to none then one should click on the frame 
document.addEventListener('click', (event) => {
    if (event.target.matches('.bat')) {
      //add resizing frame
      const comics = document.querySelectorAll(".bat");
      const wrapper = document.createElement('div');
      const handlesFrag = new DocumentFragment();
      let handles = ["rotate", "left-top", "left-bottom", "top-mid", "bottom-mid", "left-mid", "right-mid", "right-bottom", "right-top"];

      wrapper.classList.add("box");
      wrapper.setAttribute("id", "box");

      for (const comic of comics) {
        comic.addEventListener('click', function handleClick() {
          //remove the parent div
          for (const comic of comics) {
            //check if the comic has the frame to remove
            if (comic.parentNode.classList.contains('box')) {
              comic.parentNode.parentNode.classList.remove("box-wrapper");
              comic.parentNode.parentNode.removeAttribute('id');
              comic.parentNode.replaceWith(comic);
              //e.firstElementChild can be used.
              var child = wrapper.getElementsByClassName("dot");
              while (child[0]) {
                // wrapper.removeChild(child);
                child[0].parentNode.removeChild(child[0]);
                // wrapper = wrapper.lastElementChild;
              }
            }
          }
          //add the frame for the clicked comic
          // create wrapper container
          const container = document.createElement('div');

          container.classList.add("box-wrapper");
          container.setAttribute("id", "box-wrapper");
          // insert wrapper before comic in the DOM tree
          comic.parentNode.insertBefore(wrapper, comic);
          wrapper.parentNode.insertBefore(container, wrapper);
          // move el into wrapper
          wrapper.appendChild(comic);
          container.appendChild(wrapper);
          //adding the handles
          handles.forEach(handle => {
            let div = document.createElement('div');
            div.className = 'dot' + ' ' + handle;
            div.id = handle;
            handlesFrag.appendChild(div);
          });
          wrapper.appendChild(handlesFrag);
        });
      } 
    }
  }, false);

  