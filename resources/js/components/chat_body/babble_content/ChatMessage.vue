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
          <!-- <div class="" v-for="authUser in authUsers" :key="authUser.id"> -->
            <!-- <img class="avatar-md" v-if="authUser.avatar" :src="user.avatar" data-toggle="tooltip" data-placement="top" title="user.name" alt="user.name"> -->
          <!-- </div> -->
          <div class="text-main" v-if="message.text">
            <div :class="`${message.to == user.id ? 'text-group me' : 'text-group'}`" >
              <div class="d-flex" :class="`${message.to == user.id ? 'text me' : 'text'}`" >
                <p class="float-left container">
                  {{ message.text }}
                </p>
                <p class="float-right">
                  <i class="fas fa-check-circle text-center"></i>
                  <!-- <i class="fas fa-check-double float-right text-primary" v-if="selected"></i> -->
                </p>
              </div>
            </div>
            <div class="text-main" v-if="message.image">
              <div :class="`${message.to == user.id ? 'text-group me' : 'text-group'}`" >
                <div :class="`${message.to == user.id ? 'text me' : 'text'}`">
                   <div class="attachment">
                    <img :src="'/storage/'+message.image"  alt="" srcset="">
                  </div>
                </div>
              </div>
            </div>
            <small>
              {{message.created_at | date}}
            </small>
          </div>
      </div>
      <!-- <div class="message">
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

  data() {
    return {
      // messages: [],
      // sendMsg: ''
      authUsers: []
    }
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
