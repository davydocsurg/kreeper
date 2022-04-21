<template>
  <!-- <div class="tab-pane fade" id="settings"> -->
    <!-- <div class="settings"> -->
      <div class="profile">
        <!-- <img class="avatar-xl" src="'$user->avatar'" alt="avatar"> -->
        <img class="avatar-xl" src="dist/img/avatars/avatar-male-1.jpg" alt="avatar">
        <h1><a href="#">
          {{details.name}} ({{details.nickname}})
        </a></h1>
        <span class="text-primary">Bio: {{details.about}}</span>
        <div class="stats">
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
        </div>
        <hr>
        <span class="text-dark">
          Email: <a href="mailto:this.$props.details.email">{{details.email}}</a>
          <br>
          Location: {{details.location}}
        </span>
        <hr>
      </div>
    <!-- </div> -->
  <!-- </div> -->
</template>

<script>
// import myaccount from './sub_settings/MyAccount.vue'

export default {
  props: {
    details: {
      name: '',
      nickname: '',
      email: '',
      about: '',
      avatar: '',
      location: '',
      isUpdated: false
    }
  },

  // data() {
  //   return {
  //     imageType: 'image/png,image/gif,image/jpeg,image/jpg,image/tiff',
  //      details: {
  //       name: '{{$user->name}}',
  //       nickname: '',
  //       email: '',
  //       about: '',
  //       avatar: '',
  //       location: '',
  //       isUpdated: false
  //     }
  //   }
  // },

  mounted() {
    // axios.get('http://127.0.0.1:8000/api/details').then((response) => {
    //   this.details.name = response.data;
    //   this.details.avatar = response.data;
    // });
  },

  components: {
    // myaccount
  }
}
</script>
