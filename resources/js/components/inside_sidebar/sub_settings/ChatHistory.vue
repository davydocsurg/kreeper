<template>
  <div class="category mb-3">
    <a href="#" class="title collapsed d-flex" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="material-icons md-30 online">mail_outline</i>
      <div class="data ml-2">
        <h5 class="text-dark">Chats</h5>
        <p class="text-muted">Check your chat history</p>
      </div>
      <i class="material-icons ml-5">keyboard_arrow_right</i>
    </a>
    <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordionSettings">
      <div class="content layer mt-4 mb-4">
        <div class="history">
          <p>When you clear your conversation history, the messages will be deleted from your own device.</p>
          <p>The messages won't be deleted or cleared on the devices of the people you chatted with.</p>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="same-address">
            <label class="custom-control-label" for="same-address">Hide will remove your chat history from the recent list.</label>
          </div>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="save-info">
            <label class="custom-control-label" for="save-info">Delete will remove your chat history from the device.</label>
          </div>
          <br>
          <button type="submit" class="btn button w-100">Clear Messages</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

</script>
