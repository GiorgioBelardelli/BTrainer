<script>

    export default {
      name: "AppTrainerGallery",
    }
</script>

<template>
  <h1>Sono AppTrainerGallery</h1>
  <div class="container">
      <div class="row">
          <div class="col-gallery">
              <div class="card-trainer">

                  <img src="../assets/Trainer 1.png" alt="Trainer">

                  <div class="caption">
                    <div class="name">King Arthur</div>
                    <div class="title">Mundial Fight Champion</div>
                    <div class="social">
                      <i class="fa-brands fa-facebook"></i>
                      <i class="fa-brands fa-instagram"></i>
                      <i class="fa-brands fa-x-twitter"></i>
                      <i class="fa-brands fa-tiktok"></i>
                      <i class="fa-regular fa-envelope"></i>
                    </div>
                  </div>
              </div>
          </div>
          <div class="col-gallery">
              <div class="card-trainer">
                  <img src="../assets/Trainer2.jpeg" alt="Trainer">
              </div>
          </div>
          <div class="col-gallery">
              <div class="card-trainer">
                  <img src="../assets/Trainer 3.jpg" alt="Trainer">
              </div>
          </div>
          <div class="col-gallery">
              <div class="card-trainer">
                  <img src="../assets/Trainer 1.png" alt="Trainer">
              </div>
          </div>
          <div class="col-gallery">
              <div class="card-trainer">
                  <img src="../assets/Trainer2.jpeg" alt="Trainer">
              </div>
          </div>
          <div class="col-gallery">
              <div class="card-trainer">
                  <img src="../assets/Trainer 3.jpg" alt="Trainer">
              </div>
          </div>
      </div>


  </div>

</template>

<style lang="scss" scoped>
    @use '../styles/partials/variables' as *;

    h1 {
        color:$grey
    };
    .container {
      margin: auto;
      width: 80%;

        .row {
          width: 100%;
          display: flex;
          flex-wrap: wrap;
          align-items: center;
          justify-content: space-between;
          margin-top: 50px;
          padding-top: 10px;

          .col-gallery {
            width: calc((100% / 3) - 20px);
            display: flex;
            margin-top: 40px;
          
          img:hover {
            transition: 300ms;
            border-radius: 10px;
            border: 5px solid $grey;
          }

              .card-trainer {
                width: 100%;

                img {
                  width: 100%;
                }
                .caption {
                  margin: auto;
                  text-align: center;
                    .name {
                      font-style: bold;
                      font-size: 20px
                    };
                    .title {
                      font-style:italic;
                      font-size: 15px;
                    };
                    .social {
                      display: flex;
                      justify-content: center;
                      gap: 30px;

                        i {
                          width: 20px;
                          color: $grey;
                        }

                        i:hover {
                          color: $yellow;
                          transform: scale(1.5); 
                        } 
                }

                };
                .caption * {
                  padding-top: 10px;
                }
                .name, .social,.title:hover  {
                  transform: scale(1.2); 
                }
              }
          }
        }
    }
</style>