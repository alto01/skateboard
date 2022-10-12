import './bootstrap'
import Vue from 'vue'
import PostLike from './components/PostLike'
import FollowButton from './components/FollowButton'

const app = new Vue({
  el: '#app',
  components: {
    PostLike,
    FollowButton,
  }
})