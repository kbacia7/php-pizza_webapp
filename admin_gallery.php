<div class="modal" id="editGallery" tabindex="-1" role="dialog" aria-labelledby="editGalleryLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editGalleryLabel">Edycja opisu zdjęcia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Zamknij">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="inputGalleryDescription" class="col-form-label">Opis zdjęcia w galerii</label>
            <textarea class="form-control" id="inputGalleryDescription"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
        <button type="button" class="btn btn-primary">Zapisz</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="addGallery" tabindex="-1" role="dialog" aria-labelledby="addGalleryLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addGalleryLabel">Dodawanie zdjęcia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Zamknij">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="inputGalleryFile" class="col-form-label">Plik ze zdjęciem</label>
            <input type="file" class="form-control-file" id="inputGalleryFile"/>
          </div>
          <div class="form-group">
            <label for="inputGalleryDescription" class="col-form-label">Opis dodawanego zdjęcia</label>
            <textarea class="form-control" id="inputGalleryDescription"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
        <button type="button" class="btn btn-primary">Zapisz</button>
      </div>
    </div>
  </div>
</div>

<h4 class="text-center">Galerie</h4>
<p class="m-0 text-center">Zakładka ta służy do konfigurowania galerii, na stronie znajdują się dwie galerie, obiema możesz dynamicznie zarządzać tutaj. Opisy dla galerii można edytować w zakładce <b>Konfiguracja</b></p>
<div class="col-12 mt-3 mb-3">
  <div class="text-center">
    <div class="btn-group" role="group" aria-label="Galerie">
      <button type="button" class="btn btn-secondary active">Pierwsza galeria</button>
      <button type="button" class="btn btn-secondary">Druga galeria</button>
    </div>
  </div>
</div>
<div class="col-12">
    <div class="row">
      <div class="col-2">
        <div class="position-absolute w-100 h-100 collapse" style="left: 0">
          <div class="fade_screen"></div>
          <div class="d-flex h-100 justify-content-center align-items-center">
            <div style="z-index: 3">
              <button type="button" class="btn btn-success"><i class="fas fa-pencil-alt"></i></button>
              <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
            </div>
          </div>
        </div>
        <img src="https://www.google.pl/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png" class="img-fluid"/>
      </div>
  </div>
</div>