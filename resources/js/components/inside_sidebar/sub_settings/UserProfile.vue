<template>
  <!-- <div class="tab-pane fade" id="settings"> -->
    <!-- <div class="settings"> -->
      <div class="profile">

        <div v-for="authUser in authUsers" :key="authUser.id">
          <img class="avatar-xl" :src="authUser.avatar" alt="authUser.name">
          <h1><a href="#">
            {{authUser.name}} <span v-if="authUser.nickname">({{authUser.nickname}})</span>
          </a></h1>
          <span class="text-primary" v-if="authUser.about">Bio: {{authUser.about}}</span>
          <!-- <div class="stats">
            <div class="item">
              <h2>122</h2>
              <h3>Fellas</h3>
            </div>
            <div class="item">
              <h2>305</h2>
              <h3>Chats</h3>
            </div>
            <div class="item">
              <h2>1538</h2>
              <h3>Posts</h3>
            </div>
          </div> -->
          <hr>
          <span class="text-dark">
            Email: <a href="mailto:`authUser.email`">{{authUser.email}}</a>
            <br>
            <span v-if="authUser.location">Location: {{authUser.location}}</span>
          </span>
          <hr>
        </div>
      </div>
    <!-- </div> -->
  <!-- </div> -->
</template>

<script>
// import myaccount from './sub_settings/MyAccount.vue'

export default {
  // props: {
  //   details: {
  //     name: '',
  //     nickname: '',
  //     email: '',
  //     about: '',
  //     avatar: '',
  //     location: '',
  //     isUpdated: false
  //   }
  // },

  data() {
    return {
      authUsers: []
    }
  },

  mounted() {
    const url = window.location.origin+'/auth/user'
    axios.get(url)
    .then(response => this.authUsers = response.data)
    .catch(error => {
      console.log(error)
    })
  },

  components: {
    // myaccount
  }
}
</script>
