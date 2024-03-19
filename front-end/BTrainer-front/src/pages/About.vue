<script>
import axios from "axios";

export default {
    name: "About",
    data() {
        return {
            profile: null
        };
    },
    created() {
        // Ottieni l'ID del profilo dalla route
        const profileId = this.$route.params.id;

        // Ottieni i dettagli del profilo utilizzando l'ID
        axios
    .get(`http://localhost:8000/api/v1/all`)
    .then((res) => {
        const data = res.data;
        if (data.status === "success") {
            // Trova il profilo dell'utente con l'ID corrispondente
            const userProfile = data.data.find(profile => profile.id === parseInt(profileId));
            if (userProfile) {
                this.profile = userProfile;
                console.log("Dettagli del profilo:", this.profile);
            } else {
                console.log("Nessun profilo trovato con l'ID:", profileId);
            }
        }
    })

    },
    methods: {
        getImagePath: function (imgPath) {
            return new URL(imgPath, import.meta.url).href;
        }
    }
}
</script>

<template>
    
    <div id="trainer-gallery">
        <h2>Info Personal Trainer</h2>
        <div class="container">
            <div class="row">
                <div class="col-gallery">
                    <div class="card-trainer">
                        <img
                            v-if="profile"
                            :src="getImagePath(`../assets/trainers/${profile.profile.photo}`)"
                            :alt="profile.name + ' ' + profile.surname"
                        />
                        <div class="caption" v-if="profile">
                            <div class="name">
                                <b>{{ profile.name }} {{ profile.surname }}</b>
                            </div>
                            <div
                                v-for="specialization in profile.profile.specializations"
                                :key="specialization"
                                class="specializations"
                            >
                                {{ specialization }}
                            </div>
                            <div class="social">
                                <i class="fa-brands fa-facebook"></i>
                                <i class="fa-brands fa-instagram"></i>
                                <i class="fa-brands fa-x-twitter"></i>
                                <i class="fa-brands fa-tiktok"></i>
                                <i class="fa-regular fa-envelope"></i>
                            </div>
                            <div class="description">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas quibusdam quaerat error dolores enim. Itaque harum quasi sint, modi deleniti iure velit dolorem maiores, sapiente accusantium ullam enim facilis illum.</p>
                            </div>
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
    padding-top: 120px;

    .container {
        margin: auto;
        width: 80%;

        .col-gallery {
            padding: 1rem;

            .card-trainer {
                display: flex;
                position: relative;
                margin: 1rem 0.5rem 0;
                overflow: hidden;
                width: 75%;

                img {
                    width: 400px;
                    height: 400px;
                    object-fit: cover;
                    object-position: center;
                    transition: filter 1s ease, transform 1s ease;
                    display: block;
                }

                &:hover {
                    cursor: pointer;
                    // img {
                    //     transform: scale(1.1);
                    //     display: block;
                    // }
                }
            }
        }
        .caption {
            margin-left: 2rem;

            .name {
                margin: .5rem 0;
                transition: filter 0.25s ease, transform 0.25s ease;
                // &:hover {
                //     transform: scale(1.25);
                //     cursor: pointer;
                // }
            }

            .title {
                margin: 0.5rem 0;
                transition: filter 0.25s ease, transform 0.25s ease;
                &:hover {
                    transform: scale(1.25);
                    cursor: pointer;
                }
            }

            .social {
                margin: 1rem 0;
            }
        }
    }
}
</style>
