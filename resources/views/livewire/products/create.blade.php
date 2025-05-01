<div class="container-fluid py-4">
  <div class="text-center">
    <h1 class="display-6 mb-3">Nuovo Prodotto</h1>
</div>
  <form wire:submit="create">

      <div class="row ">
          <div class="col-12 col-lg-5">
              <div class="card border-0 shadow-sm">
                  <div class="card-body p-5">
                      <fieldset class="upload_dropZone text-center bg-light rounded-3 p-5">
                          <i class="bi bi-cloud-upload display-1 text-primary mb-4"></i>
                          <p class="display-6 mb-3">Carica le immagini del prodotto</p>
                          <p class="text-muted mb-4">Trascina le immagini qui o clicca per selezionarle</p>                          
                          <input id="upload_image_background" 
                                 type="file" 
                                 multiple 
                                 class="position-absolute invisible"
                                 accept="image/jpeg, image/png, image/svg+xml"
                                 data-post-name="image_background"
                                 data-post-url="/upload">                
                          <label class="btn btn-outline-primary btn-lg mb-3" 
                                 for="upload_image_background">
                              <i class="bi bi-image me-2"></i>Seleziona Immagini
                          </label>
                          <div class="upload_gallery d-flex flex-wrap justify-content-center gap-3 mb-0">
                            {{-- anteprila delle foto --}}
                          </div>
                      </fieldset>
                  </div>
              </div>
          </div>
          <div class="col-12 col-lg-7">
              <div class="card border-0 shadow-sm h-100">
                  <div class="card-body p-4">
                      @if ($errors->any())
                          <div class="alert alert-danger alert-dismissible fade show mb-4">
                              <ul class="list-unstyled mb-0">
                                  @foreach ($errors->all() as $error)
                                      <li><i class="bi bi-exclamation-circle me-2"></i>{{ $error }}</li>
                                  @endforeach
                              </ul>
                              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                          </div>
                      @endif
                      <div class="mb-4">
                          <label class="form-label h4">Titolo</label>
                          <input type="text"
                                 class="form-control form-control-lg"
                                 wire:model="title"
                                 placeholder="Inserisci il titolo del prodotto"
                                 value="{{ old('title') }}">
                      </div>
                      <div class="mb-4">
                          <label class="form-label h4">Categoria</label>
                          <select wire:model="category_id" class="form-select form-select-lg">
                              <option value="" >Seleziona una categoria</option>
                              @foreach ($categories as $category)
                                  <option value="{{ $category->id }}" @selected($category->id == old('category_id'))>{{ $category->name }}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="mb-4">
                          <label class="form-label h4">Descrizione</label>
                          <textarea wire:model="description"
                                    class="form-control form-control-lg"
                                    rows="4"
                                    placeholder="Descrivi il tuo prodotto">{{ old('description') }}</textarea>
                      </div>
                      <div class="mb-4">
                          <label class="form-label h4">Prezzo</label>
                          <div class="input-group input-group-lg">
                              <span class="input-group-text">€</span>
                              <input type="number" wire:model="price" class="form-control" placeholder="0.00" value="{{ old('price') }}">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="row mt-3">
        <div class="d-grid gap-2">
          <button type="submit" class="btn btn-baseblu btn-lg py-3">
              <i class="bi bi-plus-lg me-2"></i>Crea Prodotto
          </button>
          <a href="{{ route('products.index') }}"
             class="btn btn-rosso btn-lg py-3">
              <i class="bi bi-x-lg me-2"></i>Annulla
          </a>
      </div>
      </div>
  </form>
</div>







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
