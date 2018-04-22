<h4 class="text-center">Użytkownicy</h4>
<p class="m-0 text-center">Zakładka <b>Użytkownicy</b> jest miejscem gdzie można dodawać nowych administratorów lub aktualizować istniejących użytkowników. Trzeba pamiętać że jeśli zmienimy użytkownikowi zwykłemu login bądź hasło jego <b>dynamiczny link do logowania nie będzie działał</b></p>
<div class="text-center">
	<button type="button" id="create-user" class="btn btn-success">+</button>
</div>
<div class="mt-4">
<div class="col-12">
  <div class="row">
    <div class="col-3">
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link never-use-user-tab d-none" id="v-pills-user-tab" data-toggle="pill" href="#v-pills-user" role="tab" aria-controls="v-pills-user" aria-selected="false"><span class="user-tab-title">Nazwa (#ID)</span><button type="button" class="float-right btn btn-sm btn-danger user-remove-account"><i class="fas fa-trash"></i></button></a>
			</div>
    </div>
    <div class="col-9">
		<div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade never-use-user-tab-pane d-none" id="v-pills-user" role="tabpanel" aria-labelledby="v-pills-user-tab">
          <div class="user-data-form">
			<form id="userSaveForm">
			  <div class="form-group row">
				<label for="inputUserFirstName" class="col-sm-2 col-form-label">Imię</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" id="inputUserFirstName" placeholder="Jan" disabled>
				</div>
			  </div>
			  <div class="form-group row">
				<label for="inputUserLastName" class="col-sm-2 col-form-label">Nazwisko</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" id="inputUserLastName" placeholder="Kowalski" disabled>
				</div>
			  </div>
			  <div class="form-group row">
				<label for="inputUserLogin" class="col-sm-2 col-form-label">Login</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" id="inputUserLogin" placeholder="Janek111" disabled>
				</div>
			  </div>
			  <div class="form-group row">
				<label for="inputUserPassword" class="col-sm-2 col-form-label">Hasło</label>
				<div class="col-sm-10">
				  <input type="password" class="form-control" id="inputUserPassword" disabled>
				</div>
			  </div>
			  <div class="form-group row">
				<div class="col-sm-2">Administrator</div>
				<div class="col-sm-10">
				  <div class="form-check">
					<input class="form-check-input" type="checkbox" id="inputUserAdmin" disabled>
				  </div>
				</div>
			  </div>
			  <div class="form-group row">
				<div class="col-12">
				  <div class="text-center">
					<button id="userSaveButton" class="btn btn-primary">Edytuj</button>
				  </div>
				</div>
			  </div>
			</form>
		  </div>
        </div>
      </div> 
    </div>
  </div>
</div>
</div>