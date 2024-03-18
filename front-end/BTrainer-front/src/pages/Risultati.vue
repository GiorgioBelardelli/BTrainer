<script>
import Jumbo from '../components/Jumbo.vue'
import AppTrainerGallery from '../components/AppTrainerGallery.vue';
import Specializations from '../components/Specializations.vue';
import AppBmi from '../components/AppBmi.vue';


export default {
  components: {
    Jumbo,
    AppTrainerGallery,
    Specializations,
    AppBmi,
  }
}
</script>

<template>

    <section id="results">
        <div class="container">
            <h1> I tuoi risultati: </h1>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <img src="../assets/trainers/PTrainer3.jpg" alt="img pt Trainer">
                        <div class="name-surname">Ciccio Magrelli</div>
                        <div class="specialization">Calisthenics</div>
                        <p class="program">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quaerat quo quidem adipisci eius unde consequuntur, eos, saepe incidunt tempore cumque nisi culpa autem magnam, officiis facilis soluta corrupti nesciunt ducimus!</p>
                        <div class="e-mail">
                            <i class="fa-regular fa-envelope"></i>
                            ciccio.magrelli@gmail.com
                        </div>
                        <div class="phone">
                            <i class="fa-solid fa-phone"></i>
                            335 353569
                        </div>
                        <div class="social">
                            <i class="fa-brands fa-facebook"></i>
                            <i class="fa-brands fa-instagram"></i>
                            <i class="fa-brands fa-x-twitter"></i>
                            <i class="fa-brands fa-tiktok"></i>
                            <i class="fa-regular fa-envelope"></i>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="../assets/trainers/PTrainer3.jpg" alt="img pt Trainer">
                        <div class="name-surname">Ciccio Magrelli</div>
                        <div class="specialization">Calisthenics</div>
                        <p class="program">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quaerat quo quidem adipisci eius unde consequuntur, eos, saepe incidunt tempore cumque nisi culpa autem magnam, officiis facilis soluta corrupti nesciunt ducimus!</p>
                        <div class="e-mail">
                            <i class="fa-regular fa-envelope"></i>
                            ciccio.magrelli@gmail.com
                        </div>
                        <div class="phone">
                            <i class="fa-solid fa-phone"></i>
                            335 353569
                        </div>
                        <div class="social">
                            <i class="fa-brands fa-facebook"></i>
                            <i class="fa-brands fa-instagram"></i>
                            <i class="fa-brands fa-x-twitter"></i>
                            <i class="fa-brands fa-tiktok"></i>
                            <i class="fa-regular fa-envelope"></i>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="../assets/trainers/PTrainer3.jpg" alt="img pt Trainer">
                        <div class="name-surname">Ciccio Magrelli</div>
                        <div class="specialization">Calisthenics</div>
                        <p class="program">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quaerat quo quidem adipisci eius unde consequuntur, eos, saepe incidunt tempore cumque nisi culpa autem magnam, officiis facilis soluta corrupti nesciunt ducimus!</p>
                        <div class="e-mail">
                            <i class="fa-regular fa-envelope"></i>
                            ciccio.magrelli@gmail.com
                        </div>
                        <div class="phone">
                            <i class="fa-solid fa-phone"></i>
                            335 353569
                        </div>
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
        </div>
    </section>

</template>

<style>

    /* @use '../styles/partials/mixins' as *;
    @use '../styles/partials/variables' as *; */

    section {
        background-color: black;
    }
    h1 {
        font-size: 50px;
        margin: 20px;
        text-align: center;
    }
    .container {
        width: 80%;
        margin: auto;

        .row {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            padding-bottom: 50px;

            .col {
                flex-basis: 30%;
                padding-bottom: 25px;

                .card {
                    padding: 5px;
                    padding-bottom: 25px;
                    text-align: center;
                    color: white;
                .card * {
                    padding-bottom: 5px;
                }
                    img {
                        width: 100%;
                        border: 2px solid black;
                        border-radius: 10px;
                    }
                    img:hover {
                        border: 2 pixel solid black;
                        transform: scale(1.01);
                    }
                    .name-surname ,.specialization ,.program ,.email ,.phone {
                        padding-bottom: 10px;
                    }
                    .name-surname:hover {
                        transform: scale(1.01);
                        color: yellow;
                    }
                    .name-surname { 
                        font-size: 25px;
                     }
                    .specialization {
                        font-style: italic;
                        font-size: 18px;
                    }
                    i {
                        font-size: 15px;
                    }
                }
            }
        }
    }
</style>