<template>
<div class="category mb-3">
  <a href="#" class="title collapsed d-flex" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
  <i class="material-icons md-30 online">person_outline</i>
  <div class="data ml-2">
    <h5 class="text-dark">My Account</h5>
    <p class="text-muted">Update your profile details</p>
  </div>
  <i class="material-icons ml-5">keyboard_arrow_right</i>
</a>
  <div class="collapse" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionSettings">
    <div class="content mb-4">
      <div class="upload card shadow-sm p-3 mb-4 mt-4">
        <div class="data d-flex">
          <img class="avatar-xl" src="dist/img/avatars/avatar-male-1.jpg" alt="image">
          <label>
            <input type="file">
            <span class="btn button ">Modify avatar</span>
          </label>
        </div>
        <br>
        <p>For best results, use an image at least 256px by 256px in either .jpg or .png format!</p>
        <hr>
        <br><br>
        <form>
          <div class="parent">
            <div class="field">
              <label for="firstName" class="text-dark dd"> Name <span class="asts">*</span></label>
              <input type="text" class="form-control" id="name" v-model="details.name" placeholder="Enter a new name"  required>
            </div>
            <!-- <div class="field pl-2">
              <label for="lastName" class="text-dark dd">Last name <span class="asts">*</span></label>
              <input type="text" class="form-control" id="lastName" v-model="details.lastName" placeholder="Last name" value="Knudsen" required>
            </div> -->
          </div>
          <br>
          <div class="field">
            <label for="email" class="text-dark dd">Email <span class="asts">*</span></label>
            <input type="email" class="form-control" id="email" v-model="details.email" placeholder="Enter your email address" required>
          <div v-if="isUpdated">{{details.email}}</div>
          </div>
          <br>
          <div class="field">
            <label for="text" class="text-dark dd">Nickname</label>
            <input type="text" class="form-control" id="nickname" v-model="details.nickname" placeholder="Enter a new nickname" required>
          </div>
          <br>
          <div class="field">
            <label for="text" class="text-dark dd">About</label>
            <input type="text" class="form-control" id="about" v-model="details.about" placeholder="Enter a new biography" required>
          </div>
          <br>
          <div class="field">
            <label for="location" class="text-dark dd">Location</label>
            <input type="text" class="form-control" id="location" v-model="details.location" placeholder="Enter your location" required>
          </div>
          <br>
          <!-- <button class="btn btn-link text-danger w-100">Delete Account</button> -->
          <!-- <button class="btn btn-primary w-100" @click.prevent="submitted">Apply</button> -->

          <button class="btn btn-outline-success button w-100" @click.prevent="update">Update Profile</button>
        </form>

      </div>
    </div>
  </div>
</div>
</template>

<script>
import axios from 'axios'

export default {
  props: {
    src: {
      type: String,
      default () {
        return ''
      }
    }
  },

  data() {
    return {
      imageType: 'image/png,image/gif,image/jpeg,image/jpg,image/tiff',
      details: {
        name: '',
        nickname: '',
        email: '',
        about: '',
        avatar: '',
        location: '',
        isUpdated: false
      }
    }
  },

  // mounted() {
  //   axios.get('http://127.0.0.1:8000/api/details').then((response) => {
  //     this.details.name = response.data;
  //   });
  // },

  methods: {
    update () {
      this.isUpdated = true
      this.details.email = ''
    },

    upload(e) {
      let image = e.target.files[0]
      let formData = new FormData()

      formData.append('image', image);
      formData.append('strategy', 'avatar');
      axios.post('http://127.0.0.1:8000/file/upload', formData, {
        src: this.$props.src
      })
        .then((response) => {
          console.log(response);
          // this.cropImage = response.data

          // this.dialogVisible = true
        })
        .catch((error) => {
          console.log(error)
        })
    },
    // succeed() {
    //   this.dialogVisible = true

    //   window.location = '/home';
    // },
  },
}
</script>

<style lang="scss" scoped>

</style>
