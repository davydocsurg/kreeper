<template>
  <div class="category mb-3">
    <a href="#" class="title collapsed d-flex" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
      <i class="material-icons md-30 online">notifications_none</i>
      <div class="data ml-2">
        <h5 class="text-dark">Notifications</h5>
        <p class="text-muted">Turn notifications on or off</p>
      </div>
      <i class="material-icons ml-5">keyboard_arrow_right</i>
    </a>
    <div class="collapse" id="collapseThree" aria-labelledby="headingThree" data-parent="#accordionSettings">
      <div class="content no-layer pt-5 pb-3">
        <div class="set d-flex mb-4">
          <div class="details">
            <h5 class="text-dark">Desktop Notifications</h5>
            <p class="text-muted">You can set up Swipe to receive notifications when you have new messages.</p>
          </div>
          <label class="switch">
            <input type="checkbox" checked>
            <span class="slider round"></span>
          </label>
        </div>
        <div class="set d-flex mb-4">
          <div class="details">
            <h5 class="text-dark">Unread Message Badge</h5>
            <p class="text-muted">If enabled shows a red badge on the Swipe app icon when you have unread messages.</p>
          </div>
          <label class="switch">
            <input type="checkbox" checked>
            <span class="slider round"></span>
          </label>
        </div>
        <div class="set d-flex mb-4">
          <div class="details">
            <h5 class="text-dark">Taskbar Flashing</h5>
            <p class="text-muted">Flashes the Swipe app on mobile in your taskbar when you have new notifications.</p>
          </div>
          <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
          </label>
        </div>
        <div class="set d-flex mb-4">
          <div class="details">
            <h5 class="text-dark">Notification Sound</h5>
            <p class="text-muted">Set the app to alert you via notification sound when you have unread messages.</p>
          </div>
          <label class="switch">
            <input type="checkbox" checked>
            <span class="slider round"></span>
          </label>
        </div>
        <div class="set d-flex mb-4">
          <div class="details">
            <h5 class="text-dark">Vibrate</h5>
            <p class="text-muted">Vibrate when receiving new messages (Ensure system vibration is also enabled).</p>
          </div>
          <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
          </label>
        </div>
        <div class="set d-flex mb-4">
          <div class="details">
            <h5 class="text-dark">Turn On Lights</h5>
            <p class="text-muted">When someone send you a text message you will receive alert via notification light.</p>
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
