<template>
  <div class="layout">
    <div class="navigation">
    <navbar/>
  </div>
    <div class="sidebar" id="sidebar">
      <div class="container">
        <div class="col-md-12">
          <div class="tab-content">

            <contacts/>

            <discussions :users="users" @selected="startChat"/>

            <!-- <notifications/> -->

            <settings/>

            <AddFriends/>

            <CreateChat/>

          </div>
        </div>
      </div>
    </div>
    <conversation :user="selectedUser" :messages="messages" @new="saveNewMsg" />
  </div>
</template>

<script>
// import babble from './../chat_body/Babble.vue'

import navbar from './Navbar.vue'

import contacts from './../inside_sidebar/Contacts.vue'
import discussions from './../inside_sidebar/Discussions.vue'
// import notifications from './../inside_sidebar/Notifications.vue'
import settings from './../inside_sidebar/Settings.vue'
import AddFriends from './../inside_sidebar/AddFriends.vue'
import CreateChat from './../inside_sidebar/CreateChat.vue'

// Chat
import conversation from './../chat_body/Conversation.vue'

export default {
  components: {
    // babble,

    contacts,
    discussions,
    // notifications,
    settings,
    AddFriends,
    CreateChat,
    navbar,
    conversation
  },

  props: {
    user: {
      type: Object,
      required: true
    },
  },

  data() {
    return {
      users: [],
      messages: [],
      selectedUser: null,
      // typingCalc: false,
      MsgRead: false

    }
  },

  mounted() {
    Echo.join('Mirou')
      .here((users) => {
            console.log('online',users);
            // this.ActiveUsers=users;
      })
      .joining((user) => {
          // this.onlineFriends.push(user);
          console.log('joining',user.name);
      })
      .leaving((user) => {
          // this.onlineFriends.splice(this.onlineFriends.indexOf(user),1);
          console.log('leaving',user.name);
      });
    Echo.private(`messages${this.user.id}`)
      .listen('NewMessage', (e) => {
        this.handleIncomingMsg(e.message)
      })

      // .listenForWhisper('typing', user => {
        // this.act = user

        // if (this.typingCalc) {
        //   clearTimeout(this.typingCalc)
        // }

        // this.typingCalc = setTimeout(() => {
        //   this.authUser = false
        // }, 3000);

        // console.log('typing');
        // console.log(response);
      // })

    const url = window.location.origin+'/users'
    // fetch(url)
      // .then(response=> response.json())
    axios.get(url)
    .then(response => this.users = response.data)
    .catch(error => {
      console.log(error)
    })

  },

  methods: {
    startChat(user) {
      this.updateUnreadCount(user, true)
      // this.MsgRead = (user, true)

      axios.get(`/conversation/${user.id}`)
        .then((response) => {
          this.messages = response.data
          this.selectedUser = user
        })
    },

    saveNewMsg(message) { //fix text later
      this.messages.push(message)
    },

    handleIncomingMsg(message) {
      if (this.selectedUser && message.from == this.selectedUser.id) {
        this.saveNewMsg(message)
        return
      }

      this.updateUnreadCount(message.from_user, false)
    },

    updateUnreadCount(user, reset) {
      this.users = this.users.map((single) => {
        if (single.id !== user.id) {
          return single
        }

        if (reset)
          single.unread = 0
          // this.MsgRead = true
        else
          single.unread += 1

        return single
      })

    },

    sendTypingEvent() {
      Echo.private(`messages${this.user.id}`)
        .whisper('typing', this.authUser)
    }
  }
}
</script>
