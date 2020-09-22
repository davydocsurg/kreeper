<template>
  <div class="container">
    <div class="col-md-12">
      <div class="bottom">
        <form class="position-relative w-100">
          <textarea class="form-control" placeholder="Start typing for reply..." rows="1" v-model="message" @keydown.enter="send"></textarea>
          <!-- @keydown="sendTypingEvent" -->
          <button class="btn emoticons"><i class="material-icons">insert_emoticon</i></button>
          <button type="submit" class="btn send" @click="send"><i class="material-icons">send</i></button>
        </form>
        <label>
          <input type="file">
          <span class="btn attach d-sm-block d-none"><i class="material-icons">attach_file</i></span>
        </label>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      message: ''
    }
  },

  methods: {
    send(e) {
      e.preventDefault();

      if (this.message == '') {
        return
      }

      this.$emit('send', this.message)
      this.message = ''
    }
  }
}
</script>
