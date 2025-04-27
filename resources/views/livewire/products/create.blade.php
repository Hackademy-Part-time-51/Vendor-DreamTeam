<form wire:submit="create" class=" rounded p-3 d-flex flex-column ">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 d-flex flex-column justify-content-center align-content-center">
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control" id="title" wire:model="title" value="{{ old('title') }}">
                </div>
                <div class="mb-3">
                    <label for="descrizione" class="form-label">Descrizione</label>
                    <textarea class="form-control" id="descrizione" rows="3" wire:model="description"> {{ old('description') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Prezzo</label>
                    <input type="number" class="form-control" id="price" wire:model="price" value="{{ old('price') }}">
                </div>
                <div>
                    <select wire:model="category_id" id="" class="form-select mb-3">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 col-lg-6 d-flex flex-column justify-content-center align-content-center rounded-">
                <fieldset class="upload_dropZone text-center my-3 p-4">

                    <legend class="visually-hidden">Image uploader</legend>
                
                    <svg class="upload_svg" width="60" height="60" aria-hidden="true">
                      <use href="#icon-imageUpload"></use>
                    </svg>
                
                    <p class="fs-4 my-2">Trascina qua la/e foto del prodotto per aggiungerle all'annuncio.</p>
                
                    <input id="upload_image_background" data-post-name="image_background" data-post-url="https://someplace.com/image/uploads/backgrounds/" class="position-absolute invisible" type="file" multiple accept="image/jpeg, image/png, image/svg+xml" />
                
                    <label class="btn  btn-base mb-3" for="upload_image_background">Scegli la/e foto</label>
                
                    <div class="upload_gallery d-flex flex-wrap justify-content-center gap-3 mb-0"></div>
                
                </fieldset>
            </div>
        </div>
    </div>


    {{-- <input type="number" hidden wire:model="user_id" value="{{ Auth::user()->id }}" > --}}
    <button class="btn btn-base w-50 mx-auto">Crea</button>

    {{-- SCRIPT PER DRAG AND DROP IMAGE --}}
    <script>
        console.clear();
('use strict');

(function () {

  'use strict';
  
  // Four objects of interest: drop zones, input elements, gallery elements, and the files.
  // dataRefs = {files: [image files], input: element ref, gallery: element ref}

  const preventDefaults = event => {
    event.preventDefault();
    event.stopPropagation();
  };

  const highlight = event =>
    event.target.classList.add('highlight');
  
  const unhighlight = event =>
    event.target.classList.remove('highlight');

  const getInputAndGalleryRefs = element => {
    const zone = element.closest('.upload_dropZone') || false;
    const gallery = zone.querySelector('.upload_gallery') || false;
    const input = zone.querySelector('input[type="file"]') || false;
    return {input: input, gallery: gallery};
  }

  const handleDrop = event => {
    const dataRefs = getInputAndGalleryRefs(event.target);
    dataRefs.files = event.dataTransfer.files;
    handleFiles(dataRefs);
  }


  const eventHandlers = zone => {

    const dataRefs = getInputAndGalleryRefs(zone);
    if (!dataRefs.input) return;

    // Prevent default drag behaviors
    ;['dragenter', 'dragover', 'dragleave', 'drop'].forEach(event => {
      zone.addEventListener(event, preventDefaults, false);
      document.body.addEventListener(event, preventDefaults, false);
    });

    // Highlighting drop area when item is dragged over it
    ;['dragenter', 'dragover'].forEach(event => {
      zone.addEventListener(event, highlight, false);
    });
    ;['dragleave', 'drop'].forEach(event => {
      zone.addEventListener(event, unhighlight, false);
    });

    // Handle dropped files
    zone.addEventListener('drop', handleDrop, false);

    // Handle browse selected files
    dataRefs.input.addEventListener('change', event => {
      dataRefs.files = event.target.files;
      handleFiles(dataRefs);
    }, false);

  }


  // Initialise ALL dropzones
  const dropZones = document.querySelectorAll('.upload_dropZone');
  for (const zone of dropZones) {
    eventHandlers(zone);
  }


  // No 'image/gif' or PDF or webp allowed here, but it's up to your use case.
  // Double checks the input "accept" attribute
  const isImageFile = file => 
    ['image/jpeg', 'image/png', 'image/svg+xml'].includes(file.type);


  function previewFiles(dataRefs) {
    if (!dataRefs.gallery) return;
    for (const file of dataRefs.files) {
      let reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onloadend = function() {
        let img = document.createElement('img');
        img.className = 'upload_img mt-2 img-thumbnail';
        img.style.maxWidth = '200px';
        img.style.maxHeight = '200px';
        img.style.objectFit = 'cover';
        img.setAttribute('alt', file.name);
        img.src = reader.result;
        dataRefs.gallery.appendChild(img);
      }
    }
  }

  // Based on: https://flaviocopes.com/how-to-upload-files-fetch/
  const imageUpload = dataRefs => {

    // Multiple source routes, so double check validity
    if (!dataRefs.files || !dataRefs.input) return;

    const url = dataRefs.input.getAttribute('data-post-url');
    if (!url) return;

    const name = dataRefs.input.getAttribute('data-post-name');
    if (!name) return;

    const formData = new FormData();
    formData.append(name, dataRefs.files);

    fetch(url, {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      console.log('posted: ', data);
      if (data.success === true) {
        previewFiles(dataRefs);
      } else {
        console.log('URL: ', url, '  name: ', name)
      }
    })
    .catch(error => {
      console.error('errored: ', error);
    });
  }


  // Handle both selected and dropped files
  const handleFiles = dataRefs => {

    let files = [...dataRefs.files];

    // Remove unaccepted file types
    files = files.filter(item => {
      if (!isImageFile(item)) {
        console.log('Not an image, ', item.type);
      }
      return isImageFile(item) ? item : null;
    });

    if (!files.length) return;
    dataRefs.files = files;

    previewFiles(dataRefs);
    imageUpload(dataRefs);
  }

})();

    </script>
</form>
