<div>
    
<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
  <script>

    tinymce.init({
      selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
      plugins: 'table lists advlist image paste',
      height : 440,
      statusbar: false,
      browser_spellcheck: true,
      contextmenu: false,
      menubar: 'none',
      toolbar: 'customInsertButton customDateButton image undo redo | formatselect | fontselect | bold Underline italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
      font_formats: 'Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats',
      skin: 'oxide',
      fix_list_elements : true,
      mobile: {
        theme: 'mobile',
      },
      file_picker_types: 'image',
      
      /* and here's our custom image picker*/
      file_picker_callback: function (cb, value, meta) {
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');

        /*
          Note: In modern browsers input[type="file"] is functional without
          even adding it to the DOM, but that might not be the case in some older
          or quirky browsers like IE, so you might want to add it to the DOM
          just in case, and visually hide it. And do not forget do remove it
          once you do not need it anymore.
        */

        input.onchange = function () {
          var file = this.files[0];

          var reader = new FileReader();
          reader.onload = function () {
            /*
              Note: Now we need to register the blob in TinyMCEs image blob
              registry. In the next release this part hopefully won't be
              necessary, as we are looking to handle it internally.
            */
            var id = 'blobid' + (new Date()).getTime();
            var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
            var base64 = reader.result.split(',')[1];
            var blobInfo = blobCache.create(id, file, base64);
            blobCache.add(blobInfo);

            /* call the callback and populate the Title field with the file name */
            cb(blobInfo.blobUri(), { title: file.name });
          };
          reader.readAsDataURL(file);
        };

        input.click();
      },
        // custom button for inserting quotes
        setup: function (editor) {
          
          editor.ui.registry.addButton('customInsertButton', {
            text: 'Q',
            onAction: function (_) {
              
              editor.insertContent('&nbsp;<strong>Quote inserted!</strong>&nbsp;');
                              
            },
          });
          
        },
        setup: function(editor) {
          editor.on('input propertychange change', function(e) {
            tinymce.triggerSave();
            clearTimeout(timeoutId);
              timeoutId = setTimeout(function() {
                  // Runs 1 second (1000 ms) after the last change    
                  saveToDB();
              }, 1000);
          });
        }
    });

  </script>

</div>