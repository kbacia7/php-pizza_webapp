<h4 class="text-center">Konfiguracja</h4>
<p class="m-0 text-center">W tym miejscu możesz skonfigurować swoją aplikację internetową! Do dzieła!</p>
<form id="configSaveForm">
  <div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">Nazwa pizzeri</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputName" placeholder="Moja Pizzeria">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputLocation" class="col-sm-2 col-form-label">Współrzędne pizzerii</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputLocation" placeholder="51.801391, 1.118050">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputNumber" class="col-sm-2 col-form-label">Numer telefonu</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputNumber" placeholder="(44) 732-235-134">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputIcon" class="col-sm-2 col-form-label">Ikonka pizzeri</label>
    <div class="col-sm-10">
      <input type="file" class="form-control-file" id="inputIcon" accept=".png, .jpg, .jpeg" />
    </div>
  </div>
  <div class="form-group row">
    <label for="inputMoney" class="col-sm-2 col-form-label">Waluta</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputMoney" placeholder="$">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputGallery1">Opis pierwszej galerii</label>
    <textarea class="form-control" id="inputGallery1" rows="5"></textarea>
  </div>
  <div class="form-group row">
    <label for="inputGallery2">Opis drugiej galerii</label>
    <textarea class="form-control" id="inputGallery2" rows="5"></textarea>
  </div>
  <div class="form-group row">
    <div class="col-12">
      <div class="text-center">
        <button id="configSaveButton" class="btn btn-primary">Zapisz</button>
      </div>
    </div>
  </div>
</form>