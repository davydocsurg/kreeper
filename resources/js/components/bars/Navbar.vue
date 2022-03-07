<template>
  <!-- <div class=""> -->
  <!-- <div class="navigation"> -->
  <div class="container">
    <div class="inside">
      <div
        class="nav nav-tab menu"
        v-for="authUser in authUsers"
        :key="authUser.id"
      >
        <button class="btn">
          <img class="avatar-xl" :src="authUser.avatar" alt="authUser.name" />
        </button>
        <a href="#contacts" data-toggle="tab">
          <i class="material-icons">account_circle</i>
        </a>
        <a href="#messages" data-toggle="tab" class="active f-grow1">
          <i class="material-icons ">chat_bubble_outline</i>
        </a>
        <!-- <a href="#notifications" data-toggle="tab" class="f-grow1" @click="logout">
        <i class="material-icons">power_settings_new</i></a> -->
        <button class="btn mode" @click.prevent="toggleTheme">
          <i class="material-icons">brightness_2</i>
        </button>
        <a href="#settings" data-toggle="tab">
          <i class="material-icons">settings</i>
        </a>
        <!-- <button class="btn power" @click="logout"> -->
        <!-- <a class="btn">
            <i class="material-icons">power_settings_new</i>
          </a> -->
        <a data-toggle="tab" class="btn logout" @click="logout">
          <i class="material-icons">power_settings_new</i></a
        >
        <!-- </button> -->
        <form
          id="logout-form"
          action="'logout'"
          method="POST"
          style="display: none;"
        >
          @csrf
        </form>
      </div>
    </div>
  </div>
  <!-- </div> -->
  <!-- <sidebar/> -->
  <!-- </div> -->
</template>

<script>
import axios from "axios";
// import sidebar from './Sidebar.vue'
// import babble from './../chat_body/Babble.vue'

export default {
  // props: {
  //   user: {
  //     type: Object,
  //     required: true
  //   }
  // },

  data() {
    return {
      authUsers: [],
      // lightsout: false,
      // lightson: true,
    };
  },

  mounted() {
    const url = window.location.origin + "/auth/user";
    axios
      .get(url)
      .then((response) => (this.authUsers = response.data))
      .catch((error) => {
        console.log(error);
      });
  },

  methods: {
    logout() {
      window.location = "login";
      axios.post("http://127.0.0.1:8000/logout");
    },
    lightsout() {
      window.location = "chat";
    },
    lightson() {
      window.location = "home";
    },
    toggleTheme() {
      this.lightsout = this.lightson;
    },
  },

  components: {
    // sidebar,
    // babble
  },
};
</script>
