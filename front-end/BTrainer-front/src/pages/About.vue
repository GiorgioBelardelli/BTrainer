<script>

import axios from "axios";
import { forEach } from "lodash";

export default {
    name: "About",
    data() {
        return {
            profile: null,
            message:'',
            rece:'',
            votes: [],
            mediaVotes: 0,
        };
    },
    created() {
        // Ottieni l'ID del profilo dalla route
        const profileId = this.$route.params.id;

        // Ottieni i dettagli del profilo utilizzando l'ID
        axios.get(`http://localhost:8000/api/v1/all`).then((res) => {
            const data = res.data;
            if (data.status === "success") {
                // Trova il profilo dell'utente con l'ID corrispondente
                const userProfile = data.data.find(
                    (profile) => profile.id === parseInt(profileId)
                );
                if (userProfile) {
                    // Ordina le recensioni dalla più recente alla più vecchia
                    userProfile.profile.reviews.sort(
                        (a, b) => new Date(b.date) - new Date(a.date)
                    );
                    this.profile = userProfile;
                    // console.log("Dettagli del profilo:", this.profile);
                } else {
                    console.log("Nessun profilo trovato con l'ID:", profileId);
                }
            }
            this.getMediaVoti();
        });
    },
    // mounted() {
    // },

    methods: {
        getImagePath: function (imgPath) {
            return new URL(imgPath, import.meta.url).href;
        },

        handleSubmit() {
        // Convalida dei dati del form
        if (this.message.trim() === '') {

            // Mostra un messaggio di errore se il campo del messaggio è vuoto

            alert('Il campo del messaggio non può essere vuoto.');

        // else...chiamata axios in post

            return;
        }
        },

    }};


        getMediaVoti: function () {
            const votes = this.profile.profile.votes;
            let tempTot = 0;
            votes.forEach(vote => {
                console.log(vote.value);
                tempTot += vote.value;
            });
            console.log(tempTot);

            this.mediaVotes =  tempTot / votes.length;
        },
    },
};
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
                            :src="
                                getImagePath(
                                    `../assets/trainers/${profile.profile.photo}`
                                )
                            "
                            :alt="profile.name + ' ' + profile.surname"
                        />
                        <div class="caption" v-if="profile">
                            <div class="name">
                                <b>{{ profile.name }} {{ profile.surname }}</b>
                            </div>
                            <div
                                v-for="specialization in profile.profile
                                    .specializations"
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
                                <p>{{ profile.profile.plan_program }}</p>
                            </div>
                            <div class="reviews">
                                <h1>
                                    Recensioni:
                                    {{ profile.profile.reviews.length }}
                                </h1>
                            </div>

                            <div class="votes">
                                <h1>Voti Ricevuti:</h1>
                                <div>
                                    <p>Media voti: {{ mediaVotes }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form @submit.prevent="handleSubmit">
        <!-- Qui l'utente invia il messaggio  -->
        <div class="msg">
            <input
                type="text"
                name="message"
                id="message"
                v-model="message"
                placeholder="Invia un messaggio"
            />
            <button type="submit">Invia Messaggio</button>
            <div>prova:{{ message }}</div>
        </div>

        <!-- Qui l'utente inserisce una recensione -->

        <div class="rece">
            <input
                type="text"
                name="rece"
                id="rece"
                v-model="rece"
                placeholder="Lascia una recensione su questo Personal Trainer"
            />
            <button type="submit">Invia Recensione</button>
        </div>
    </form>
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
                margin: 0.5rem 0;
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

form {
    width: 80%;
    margin: auto;

    #message,
    #rece {
        width: 30%;
        min-height: 50px;
        border: 1px solid black;
        border-radius: 15px;
        margin-bottom: 20px;
        margin-right: 20px;
    }
    button {
        padding: 8px;
    }
    input::placeholder {
        margin: auto;
    }
}
</style>
