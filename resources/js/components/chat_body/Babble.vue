<template>
    <div class="main">
        <div class="tab-content" id="nav-tabContent">
            <!-- start of babble -->
            <div
                class="babble tab-pane fade active show"
                id="list-chat"
                role="tabpanel"
                aria-labelledby="list-chat-list"
            >
                <!-- chat -->
                <div class="chat" id="chat1">
                    <div class="top">
                        <div class="container">
                            <!--   :src="user.avatar" -->
                            <div class="col-md-12">
                                <div class="inside">
                                    <a href="#"
                                        ><img
                                            class="avatar-md"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="Keith"
                                            alt="user.name"
                                    /></a>

                                    <div class="status">
                                        <i class="material-icons online"
                                            >fiber_manual_record</i
                                        >
                                    </div>
                                    <div class="data">
                                        <h5>
                                            <a href="#">{{
                                                user
                                                    ? user.name
                                                    : "select a Contact"
                                            }}</a>
                                        </h5>
                                        <span>Active now</span>
                                    </div>
                                    <button
                                        class="btn connect d-md-block d-none"
                                        name="1"
                                    >
                                        <i class="material-icons md-30"
                                            >phone_in_talk</i
                                        >
                                    </button>
                                    <button
                                        class="btn connect d-md-block d-none"
                                        name="1"
                                    >
                                        <i class="material-icons md-36"
                                            >videocam</i
                                        >
                                    </button>
                                    <button class="btn d-md-block d-none">
                                        <i class="material-icons md-30">info</i>
                                    </button>
                                    <div class="dropdown">
                                        <button
                                            class="btn"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                        >
                                            <i class="material-icons md-30"
                                                >more_vert</i
                                            >
                                        </button>
                                        <div
                                            class="dropdown-menu dropdown-menu-right"
                                        >
                                            <button
                                                class="dropdown-item connect"
                                                name="1"
                                            >
                                                <i class="material-icons"
                                                    >phone_in_talk</i
                                                >Voice Call
                                            </button>
                                            <button
                                                class="dropdown-item connect"
                                                name="1"
                                            >
                                                <i class="material-icons"
                                                    >videocam</i
                                                >Video Call
                                            </button>
                                            <hr />
                                            <button class="dropdown-item">
                                                <i class="material-icons"
                                                    >clear</i
                                                >Clear History
                                            </button>
                                            <button class="dropdown-item">
                                                <i class="material-icons"
                                                    >block</i
                                                >Block Contact
                                            </button>
                                            <button class="dropdown-item">
                                                <i class="material-icons"
                                                    >delete</i
                                                >Delete Contact
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <conversation :user="selectedUser" :messages="messages" />
                    <!-- End of Chat -->

                    <!-- <div class="container">
            <chatform @send="sendMessage"/>
          </div> -->
                </div>
                <call />
                <!-- End of Call -->
            </div>
            <!-- babble ends not needed----|> -->
        </div>
    </div>
    <!-- </div> -->
</template>

<script>
import call from "./babble_content/Call";
import conversation from "./Conversation.vue";
// import chatform from './babble_content/ChatForm.vue'
import Event from "../../event.js";

export default {
    props: {
        user: {
            type: Object,
            default: null,
        },
    },

    data() {
        return {
            messages: [],
            selectedUser: null,
        };
    },

    mounted() {
        // axios.get('http://127.0.0.1:8000/api/message').then((response) => {
        //   this.messages = response.data;
        // });
        // Event.$on('added_message', (message) => {
        //   this.messages.unshift(message);
        //   if(message.selfMessage) {
        //     this.$refs.message.scrollTop = 0;
        //   }
        // });
    },
    components: {
        call,
        conversation,
        // chatform
    },
};
</script>
