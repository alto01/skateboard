
<template>
  <div>
  <span>フー{{ followedCount }} </span>
  <span>フォロー{{ followerCount }} </span>
    <span class="float-right">
      <button v-if="!followed" type="button" class="btn-sm shadow-none border border-primary p-2" @click="follow(userId)"><i class="mr-1 fas fa-user-plus"></i>フォロー</button>
      <button  v-else type="button" class="btn-sm shadow-none border border-primary p-2 bg-primary text-white" @click="unfollow(userId)"><i class="mr-1 fas fa-user-check"></i>フォロー中</button>
      
    </span>
   </div> 
</template>

<script>
    export default {
        props:['userId', 'defaultFollowed', 'defaultFollowedCount','defaultFollowerCount'],
        data() {
          return{
              followed: false,
              followedCount: 0,
              followerCount:0,
          };
        },
        created() {
          this.followed = this.defaultFollowed
          this.followedCount = this.defaultFollowedCount
          this.followerCount = this.defaultFollowerCount
        },

        methods: {
          follow(userId) {
            let url = `/users/${userId}/follow`

            axios.post(url)
            .then(response => {
                this.followed = true;
                this.followedCount = response.data.followedCount;
                this.followerCount = response.data.followerCount;
            })
            .catch(error => {
              alert(error)
            });


          },
          unfollow(userId) {
            let url = `/users/${userId}/unfollow`
          
            
            axios.post(url)
            .then(response => {
                this.followed = false;
                this.followedCount = response.data.followedCount;
                this.followerCount = response.data.followerCount;
            })
            .catch(error => {
              alert(error)
            });
          }
        }
    }
</script>
