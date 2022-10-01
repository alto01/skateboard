<template>
    <div class="container">
        <div class="row justify-content-center mt-1">
            <div class="col-md-12">
                <div>
                    <button>
                        いいね解除
                    </button>
                    <button>
                        いいね
                    </button>
                    <p>いいね数：</p>
                    
                </div>
            </div>
        </div>
    </div>
</template>
<script>
  export default {
      props: ['post'],
      mounted () {
          console.log(this.post);
      },
      methods: {
          favorite() {
              axios.get('/posts/' + this.post.id +'/like')
              .catch(function(error) {
                  console.log(error);
              });
          },
          unfavorite() {
              axios.get('/posts/' + this.post.id +'/unliike')
              .catch(function(error){
                  console.log(error);
              });
          },
          countfavorites() {
                axios.get('/posts/' + this.post.id +'/countfavorites')
                .then(res => {
                    this.count = res.data;
                }).catch(function(error){
                    console.log(error);
                });
            },
      }
   }
</script>