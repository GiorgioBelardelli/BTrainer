<script>
import axios from "axios";

export default {
    name: "AppTrainerGallery",
    data() {
        return {
            users: [],
            profiles: [],
            specializations: [],
        };
    },

    mounted() {
        axios
            .get("http://localhost:8000/api/v1/profile")
            .then((res) => {
                const data = res.data;
                if (data.status === "success") this.profiles = data.profiles;

                console.log("profiles: ", this.profiles);
            })
            .catch((err) => {
                console.err(err);
            });

        axios
            .get("http://localhost:8000/api/v1/user")
            .then((res) => {
                const data = res.data;
                if (data.status === "success") this.users = data.users;

                console.log("users: ", this.users);
            })
            .catch((err) => {
                console.err(err);
            });

        axios
            .get("http://localhost:8000/api/v1/specialization")
            .then((res) => {
                const data = res.data;
                if (data.status === "success")
                    this.specializations = data.specializations;

                console.log("specializations: ", this.specializations);
            })
            .catch((err) => {
                console.err(err);
            });
    },
};
</script>

<template>
    <h2>SCEGLI IL TUO PERSONAL TRAINER IDEALE</h2>
    <div id="trainer-gallery">
        <div class="container">
            <div class="row">
                <div class="col-gallery">
                    <div class="card-trainer">
                        <img
                            src="../assets/trainers/PTrainer1.png"
                            alt="Trainer"
                        />
                    </div>
                    <div v-for="user in users" :key="user.id" class="caption">
                        <div class="name">
                            {{ user.name }} {{ user.surname }}
                        </div>
                        <!-- <div class="title">
                            Specializzazioni:
                            <span
                                v-for="specialization in user.specializations"
                                :key="specialization.id"
                            >
                                {{ specialization.name }}
                            </span>
                        </div> -->
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
    </div>
</template>

<style lang="scss" scoped>
@use "../styles/partials/variables" as *;

h2 {
    color: $grey;
    font-size: 40px;
    text-align: center;
    margin-top: 25px;
    margin-bottom: 25px;
}

#trainer-gallery {
    width: 100%;
    background-image: url(../assets/Lightgrey-Wallpaper.webp);
    background-size: cover;
    padding-bottom: 50px;

    .container {
        margin: auto;
        width: 80%;

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .col-gallery {
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            width: calc(25%);

            .card-trainer {
                position: relative;
                margin: 1rem 0.5rem;
                overflow: hidden;

                img {
                    width: 100%;
                    transition: filter 1s ease, transform 1s ease;
                    display: block;
                }

                &:hover {
                    cursor: pointer;
                    img {
                        transform: scale(1.1);
                        display: block;
                    }
                }
            }
        }
        .caption {
            text-align: center;

            .name {
                transition: filter 0.25s ease, transform 0.25s ease;
                &:hover {
                    transform: scale(1.25);
                    cursor: pointer;
                }
            }

            .title {
                margin: 0.5rem 0;
                transition: filter 0.25s ease, transform 0.25s ease;
                &:hover {
                    transform: scale(1.25);
                    cursor: pointer;
                }
            }
        }
    }
}
</style>
