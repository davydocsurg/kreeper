<template>
  <div class="content" id="content">
    <div class="container">
      <div class="col-md-12">
        <!-- <div class="date">
          <hr>
          <span>Yesterday</span>
          <hr>
        </div> -->
        <div class="message">
          <img class="avatar-md" src="dist/img/avatars/avatar-female-5.jpg" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">
          <div class="text-main">
            <div class="text-group">
              <div class="text">
                <p>We've got some killer ideas kicking about already.</p>
                <!-- <p>{{ message.body}}</p> -->
              </div>
            </div>
            <span>09:46 AM</span>
          </div>
        </div>
        <div class="message me"
        >
        <!-- :class="{ 'me': message.selfMessage }" -->
          <div class="text-main">
            <div class="text-group me"
            >
            <!-- :class="{ 'me': message.selfMessage }" -->
              <div class="text me"
              >
              <!-- :class="{ 'me': message.selfMessage }" -->
                <!-- <p>{{ message.body}}</p> -->
                <p>Can't wait! How are we coming along with the client?</p>
              </div>
            </div>
            <span>11:32 AM</span>
          </div>
        </div>

        <!-- <div class="message">
          <img class="avatar-md" src="dist/img/avatars/avatar-female-5.jpg" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">
          <div class="text-main">
            <div class="text-group">
              <div class="text typing">
                <div class="wave">
                  <span class="dot"></span>
                  <span class="dot"></span>
                  <span class="dot"></span>
                </div>
              </div>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['message']
}
</script>
