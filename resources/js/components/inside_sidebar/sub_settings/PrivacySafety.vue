<template>
<div class="">
    <a href="#" class="title collapsed d-flex" id="headingSeven" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
      <i class="material-icons md-30 online">lock_outline</i>
      <div class="data ml-2">
        <h5 class="text-dark">Privacy & Safety</h5>
        <p class="text-muted">Control your privacy settings</p>
      </div>
      <i class="material-icons ml-4">keyboard_arrow_right</i>
    </a>
    <div class="collapse" id="collapseSeven" aria-labelledby="headingSeven" data-parent="#accordionSettings">
      <div class="content no-layer mb-4 mt-4">
        <div class="set d-flex mb-4 mt-4">
          <div class="details">
            <h5 class="text-dark">Keep Me Safe</h5>
            <p class="text-muted">Automatically scan and delete direct messages you receive from everyone that contain explict content.</p>
          </div>
          <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
          </label>
        </div>
        <div class="set d-flex mb-4 mt-4">
          <div class="details">
            <h5 class="text-dark">My Friends Are Nice</h5>
            <p class="text-muted">If enabled scans direct messages from everyone unless they are listed as your friend.</p>
          </div>
          <label class="switch">
            <input type="checkbox" checked>
            <span class="slider round"></span>
          </label>
        </div>
        <div class="set d-flex mb-4 mt-4">
          <div class="details">
            <h5 class="text-dark">Everyone can add me</h5>
            <p class="text-muted">If enabled anyone in or out your friends of friends list can send you a friend request.</p>
          </div>
          <label class="switch">
            <input type="checkbox" checked>
            <span class="slider round"></span>
          </label>
        </div>
        <div class="set d-flex mb-4 mt-4">
          <div class="details">
            <h5 class="text-dark">Friends of Friends</h5>
            <p class="text-muted">Only your friends or your mutual friends will be able to send you a friend reuqest.</p>
          </div>
          <label class="switch">
            <input type="checkbox" checked>
            <span class="slider round"></span>
          </label>
        </div>
        <div class="set d-flex mb-4 mt-4">
          <div class="details">
            <h5 class="text-dark">Data to Improve</h5>
            <p class="text-muted">This settings allows us to use and process information for analytical purposes.</p>
          </div>
          <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
          </label>
        </div>
        <div class="set d-flex mb-4 mt-4">
          <div class="details">
            <h5 class="text-dark">Data to Customize</h5>
            <p class="text-muted">This settings allows us to use your information to customize Swipe for you.</p>
          </div>
          <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
          </label>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

</script>
