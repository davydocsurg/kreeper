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
            v-model="message"
            @keydown.enter="send"
          ></textarea>
          <!-- @keydown="sendTypingEvent" -->
          <button class="btn emoticons" @click="toggleEmo">
            <i class="material-icons">insert_emoticon</i>
          </button>
          <button type="submit" class="btn send" @click="send">
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
</template>

<script>
// import { Picker } from 'emoji-mart-vue'

export default {
  data() {
    return {
      message: "",
      files: [],
      emoStatus: false,
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
    send(e) {
      e.preventDefault();

      if (this.message == "") {
        return;
      }

      this.$emit("send", this.message);
      this.message = "";
    },

    toggleEmo() {
      this.emoStatus = !this.emoStatus;
    },

    onInput(e) {
      if (!e) {
        return false;
      }
      if (!this.message) {
        this.message = e.native;
      } else {
        this.message = this.message + e.native;
      }
      this.emoStatus = false;
    },

    // sendImage(e) {
    // let file = e.target.files[0];
    // let reader = new FileReader();

    // let limit = 1024 * 1024 * 2;
    // if (this.message == "") {
    // swal({
    //   type: "error",
    //   title: "Oops...",
    //   text: "You are uploading a large file",
    // });
    //   return;
    // }

    // reader.onloadend = (file) => {
    //   this.form.photo = reader.result;
    // };
    // reader.readAsDataURL(file);
    // this.$emit("sendImage", this.message);
    // this.message = "";
    // },
  },
};
</script>
