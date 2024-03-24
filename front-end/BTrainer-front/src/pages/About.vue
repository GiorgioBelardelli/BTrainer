<script>
import axios from "axios";
import { store } from "../store";
import { forEach } from "lodash";

export default {
    name: "About",
    data() {
        return {
            store,
            profile: null,
            message: "",
            rece: "",
            newVoto: 0,

            // Votes
            votes: [],
            vote: null,
            mediaVotes: 0,

            nameSurname: "",
            // index: -1,
            selectedStar: -1, // Nessuna stella selezionata inizialmente
            stars: [1, 2, 3, 4, 5],

            profiles: [],

            // Review
            reviews: [],
            id: null,
            newReview: {
                name: "",
                surname: "",
                date: "",
                content: "",
                vote: 0,
                profile_id: null,
            },

            // Message
            messages: [],
            id: null,
            newMessage: {
                name: "",
                surname: "",
                date: "",
                content: "",
                email: "",
                profile_id: null,
            },
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

    mounted() {
        // Data Formattata (Invio Recensione / Voto)
        this.newReview.date = this.generateFormattedDate();
        this.newMessage.date = this.generateFormattedDate();

        axios
            .get("http://localhost:8000/api/v1/all")
            .then((res) => {
                const data = res.data;
                if (data.status === "success") this.profiles = data.data;
                // console.log("profili: ", this.profiles);
                for (let i = 0; i < this.profiles.length; i++) {
                    if (this.profiles[i].id === this.profile.id) {
                        this.id = this.profiles[i].id;
                        // console.log('id: ' + this.reviewId);
                        this.newReview.profile_id = this.id;
                        this.newMessage.profile_id = this.id;
                        break;
                    }
                }
            })
            .catch((err) => {
                console.error(err);
            });
    },

    methods: {
        // Data Formattata (ANNO/MM/GG)
        generateFormattedDate() {
            const currentDate = new Date();
            return currentDate.toISOString().split("T")[0];
        },

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

        handleSubmitRece() {
            // Convalida dei dati del form
            if (this.rece.trim() === "") {
                alert("La recensione non può essere vuota.");
            } else if (this.nameSurname.trim() === "") {
                alert("Non puoi lasciare una recensione anonima");
            } else if (this.nameSurname.trim().length < 4) {
                alert(
                    "Il tuo nome e cognome devono essere almeno di 4 caratteri."
                );
            } else {
                // Chiamata Axios in post
                // axios.post(...)
                console.log(
                    this.nameSurname +
                    "ha recensito questo Trainer:" +
                    " '" +
                    this.rece +
                    "'"
                );
            }
            return;
        },

        handleSubmitVote() {
            // Convalida dei dati del div.vote
            if (this.selectedStar === -1) {
                // Se l'utente non ha selezionato nemmeno una stellina:
                alert("Seleziona un voto");
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

        // Questo metodo resetta la selezione delle stelline del voto se
        // si clicca col mouse al di fuori di una stellina
        handleOutsideClick(event) {
            // Controlla se l'evento di clic è avvenuto all'interno del componente
            if (!this.$el.contains(event.target)) {
                // L'utente ha cliccato fuori dall'area delle stelle, reimposta selectedStar
                this.selectedStar = -1;
            }
        },

        getMediaVoti: function () {
            const votes = this.profile.profile.votes;
            let tempTot = 0;
            votes.forEach((vote) => {
                // console.log(vote.value);
                tempTot += vote.value;
            });
            // console.log(tempTot);

            store.mediaVotes = (tempTot / votes.length).toFixed(1);
        },

        createNewReview() {
            axios
                .post("http://127.0.0.1:8000/api/v1/reviews", this.newReview)
                .then((response) => {
                    console.log(
                        "Recensione creata con successo:",
                        response.data
                    );
                    this.newReview.name = "";
                    this.newReview.surname = "";
                    this.newReview.content = "";
                    this.newReview.vote = 0;
                    alert("Recensione creata con successo");
                })
                .catch((error) => {
                    console.error(
                        "Si è verificato un errore durante la creazione della recensione:",
                        error
                    );
                });
        },

        createNewMessage() {
            axios
                .post("http://127.0.0.1:8000/api/v1/messages", this.newMessage)
                .then((response) => {
                    console.log(
                        "Messaggio creato con successo:",
                        response.data
                    );
                    this.newMessage.name = "";
                    this.newMessage.surname = "";
                    this.newMessage.content = "";
                    this.newMessage.email = "";
                    alert("Messaggio inviato con successo");
                })
                .catch((error) => {
                    console.error(
                        "Si è verificato un errore durante la creazione della messaggio:",
                        error
                    );
                });
        },

        createNewVote() {
            //console.log('Il voto è:' + this.newVoto);
            axios
                .post("http://127.0.0.1:8000/api/v1/rate", {
                    "vote": this.newVoto,
                    "id": this.$route.params.id
                })
                .then((response) => {
                    console.log(
                        "Voto creato con successo:",
                        response.data
                    );
                })
                .catch((error) => {
                    console.error(
                        "Si è verificato un errore durante la creazione del Voto:",
                        console.log(this.newVoto)
                    );
                });
        },
    },

    props: ['profileId'], // Ricevi l'ID del profilo come prop
};
</script>

<template>
    <div id="trainer-gallery">
        <div class="container">
            <div class="row">
                <div class="col-gallery">
                    <div class="card-trainer">
                        <!-- Card che contiene l'img -->
                        <div class="img-card">
                            <img v-if="profile" :src="getImagePath(
                                `../assets/trainers/${profile.profile.photo}`
                            )
                                " :alt="profile.name + ' ' + profile.surname" />
                            <div class="caption" v-if="profile">
                                <!-- NOME COGNOME SPEC -->
                                <div class="name">
                                    <h2>{{ profile.name }} {{ profile.surname }}</h2>
                                </div>
                                <div v-for="specialization in profile.profile
                                .specializations" :key="specialization" class="specializations">
                                    <h3>{{ specialization }}</h3>
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

                        <div class="info">
                            <div class="description">
                                <p>"{{ profile.profile.plan_program }}"</p>
                            </div>

                            <div class="votes-reviews">
                                <div>
                                    Media voti: {{ store.mediaVotes }}
                                </div>
                                <div>
                                    Numero recensioni:
                                    {{ profile.profile.reviews.length }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-container">
                        <!-- Recensione  -->
                        <div class="review">
                            <h3 id="title-form">Scrivi una recensione:</h3>
                            <form @submit.prevent="createNewReview">
                                <div class="name">
                                    <input v-model="newReview.name" type="text" required placeholder="Nome" />
                                </div>
                                <div class="surname">
                                    <input v-model="newReview.surname" type="text" required placeholder="Cognome" />
                                </div>
                                <div class="content">
                                    <textarea v-model="newReview.content" type="text" required rows="5"></textarea>
                                </div>
                                <div class="votes">
                                    <input v-model="newReview.vote" type="number" min="1" max="5" required
                                        placeholder="Voto" />
                                </div>
                                <button type="submit">
                                    <h4>INVIA</h4>
                                </button>
                            </form>
                        </div>

                        <!-- Messaggio -->
                        <div class="message">
                            <h3 id="title-form">Invia un messaggio:</h3>
                            <form @submit.prevent="createNewMessage">
                                <div class="name">
                                    <input v-model="newMessage.name" type="text" required placeholder="Nome" />
                                </div>
                                <div class="surname">
                                    <input v-model="newMessage.surname" type="text" required placeholder="Cognome" />
                                </div>
                                <div class="content">
                                    <textarea v-model="newMessage.content" type="text" required rows="5"></textarea>
                                </div>
                                <div class="email">
                                    <input v-model="newMessage.email" type="email" required placeholder="E-Mail" />
                                </div>
                                <button type="submit">
                                    <h4>INVIA</h4>
                                </button>
                            </form>
                        </div>
                        <div class="vote">
                            <form @submit.prevent="createNewVote">
                                <input v-model="newVoto" type="number" min="1" max="5" name="newVoto" id="newVoto">
                                <button type="submit">
                                    <h4>INVIA</h4>
                                </button>
                            </form>
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
    font-size: 3rem;
    text-align: center;
}

h3 {
    color: $grey;
    font-size: 2rem;
    text-align: center;
    margin: 1rem 0;
}

#title-form {
    color: $yellow;
}

button {
    margin-top: 1rem;
    padding: .5rem .85rem;
    border-radius: 0;
    border: .1px solid $lightgrey;
    background-color: $grey;
    color: $yellow;

    &:hover {
        cursor: pointer;
    }
}

p {
    font-size: 1.2rem;
}

form>div {
    margin-top: 0.5rem;
}

#trainer-gallery {
    width: 100%;
    min-height: calc(100vh - 300px);
    background-image: url(../assets/Lightgrey-Wallpaper.webp);
    background-size: cover;
    padding-top: 120px;

    .row {
        margin: auto;
    }

    .container {
        margin: auto;
        width: 100%;

        .col-gallery {
            padding: 2rem;
            display: flex;

            .card-trainer {
                margin: 0 1rem;
                width: calc(50% - 2rem);

                // Parte sinistra con l'immagine nome cognome ecc..
                .img-card {
                    flex-basis: 25%;

                    img {
                        height: 500px;
                        object-fit: cover;
                        object-position: center;
                    }
                }
            }

            .form-container {
                width: 100%;
                padding: 0 6rem;

                input,
                textarea {
                    padding: 1rem;
                    width: 90%;
                    margin: 0 auto;
                    resize: vertical;
                }

                .review,
                .message,
                .vote {
                    width: 100%;
                    margin-bottom: 1rem;
                    padding: 1rem 4rem;
                    background-color: $grey;
                    border: 3px solid darkgray;
                    opacity: .7;
                }
            }
        }

        .caption {
            margin: auto;
            margin-top: 12px;

            .name {
                transition: filter 0.25s ease, transform 0.25s ease;
                text-align: center;
                font-size: 22px;
            }

            .title {
                transition: filter 0.25s ease, transform 0.25s ease;

                &:hover {
                    transform: scale(1.25);
                    cursor: pointer;
                }
            }

            .specializations {
                text-align: center;
            }

            .social {
                margin: 1rem 0;
                text-align: center;
            }

        }

        .info {
            .votes-reviews {
                font-size: 1.2rem;
                margin-top: 1rem;
            }
        }
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
</style>
