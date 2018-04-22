<h4 class="text-center">Wiadomości</h4>
<p class="m-0 text-center">Miejsce w którym składowane są wszystkie wiadomości wysłane przez formularz kontaktowy. Aby sprawdzić czy dostępne są nowe wiadomości należy przeładować zakładkiem specjalnym do tego linkiem wyświetlanym niżej</p>
<div class="mt-4">
<div class="col-12">
  <div class="row">
    <div class="col-3">
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link never-use-contact-tab d-none" id="v-pills-conversation-tab" data-toggle="pill" href="#v-pills-conversation" role="tab" aria-controls="v-pills-conversation" aria-selected="false"><span class="contact-tab-title">Nazwa (#ID)</span><button type="button" class="float-right btn btn-sm btn-danger contact-remove-conversation"><i class="fas fa-trash"></i></button></a>
      </div>
    </div>
    <div class="col-9">
    <p class="float-right"><a href="#" id="contact-reload">Przeładuj rozmowy</a></p>
      <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade never-use-contact-tab-pane d-none" id="v-pills-conversation" role="tabpanel" aria-labelledby="v-pills-conversation-tab">
          <div class="messages-contact">
            <div class="msg-contact mb-2 d-none never-use-contact-room-message-template">
              <p class="m-0"><b class="message-author-name">[NAZWA]</b> dnia <i class="message-author-date">[DATA]</i></p>
              <hr class="m-0"/>
              <p class="message-message">[WIADOMOŚĆ]</p>
            </div>
            <div class="mt-4">
            <hr class="m-0"/>
            <form>
              <div class="form-group text-center">
                <label for="inputContact" class="col-form-label font-weight-bold">Wiadomość</label>
                <textarea class="form-control" id="inputContact"></textarea>
              </div>
              <div class="form-group text-center">
                <button type="button" class="btn btn-primary contact-send">Odpowiedz</button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div> 
    </div>
  </div>
</div>
</div>