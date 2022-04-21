<template>
    <div class="container">
        <div class="col-md-12">
            <div class="bottom">
                <div class="floating-div">
                    <picker
                        v-if="emoStatus"
                        set="emojione"
                        @select="onInput"
                        title="Pick your emoji…"
                    />
                </div>
                <form class="position-relative w-100">
                    <textarea
                        class="form-control"
                        placeholder="Start typing for reply..."
                        rows="1"
                        id="body"
                        v-model="body"
                    >
           <!-- @keydown="alternative" -->

          </textarea
                    >
                    <button class="btn emoticons">
                        <i class="material-icons">insert_emoticon</i>
                    </button>
                    <button type="submit" class="btn send">
                        <!-- @click.prevent="sendMessage" -->
                        <i class="material-icons">send</i>
                    </button>
                </form>
                <label>
                    <!-- post-action="send" -->
                    <file-upload
                        ref="upload"
                        @input-file="$refs.upload.active = true"
                        :headers="{ 'X-CSRF-TOKEN': token }"
                        v-model="files"
                    >
                        <!-- @input-file="$refs.upload.active = true" -->

                        <!-- <input type="file" @input-file="send" /> -->
                        <span class="btn attach d-sm-block d-none">
                            <i class="material-icons">attach_file</i>
                        </span>
                    </file-upload>
                </label>
            </div>
        </div>
    </div>
    <!-- </div> -->
</template>

<script>
// import { Picker } from 'emoji-mart-vue'

export default {
    data() {
        return {
            body: null,
        };
    },

    watch: {
        files: {
            deep: true,
            handler() {
                let success = this.files[0].success;
                if (success) {
                    this.send(e);
                }
            },
        },

        "$refs.upload"(val) {
            console.log(val);
        },
    },
    methods: {
        // alternative(e) {
        //   if(e.keyCode === 13 && !e.shiftKey) {
        //     e.preventDefault();
        //     this.sendMessage();
        //   }
        // },
        // sendMessage() {
        //   if(!this.body || this.body.trim() === '') {
        //       return
        //   }
        //   let messageObj = this.buildMessage();
        //   Event.$emit('added_message', messageObj);
        //   axios.post('http://127.0.0.1:8000/api/message', {
        //     body: this.body.trim()
        //   }).catch(() => {
        //       console.log('failed');
        //   });
        //   this.body = null;
        // },
        // buildMessage() {
        //   return {
        //     id: Date.now(),
        //     body: this.body,
        //     selfMessage: true,
        //     user: {
        //       name: Laravel.user.name
        //     }
        //   }
        // }
    },
};
</script>
