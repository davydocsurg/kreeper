<template>
  <div class="main">

    <div class="tab-content" id="nav-tabContent" v-if="user">
      <!-- start of babble -->
      <div class="babble tab-pane fade active show" id="list-chat" role="tabpanel" aria-labelledby="list-chat-list">
      <!-- chat -->
        <div class="chat" id="">
          <div class="top">
            <div class="container">
              <div class="col-md-12">
                <div class="inside">
                  <a href="#"><img class="avatar-md" :src="user.avatar"
                    data-toggle="tooltip" data-placement="top"
                    title="Keith" alt="user.name"></a>
                  <div class="status">
                    <i class="material-icons online">fiber_manual_record</i>
                  </div>
                  <div class="data">
                    <h5><a href="#">{{ user ? user.name : 'select a Contact'}}</a></h5>
                    <span>Active now</span>
                  </div>
                  <button class="btn connect d-md-block d-none" name="1"><i class="material-icons md-30">phone_in_talk</i></button>
                  <button class="btn connect d-md-block d-none" name="1"><i class="material-icons md-36">videocam</i></button>
                  <button class="btn d-md-block d-none"><i class="material-icons md-30">info</i></button>
                  <div class="dropdown">
                    <button class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons md-30">more_vert</i></button>
                    <div class="dropdown-menu dropdown-menu-right">
                      <button class="dropdown-item connect" name="1"><i class="material-icons">phone_in_talk</i>Voice Call</button>
                      <button class="dropdown-item connect" name="1"><i class="material-icons">videocam</i>Video Call</button>
                      <hr>
                      <button class="dropdown-item"><i class="material-icons">clear</i>Clear History</button>
                      <button class="dropdown-item"><i class="material-icons">block</i>Block Contact</button>
                      <button class="dropdown-item"><i class="material-icons">delete</i>Delete Contact</button>
                      <button class="dropdown-item" @click="logout">
                       <i class="material-icons">power_settings_new</i>Logout
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

            <chatmessage :user="user" :messages="messages" />

            <chatform @send="sendMessage"/>

            </div>
              <call/>
          </div>
        </div>
      <div class="selectacontact" v-else>
        <div class="container">
          <div class="col-md-12">
            <div class="no-messages">
              <i class="material-icons">account_circle</i>
              <p>Select a contact to chat with</p>
            </div>
          </div>
        </div>
      </div>
  </div>
</template>

<script>
import call from './babble_content/Call.vue'
import chatmessage from './babble_content/ChatMessage.vue'
import chatform from './babble_content/ChatForm.vue'

 export default {
  components: {
    chatmessage,
    chatform,
    call
  },
 	props: {
	 	user: {
      type: Object,
      default: null
    },
    // MsgRead: {
    //   required: true
    // },
    messages: {
      type: Array,
      default: []
    }
 	},

  methods: {
    logout () {
      window.location="login"
      axios.post('http://127.0.0.1:8000/logout')
    },
    sendMessage(text) {
      // console.log(text)
      if (!this.user) {
        return
      }

      axios.post('/conversation/send', {
        user_id: this.user.id,
        text: text
      }).then((response) => {
        this.$emit('new', response.data)
      })
  	}
  }
 }
</script>