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
  <div class="collapse" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionSettings" v-for="authUser in authUsers" :key="authUser.id">
    <div class="content mb-4">
      <div class="upload card shadow-sm p-3 mb-4 mt-4">
        <div class="data d-flex">
          <img class="avatar-xl" :src="authUser.avatar" alt="authUser.name">
          <!-- <img src="avatarImage" class="avatar-xl"> -->
          <label>
            <input v-model="avatarImage" name="avatar-xl" class="btn button" >
            <span>Modify avatar</span>
          </label>

          <!-- <img :src="src" class="avatar">
          <a href="javascript:;" class="btn btn-success file">
            <span>{{ $t('form.modify_avatar') }}</span>
            <input type="file" name="avatar" :accept="imageType" @change="uploadAvatar">
          </a>
          <modal :show="dialogVisible" @cancel="dialogVisible = false">
            <div slot="title">{{ $t('form.crop_avatar') }}</div>
            <cropper :image="cropImage" @canceled="dialogVisible = false" @succeed="succeed"></cropper>
          </modal> -->
        </div>
        <br>
        <p>For best results, use an image at least 256px by 256px in either .jpg or .png format!</p>
        <hr>
        <br><br>
        <form>
          <!-- <div class="parent">
            <div class="field">
              <label for="firstName" class="text-dark dd"> Name <span class="asts">*</span></label>
              <input type="text" class="form-control" id="name" v-model="details.name" placeholder="Enter a new name"  required>
            </div>
            <div class="field pl-2">
              <label for="lastName" class="text-dark dd">Last name <span class="asts">*</span></label>
              <input type="text" class="form-control" id="lastName" v-model="details.lastName" placeholder="Last name" value="Knudsen" required>
            </div>
          </div> -->
          <br>
          <div class="field">
            <label for="avatar" class="text-dark dd">Profile Pics</label>
            <div class="col-sm-12">
                <input type="file" @change="updateProfilePics" name="photo" class="form-control">
            </div>

          </div>

          <div class="field">
            <label for="email" class="text-dark dd">Email <span class="asts">*</span></label>
            <input type="email" class="form-control" id="email" v-model="form.email" placeholder="Enter your email address"
             :class="{ 'is-invalid': form.errors.has('email') }">
            <has-error :form="form" field="email"></has-error>
          </div>
          <br>
          <div class="field">
            <label for="text" class="text-dark dd">Nickname</label>
            <input type="text" class="form-control" id="nickname" v-model="form.nickname" placeholder="Enter a new nickname"
             :class="{ 'is-invalid': form.errors.has('nickname') }">
            <has-error :form="form" field="about"></has-error>
          </div>
          <br>
          <div class="field">
            <label for="text" class="text-dark dd">About</label>
            <input type="text" class="form-control" id="about" v-model="form.bio" placeholder="Enter a new biography"
             :class="{ 'is-invalid': form.errors.has('about') }">
            <has-error :form="form" field="about"></has-error>
          </div>
          <br>
          <div class="field">
            <label for="location" class="text-dark dd">Location</label>
            <input type="text" class="form-control" id="location" v-model="form.location" placeholder="Enter your location"
            :class="{ 'is-invalid': form.errors.has('location') }">
            <has-error :form="form" field="about"></has-error>
          </div>
          <br>
          <div class="field">
            <label for="website" class="text-dark dd">Website</label>
            <input type="text" class="form-control" id="website" v-model="form.website" placeholder="Enter your website"
             :class="{ 'is-invalid': form.errors.has('website') }">
            <has-error :form="form" field="website"></has-error>
          </div>
          <!-- <button class="btn btn-link text-danger w-100">Delete Account</button> -->
          <!-- <button class="btn btn-primary w-100" @click.prevent="submitted">Apply</button> -->

          <button class="btn btn-outline-success button w-100">Update Profile</button>
        </form>

      </div>
    </div>
  </div>
</div>
</template>

<script>
import axios from 'axios'
// import Cropper from '../utils/Cropper.vue'
// import Modal from '../utils/Modal.vue'

export default {
  components: {
    // Cropper,
    // Modal
  },

  data() {
    return {
      // users: [],
      authUsers: [],
      form: new Form({
        id:'',
        website : '',
        location: '',
        password: '',
        nickname: '',
        about: '',
        avatar: ''
      })
    }
  },

  mounted() {
    const url = window.location.origin+'/auth/user'
    axios.get(url)
    .then(response => this.authUsers = response.data)
    .catch(error => {
      console.log(error)
    })

  },

  methods: {
      updateProfilePics(e) {
        // console.log('uploads');
        let file = e.target.files[0]
        let reader = new FileReader()
        if (file['size'] < 2111775) {
          reader.onloadend = (file) => {
            this.form.avatar = reader.result
            // console.log('RESULT', reader.result);
          }
          reader.readAsDataURL(file)
          }else {
            swal({
              type: error,
              title: 'Oops...',
              text: 'File must be less than 2MB'
            })

        }
      }
    }

  //   uploadAvatar(e) {
  //     let image = e.target.files[0]
  //     let formData = new FormData()

  //     formData.append('image', image)
  //     formData.append('strategy', 'avatar')

  //     this.axios.post('http://127.0.0.1:8000/file/upload', formData)
  //     .then((response) => {
  //       console.log(response)
  //       this.cropImage = response.data
  //       this.dialogVisible = true
  //     })
  //     .catch((error)=> {
  //       console.log(error)
  //     })
  //   },
  //   succeed() {
  //     this.dialogVisible = true

  //     window.location = 'home';
  //   }
  }
</script>

<style lang="scss" scoped>
// .file {
//   position: relative;
//   margin: 0 auto;
//   display: block;
//   width: 100px;
//   height: 30px;
//   line-height: 30px;
//   font-size: 10px;

//   span {
//     display: block;
//     position: absolute;
//     top: 0;
//     left: 0;
//     right: 0;
//   }
//   input {
//     position: absolute;
//     left: 0;
//     right: 0;
//     top: 0;
//     width: 100px;
//     height: 30px;
//     opacity: 0;
//   }
// }
</style>
