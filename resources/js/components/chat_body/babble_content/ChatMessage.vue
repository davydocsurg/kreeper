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
                    <img
                        class="avatar-md"
                        src="dist/img/avatars/avatar-female-5.jpg"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Keith"
                        alt="avatar"
                    />
                    <div class="text-main">
                        <div class="text-group">
                            <div class="text">
                                <p>
                                    We've got some killer ideas kicking about
                                    already.
                                </p>
                                <!-- <p>{{ message.body}}</p> -->
                            </div>
                        </div>
                        <span>09:46 AM</span>
                    </div>
                </div>
                <div class="message me">
                    <!-- <div class="" v-for="authUser in authUsers" :key="authUser.id"> -->
                    <!-- <img class="avatar-md" v-if="authUser.avatar" :src="user.avatar" data-toggle="tooltip" data-placement="top" title="user.name" alt="user.name"> -->
                    <!-- </div> -->
                    <div class="text-main" v-if="message.text">
                        <div
                            :class="`${
                                message.to == user.id
                                    ? 'text-group me'
                                    : 'text-group'
                            }`"
                        >
                            <div
                                class="d-flex"
                                :class="`${
                                    message.to == user.id ? 'text me' : 'text'
                                }`"
                            >
                                <p class="float-left container">
                                    {{ message.text }}
                                </p>
                                <p class="float-right">
                                    <i
                                        class="fas fa-check-circle text-center"
                                    ></i>
                                    <!-- <i class="fas fa-check-double float-right text-primary" v-if="selected"></i> -->
                                </p>
                            </div>
                        </div>
                        <div class="text-main" v-if="message.image">
                            <div
                                :class="`${
                                    message.to == user.id
                                        ? 'text-group me'
                                        : 'text-group'
                                }`"
                            >
                                <div
                                    :class="`${
                                        message.to == user.id
                                            ? 'text me'
                                            : 'text'
                                    }`"
                                >
                                    <div class="attachment">
                                        <img
                                            :src="'/storage/' + message.image"
                                            alt=""
                                            srcset=""
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <small>
                            {{ message.created_at | date }}
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
            required: true,
        },
    },

    data() {
        return {
            // messages: [],
            // sendMsg: ''
            authUsers: [],
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
        scrollToBottom() {
            setTimeout(() => {
                this.$refs.msgs.scrollTop =
                    this.$refs.msgs.scrollHeight - this.$refs.msgs.clientHeight;
            }, 5);
        },
    },

    watch: {
        user(user) {
            this.scrollToBottom();
        },

        messages(messages) {
            this.scrollToBottom();
        },
    },
};
</script>
