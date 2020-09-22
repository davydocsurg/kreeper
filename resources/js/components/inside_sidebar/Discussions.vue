<template>
  <div id="messages" class="tab-pane fade active show">
    <div class="search">
      <form class="form-inline position-relative">
        <input type="search" class="form-control" id="conversations" placeholder="Search for conversations...">
        <button type="button" class="btn btn-link loop"><i class="material-icons">search</i></button>
      </form>
      <button class="btn create" data-toggle="modal" data-target="#startnewchat"><i class="material-icons">create</i></button>
    </div>
    <div class="list-group sort">
      <button class="btn filterDiscussionsBtn active show" data-toggle="list" data-filter="all">All</button>
      <button class="btn filterDiscussionsBtn" data-toggle="list" data-filter="read">Read</button>
      <button class="btn filterDiscussionsBtn" data-toggle="list" data-filter="unread">Unread</button>
    </div>

    <div class="discussions">
      <h1>Chats</h1>
      <div class="list-group" id="chats" role="tablist">
        <a href="#list-chat" v-for="user in sortedUsers" :key="user.id" class="filterDiscussions all unread single active" id="list-chat-list" data-toggle="list" role="tab" @click="selectUser(user)" :class="{ 'selected': user == selected }">
          <img class="avatar-md" :src="user.avatar" data-toggle="tooltip" data-placement="top" title="" alt="user.name">
          <div class="status" >
            <i class="material-icons" :class="(ActiveUsers.find(ActiveUser=>ActiveUser.id===user.id))? 'online' : 'offline'">fiber_manual_record</i>
          </div>
          <div class="new bg-yellow" v-if="user.unread"> <!-- v-if="user.unread" -->
            <span class="pending">{{ user.unread }}</span> <!-- {{user.unread}} -->
          </div>
          <div class="data">
            <h5>{{ user.name }}</h5>
            <!-- <p>{{ user.email }}</p> -->
            <!-- <span>Mon</span> -->
            <!-- <p>A new feature has been updated to your account. Check it out...</p> -->
          </div>
        </a>
        <!-- <a href="#list-empty" class="filterDiscussions all unread single" id="list-empty-list" data-toggle="list" role="tab">
          <img class="avatar-md" src="dist/img/avatars/avatar-male-1.jpg" data-toggle="tooltip" data-placement="top" title="Michael" alt="avatar">
          <div class="status">
            <i class="material-icons offline">fiber_manual_record</i>
          </div>
          <div class="new bg-pink">
            <span>+10</span>
          </div>
          <div class="data">
            <h5>Michael Knudsen</h5>
            <span>Sun</span>
            <p>How can i improve my chances of getting a deposit?</p>
          </div>
        </a>
        <a href="#list-chat" class="filterDiscussions all read single" id="list-chat-list2" data-toggle="list" role="tab">
          <img class="avatar-md" src="dist/img/avatars/avatar-female-2.jpg" data-toggle="tooltip" data-placement="top" title="Lean" alt="avatar">
          <div class="status">
            <i class="material-icons offline">fiber_manual_record</i>
          </div>
          <div class="data">
            <h5>Lean Avent</h5>
            <span>Tus</span>
            <p>Hey Chris, could i ask you to help me out with variation...</p>
          </div>
        </a> -->
        <!-- <a href="#list-empty" class="filterDiscussions all read single" id="list-empty-list2" data-toggle="list" role="tab">
          <img class="avatar-md" src="dist/img/avatars/avatar-male-2.jpg" data-toggle="tooltip" data-placement="top" title="Mariette" alt="avatar">
          <div class="status">
            <i class="material-icons offline">fiber_manual_record</i>
          </div>
          <div class="data">
            <h5>Mariette Toles</h5>
            <span>5 mins</span>
            <p>By injected humour, or randomised words which...</p>
          </div>
        </a> -->
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
// import _ from 'lodash'

export default {
  props: {
    users: {
      type: Array,
      default: []
    },
    ActiveUsers: {
      type: Array,
      default: []
    },
  },

  data() {
    return {
      // users: [],
      selected: this.users.length ? this.users[0] : null
    }
  },



  methods: {
    selectUser(user) {
      this.selected = user

      this.$emit('selected', user)


    }
  },

  computed: {
   sortedUsers() {
     return _.sortBy(this.users, [(user) => {
       if (user == this.selected) {
         return Infinity
       }

       return user.unread
     }]).reverse()
   }
  }
}
</script>
