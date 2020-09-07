<template>
  <div class="category mb-3">
    <a href="#" class="title collapsed d-flex" id="headingFour" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
      <i class="material-icons md-30 online">sync</i>
      <div class="data ml-2">
        <h5 class="text-dark">Connections</h5>
        <p class="text-muted">Sync your social accounts</p>
      </div>
      <i class="material-icons ml-5">keyboard_arrow_right</i>
    </a>
    <div class="collapse" id="collapseFour" aria-labelledby="headingFour" data-parent="#accordionSettings">
      <div class="content pt-4 pb-3">
        <div class="card p-3 shadow-sm container mb-3 mt-3">
          <div class="d-flex">
            <img src="dist/img/integrations/slack.svg" alt="app">
            <div class="permissions ml-2">
              <h5 class="text-dark">Skrill</h5>
              <p>Read, Write, Comment</p>
            </div>
            <label class="switch ml-2">
              <input type="checkbox" checked>
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <div class="card p-3 shadow-sm container mb-3 mt-3">
          <div class="d-flex">
          <img src="dist/img/integrations/dropbox.svg" alt="app">
          <div class="permissions ml-2">
            <h5 class="text-dark">Dropbox</h5>
            <p>Read, Write, Upload</p>
          </div>
          <label class="switch ml-2">
            <input type="checkbox" checked>
            <span class="slider round"></span>
          </label>
          </div>
        </div>
        <div class="card p-3 shadow-sm container mb-3 mt-3">
          <div class="d-flex">
          <img src="dist/img/integrations/drive.svg" alt="app">
          <div class="permissions ml-2">
            <h5 class="text-dark">Google Drive</h5>
            <p>No permissions set</p>
          </div>
          <label class="switch ml-2">
            <input type="checkbox">
            <span class="slider round"></span>
          </label>
          </div>
        </div>
        <div class="card p-3 shadow-sm container mb-3 mt-3">
          <div class="d-flex">
              <img src="dist/img/integrations/trello.svg" alt="app">
            <div class="permissions ml-2">
              <h5 class="text-dark">Trello</h5>
              <p>No permissions set</p>
            </div>
            <label class="switch ml-2">
              <input type="checkbox">
              <span class="slider round"></span>
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

</script>
