<h4 class="text-center">Powiadomienia</h4>
<p class="m-0 text-center">Wypełniając poniższy formularz wyślesz powiadomienie PUSH do wszystkich użytkowników którzy wyrazili na to zgodę</p>
<form>
  <div class="form-group">
    <label for="inputNotificationTitle" class="col-form-label">Tytuł powiadomienia</label>
    <input type="text" class="form-control" id="inputNotificationTitle" placeholder="Przecena na wszystkie napoje 50%!">
  </div>
  <div class="form-group ">
    <label for="inputNotificationMessage">Wiadomość</label>
    <textarea class="form-control" id="inputNotificationMessage" rows="5" placeholder="W każdy czwartek po godzinie 14:00 wszystkie napoje tańsze o 50%!"></textarea>
  </div>
  <div class="form-group">
    <div class="col-12">
      <div class="text-center">
        <button id="notificationSend" class="btn btn-primary">Wyślij</button>
      </div>
    </div>
  </div>
</form>