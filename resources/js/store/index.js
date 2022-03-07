import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    users: [],
    messages: [],
    selectedUser: null,
    // typingCalc: false,
    MsgRead: false
  }


})