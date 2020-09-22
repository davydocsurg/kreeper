<template>
  <div class="tab-pane fade" id="settings">
    <div class="settings">
      <!-- user profile -->
      <userprofile :details="details"/>

      <div class="categories" id="accordionSettings">
        <h4 class="text-dark"><strong>Settings</strong></h4>
        <br>
        <!-- Start of My Account -->
        <myaccount/>
        <!-- end of My account -->
        <!-- start of chat history -->
        <!-- <chathistory/> -->
        <!-- End of Chat History -->
        <!-- Start of Notifications Settings -->
        <!-- <notifications/> -->
        <!-- End of Notifications Settings -->
        <!-- Start of Connections -->
        <!-- <connections/> -->
        <!-- End of Connections -->
        <!-- Start of Theme Settings -->
        <themes/>
        <!-- End of Theme Settings -->
        <!-- Start of Language -->
        <!-- <languages/> -->
        <!-- End of Language -->
        <!-- Start of Privacy & Safety -->
        <privacy/>
        <!-- End of Privacy & Safety -->
      </div>
    </div>
  </div>
</template>

<script>
import myaccount from './sub_settings/MyAccount.vue'
import userprofile from './sub_settings/UserProfile.vue'
import chathistory from './sub_settings/ChatHistory.vue'
import notifications from './sub_settings/Notifications.vue'
import connections from './sub_settings/Connections.vue'
import themes from './sub_settings/Themes.vue'
import languages from './sub_settings/Languages.vue'
import privacy from './sub_settings/PrivacySafety.vue'

export default {
  data() {
    return {
      imageType: 'image/png,image/gif,image/jpeg,image/jpg,image/tiff',
      details: {
        name: 'Fred Jones',
        nickname: 'fredo',
        email: 'fredo@gmail.com',
        about: 'I\'m me,myself and I... blah blah blah',
        avatar: '',
        location: 'Helena, Montana',
        isUpdated: false
      }
    }
  },

  mounted() {
    // axios.get('http://127.0.0.1:8000/api/details').then((response) => {
    //   this.details.name = response.data;
    // });
  },

  components: {
    myaccount,
    userprofile,
    chathistory,
    notifications,
    connections,
    themes,
    languages,
    privacy
  }
}
</script>
