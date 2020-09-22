<template>
  <div class="content" id="" ref="msgs">
    <div class="container" v-if="user">
      <div class="col-md-12">
        <div class="content empty" v-if="messages < 1">
          <div class="container">
          <div class="col-md-12">
            <div class="no-messages">
            <i class="material-icons md-48">forum</i>
            <p>Seems people are shy to start the chat. Break the ice, send the first message.</p>
            </div>
          </div>
          </div>
        </div>
        <div
          v-for="message in messages"
          :class="`${message.to == user.id ? 'message me' : 'message'}`" :key="message.id"
        >
          <!-- <img class="avatar-md" :src="user.avatar" data-toggle="tooltip" data-placement="top" title="user.name" alt="user.name"> -->
          <div class="text-main" v-if="message.text">
            <div :class="`${message.to == user.id ? 'text-group me' : 'text-group'}`" >
              <div :class="`${message.to == user.id ? 'text me' : 'text'}`" >
                <p>{{ message.text }}
                  <!-- <i class="material-icons ml-3 float-right" v-if="authUser">check</i> -->
                </p>
              </div>
            </div>
            <div class="attachment">
              <img :src="'/storage/'+message.image"  alt="" srcset="" v-if="message.image">
            </div>
            <small>
              {{message.created_at | date}}
            </small>
          </div>
      </div>
      <div class="message" v-if="typingUser">
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
      </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
   props: {
    user: {
      type: Object,
    },

    // MsgRead: {
    //   required: true
    // },

    messages: {
      type: Array,
      required: true
    }
  },

  // data() {
  //   return {
  //     messages: [],
  //     sendMsg: ''
  //   }
  // },

  mounted() {

  },

  methods: {
    scrollToBottom() {
      setTimeout(() => {
        this.$refs.msgs.scrollTop = this.$refs.msgs.scrollHeight - this.$refs.msgs.clientHeight
      }, 5);
    }
  },

  watch: {
   user(user) {
     this.scrollToBottom()
   },

    messages(messages) {
     this.scrollToBottom()
   }
  }
}
</script>
