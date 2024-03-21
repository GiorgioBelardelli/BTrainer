<script>
import axios from "axios";
import { store } from '../store';
import { forEach } from "lodash";

export default {
    name: "About",
    data() {
        return {
            store,
            profile: null,
            message: "",
            rece: "",
            votes: [],
            vote: null,
            mediaVotes: 0,
            nameSurname: "",
            // index: -1,
            selectedStar: -1, // Nessuna stella selezionata inizialmente
            stars: [1, 2, 3, 4, 5]
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


    methods: {
        getImagePath: function (imgPath) {
            return new URL(imgPath, import.meta.url).href;
        },

        // Metodo di validazione dei msg

        handleSubmitMsg() {
            // Convalida dei dati del form
            if (this.message.trim() === "") {
                // Mostra un messaggio di errore se il campo del messaggio è vuoto
                alert("Il campo del messaggio non può essere vuoto.");
            } else {
                console.log("Il messaggio che hai inviato è: " + this.message);
            }
            return;
        },

        // Metodo di validazione delle recensioni

        // C?E DA INSERIRE NOME E COGNOME 

        handleSubmitRece() {
            // Convalida dei dati del form
            if (this.rece.trim() === '') {
                alert('La recensione non può essere vuota.');
            } else if (this.nameSurname.trim() === '') {
                alert('Non puoi lasciare una recensione anonima');
            } else if (this.nameSurname.trim().length < 30) {
                alert('Il tuo nome e cognome devono essere almeno di 30 caratteri.');
            } else {
                // Chiamata Axios in post
                // axios.post(...)
                console.log("La recensione che hai inserito è: " + this.rece)
            }
            return;
        },

        handleSubmitVote() {
            // Convalida dei dati del div.vote
            if (this.selectedStar === -1) {
                // Se l'utente non ha selezionato nemmeno una stellina: 
                alert('Seleziona un voto');
            } else {
                this.vote = this.selectedStar + 1;
                console.log("Il voto che hai inserito è:" + this.vote);
            }
            return;
        },

        // Questo metodo Imposta selectedStar come l'indice dell'icona stella cliccata
        selectStar(index) {
            this.selectedStar = index;
        },

        getMediaVoti: function () {
            const votes = this.profile.profile.votes;
            let tempTot = 0;
            votes.forEach((vote) => {
                console.log(vote.value);
                tempTot += vote.value;
            });
            console.log(tempTot);

            store.mediaVotes = tempTot / votes.length;
        },




        // Questo metodo resetta la selezione delle stelline del voto se
        // si clicca col mouse al di fuori di una stellina
        handleOutsideClick(event) {
            // Controlla se l'evento di clic è avvenuto all'interno del componente
            if (!this.$el.contains(event.target)) {
                // L'utente ha cliccato fuori dall'area delle stelle, reimposta selectedStar
                this.selectedStar = -1;
            }
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
                        <img v-if="profile" :src="getImagePath(
                            `../assets/trainers/${profile.profile.photo}`
                        )
                            " :alt="profile.name + ' ' + profile.surname" />
                        <div class="caption" v-if="profile">
                            <div class="name">
                                <b>{{ profile.name }} {{ profile.surname }}</b>
                            </div>
                            <div v-for="specialization in profile.profile
                            .specializations" :key="specialization" class="specializations">
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
                                    <p>Media voti: {{ store.mediaVotes }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <form @submit.prevent="handleSubmitMsg"> -->

    <!-- Qui l'utente invia il messaggio  -->
    <form @submit.prevent="handleSubmitMsg">
        <!-- Qui l'utente invia il messaggio  -->
        <div class="msg">
            <input type="text" name="message" id="message" v-model="message" placeholder="Invia un messaggio" />
            <button type="submit ">Invia Messaggio</button>
        </div>
    </form>

    <!-- Qui l'utente inserisce una recensione -->

    <form @submit.prevent="handleSubmitRece">
        <div class="rece">
            <input type="text" name="nameSurname" id="nameSurname" v-model="nameSurname"
                placeholder="Inserisci Nome e Cognome" />

            <input type="text" name="rece" id="rece" v-model="rece"
                placeholder="Lascia una recensione su questo Personal Trainer" />
            <button type="submit">Invia Recensione</button>
        </div>
    </form>

    <!-- Qui l'utente inserisce un voto al PTrainer -->

    <div class="vote-container">
        <div class="vote">
            <div v-for="(star, index) in stars" :key="index" class="icon-container" @click="selectStar(index)">
                <i class="fas fa-star" :class="{ 'active': index <= selectedStar }"></i>
            </div>
        </div>
        <button id="vote-button" @click.prevent="handleSubmitVote">Invia Voto</button>

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
    min-height: calc(100vh - 300px);
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

.vote {
    display: flex;
    width: 200px;
    justify-content: space-between;
    align-items: center;

    .icon-star {
        color: black;
    }

    .icon-star {
        color: grey;
    }

    .active {
        color: rgba(255, 255, 0, 0.692);
        /* Colore giallo quando attiva */
    }
}

#vote-button {
    padding: 8px;
}
</style>
