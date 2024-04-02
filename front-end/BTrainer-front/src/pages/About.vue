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
            voteAlertVisible: false,
            messageAlertVisible: false,
            reviewAlertVisible: false,

            // Votes
            votes: [],
            vote: null,
            mediaVotes: 0,

            nameSurname: "",
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

            store.mediaVotes = Math.ceil((tempTot / votes.length) * 10) / 10;
        },

        createNewReview() {
            // if (this.selectedStar === -1) {
            //     alert("Seleziona un voto");
            //     return;
            // }
            // this.newReview.vote = this.selectedStar + 1;

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
                    this.reviewAlertVisible = true;
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
                    this.messageAlertVisible = true;
                })
                .catch((error) => {
                    console.error(
                        "Si è verificato un errore durante la creazione della messaggio:",
                        error
                    );
                });
        },

        createNewVote() {
            if (this.selectedStar === -1) {
                alert("Seleziona un voto");
                return;
            }
            const vote = this.selectedStar + 1;

            axios
                .post("http://127.0.0.1:8000/api/v1/rate", {
                    vote: vote,
                    id: this.$route.params.id,
                })
                .then((response) => {
                    console.log("Voto creato con successo:", response.data);
                    this.voteAlertVisible = true;
                })
                .catch((error) => {
                    console.error(
                        "Si è verificato un errore durante la creazione del Voto:",
                        error
                    );
                });
        },
    },

    props: ["profileId"], // Ricevi l'ID del profilo come prop
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
                            <img
                                v-if="profile"
                                :src="
                                    getImagePath(
                                        `../assets/trainers/${profile.profile.photo}`
                                    )
                                "
                                :alt="profile.name + ' ' + profile.surname"
                            />
                        </div>

                        <div class="info">
                            <div class="caption" v-if="profile">
                                <!-- NOME COGNOME SPEC -->
                                <div class="name">
                                    <h2>
                                        {{ profile.name }} {{ profile.surname }}
                                    </h2>
                                </div>
                                <div
                                    v-for="specialization in profile.profile
                                        .specializations"
                                    :key="specialization"
                                    class="specializations"
                                >
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
                            <div class="description">
                                <p>"{{ profile.profile.plan_program }}"</p>
                            </div>

                            <div class="votes-reviews">
                                <div class="votes">
                                    Numero voti ricevuti:
                                    {{ profile.profile.votes.length }}
                                    <br />
                                    Media voti: {{ store.mediaVotes }} ({{
                                        profile.profile.reviews.length
                                    }}
                                    Totali)
                                </div>

                                <div
                                    v-for="review in profile.profile.reviews"
                                    class="review-list"
                                >
                                    <div class="content">
                                        {{ review.content }}
                                    </div>
                                    <div class="surname-name">
                                        {{ review.surname }} {{ review.name }}
                                    </div>
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
                                    <input
                                        v-model="newReview.name"
                                        type="text"
                                        required
                                        placeholder="Nome"
                                    />
                                </div>
                                <div class="surname">
                                    <input
                                        v-model="newReview.surname"
                                        type="text"
                                        required
                                        placeholder="Cognome"
                                    />
                                </div>
                                <div class="content">
                                    <textarea
                                        v-model="newReview.content"
                                        type="text"
                                        required
                                        rows="5"
                                    ></textarea>
                                </div>
                                <button type="submit">
                                    <h4>INVIA</h4>
                                </button>
                            </form>
                            <v-alert
                                v-if="reviewAlertVisible"
                                type="success"
                                outlined
                            >
                                <h1>Recensione inviata con successo!</h1>
                            </v-alert>
                        </div>

                        <!-- Messaggio -->
                        <div class="message">
                            <h3 id="title-form">Invia un messaggio:</h3>
                            <form @submit.prevent="createNewMessage">
                                <div class="name">
                                    <input
                                        v-model="newMessage.name"
                                        type="text"
                                        required
                                        placeholder="Nome"
                                    />
                                </div>
                                <div class="surname">
                                    <input
                                        v-model="newMessage.surname"
                                        type="text"
                                        required
                                        placeholder="Cognome"
                                    />
                                </div>
                                <div class="email">
                                    <input
                                        v-model="newMessage.email"
                                        type="email"
                                        required
                                        placeholder="E-Mail"
                                    />
                                </div>
                                <div class="content">
                                    <textarea
                                        v-model="newMessage.content"
                                        type="text"
                                        required
                                        rows="5"
                                    ></textarea>
                                </div>
                                <button type="submit">
                                    <h4>INVIA</h4>
                                </button>
                            </form>
                            <v-alert
                                v-if="messageAlertVisible"
                                type="success"
                                outlined
                            >
                                <h1>Messaggio inviato con successo!</h1>
                            </v-alert>
                        </div>
                        <div class="vote">
                            <h3 id="title-form">Invia un voto:</h3>
                            <form @submit.prevent="createNewVote">
                                <div class="vote-star">
                                    <div
                                        v-for="(star, index) in stars"
                                        :key="index"
                                        class="icon-container"
                                        @click="selectStar(index)"
                                    >
                                        <i
                                            class="fas fa-star"
                                            :class="{
                                                active: index <= selectedStar,
                                            }"
                                        ></i>
                                    </div>
                                </div>
                                <button type="submit">
                                    <h4>INVIA</h4>
                                </button>
                            </form>
                            <v-alert
                                v-if="voteAlertVisible"
                                type="success"
                                outlined
                            >
                                <h1>Voto inviato con successo!</h1>
                            </v-alert>
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
    color: black;
    font-size: 3rem;
    text-align: center;
}

h3 {
    color: black;
    font-size: 2rem;
    text-align: center;
    margin: 1rem 0;
}

#title-form {
    color: $yellow;
    text-align: start;
}

button {
    margin-top: 1rem;
    padding: 0.5rem 0.85rem;
    border-radius: 0;
    border: 0.1px solid $lightgrey;
    background-color: $grey;
    color: $yellow;

    &:hover {
        cursor: pointer;
    }
}

p {
    font-size: 1.2rem;
}

form > div {
    margin-top: 0.5rem;
}

#trainer-gallery {
    width: 100%;
    min-height: calc(100vh - 300px);
    // background-image: url(../assets/Lightgrey-Wallpaper.webp);
    // background-size: cover;
    background-color: #eeebeb;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 2000 1500'%3E%3Cdefs%3E%3Crect stroke='%23EEEBEB' stroke-width='0.1' width='1' height='1' id='s'/%3E%3Cpattern id='a' width='3' height='3' patternUnits='userSpaceOnUse' patternTransform='scale(20.4) translate(-950.98 -713.24)'%3E%3Cuse fill='%23ece9e9' href='%23s' y='2'/%3E%3Cuse fill='%23ece9e9' href='%23s' x='1' y='2'/%3E%3Cuse fill='%23e9e6e6' href='%23s' x='2' y='2'/%3E%3Cuse fill='%23e9e6e6' href='%23s'/%3E%3Cuse fill='%23e7e4e4' href='%23s' x='2'/%3E%3Cuse fill='%23e7e4e4' href='%23s' x='1' y='1'/%3E%3C/pattern%3E%3Cpattern id='b' width='7' height='11' patternUnits='userSpaceOnUse' patternTransform='scale(20.4) translate(-950.98 -713.24)'%3E%3Cg fill='%23e4e1e1'%3E%3Cuse href='%23s'/%3E%3Cuse href='%23s' y='5' /%3E%3Cuse href='%23s' x='1' y='10'/%3E%3Cuse href='%23s' x='2' y='1'/%3E%3Cuse href='%23s' x='2' y='4'/%3E%3Cuse href='%23s' x='3' y='8'/%3E%3Cuse href='%23s' x='4' y='3'/%3E%3Cuse href='%23s' x='4' y='7'/%3E%3Cuse href='%23s' x='5' y='2'/%3E%3Cuse href='%23s' x='5' y='6'/%3E%3Cuse href='%23s' x='6' y='9'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='h' width='5' height='13' patternUnits='userSpaceOnUse' patternTransform='scale(20.4) translate(-950.98 -713.24)'%3E%3Cg fill='%23e4e1e1'%3E%3Cuse href='%23s' y='5'/%3E%3Cuse href='%23s' y='8'/%3E%3Cuse href='%23s' x='1' y='1'/%3E%3Cuse href='%23s' x='1' y='9'/%3E%3Cuse href='%23s' x='1' y='12'/%3E%3Cuse href='%23s' x='2'/%3E%3Cuse href='%23s' x='2' y='4'/%3E%3Cuse href='%23s' x='3' y='2'/%3E%3Cuse href='%23s' x='3' y='6'/%3E%3Cuse href='%23s' x='3' y='11'/%3E%3Cuse href='%23s' x='4' y='3'/%3E%3Cuse href='%23s' x='4' y='7'/%3E%3Cuse href='%23s' x='4' y='10'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='c' width='17' height='13' patternUnits='userSpaceOnUse' patternTransform='scale(20.4) translate(-950.98 -713.24)'%3E%3Cg fill='%23e2dfdf'%3E%3Cuse href='%23s' y='11'/%3E%3Cuse href='%23s' x='2' y='9'/%3E%3Cuse href='%23s' x='5' y='12'/%3E%3Cuse href='%23s' x='9' y='4'/%3E%3Cuse href='%23s' x='12' y='1'/%3E%3Cuse href='%23s' x='16' y='6'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='d' width='19' height='17' patternUnits='userSpaceOnUse' patternTransform='scale(20.4) translate(-950.98 -713.24)'%3E%3Cg fill='%23EEEBEB'%3E%3Cuse href='%23s' y='9'/%3E%3Cuse href='%23s' x='16' y='5'/%3E%3Cuse href='%23s' x='14' y='2'/%3E%3Cuse href='%23s' x='11' y='11'/%3E%3Cuse href='%23s' x='6' y='14'/%3E%3C/g%3E%3Cg fill='%23dfdcdc'%3E%3Cuse href='%23s' x='3' y='13'/%3E%3Cuse href='%23s' x='9' y='7'/%3E%3Cuse href='%23s' x='13' y='10'/%3E%3Cuse href='%23s' x='15' y='4'/%3E%3Cuse href='%23s' x='18' y='1'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='e' width='47' height='53' patternUnits='userSpaceOnUse' patternTransform='scale(20.4) translate(-950.98 -713.24)'%3E%3Cg fill='%23FFCC00'%3E%3Cuse href='%23s' x='2' y='5'/%3E%3Cuse href='%23s' x='16' y='38'/%3E%3Cuse href='%23s' x='46' y='42'/%3E%3Cuse href='%23s' x='29' y='20'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='f' width='59' height='71' patternUnits='userSpaceOnUse' patternTransform='scale(20.4) translate(-950.98 -713.24)'%3E%3Cg fill='%23FFCC00'%3E%3Cuse href='%23s' x='33' y='13'/%3E%3Cuse href='%23s' x='27' y='54'/%3E%3Cuse href='%23s' x='55' y='55'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='g' width='139' height='97' patternUnits='userSpaceOnUse' patternTransform='scale(20.4) translate(-950.98 -713.24)'%3E%3Cg fill='%23FFCC00'%3E%3Cuse href='%23s' x='11' y='8'/%3E%3Cuse href='%23s' x='51' y='13'/%3E%3Cuse href='%23s' x='17' y='73'/%3E%3Cuse href='%23s' x='99' y='57'/%3E%3C/g%3E%3C/pattern%3E%3C/defs%3E%3Crect fill='url(%23a)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23b)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23h)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23c)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23d)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23e)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23f)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23g)' width='100%25' height='100%25'/%3E%3C/svg%3E");
    background-attachment: fixed;
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
                width: calc(75% - 2rem);
                height: 100%;
                border: 3px solid darkgray;

                .img-card {
                    flex-basis: 25%;

                    img {
                        height: 500px;
                        min-width: 300px;
                        object-fit: cover;
                        object-position: top;
                    }
                }
            }

            .form-container {
                width: 100%;
                padding: 0 3rem;

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
                    opacity: 0.7;
                }

                .vote-star {
                    display: flex;

                    .fa-star {
                        color: grey;
                    }

                    .active {
                        color: $yellow;
                    }
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
            background-color: $grey;
            opacity: 0.8;
            padding: 10px;

            .description p {
                color: black;
                font-weight: bold;
                padding: 10px;
            }

            .votes-reviews {
                color: black;
                font-weight: bold;
                font-size: 1.1rem;
                margin-top: 1rem;
                padding: 10px;

                .votes {
                    margin-bottom: 2rem;
                }

                .review-list {
                    // font-size: 1.1rem;
                    margin: 1rem 0;
                }
            }
        }
    }
}

@media screen and (max-width: 1200px) {
    #trainer-gallery {
        .container {
            .col-gallery {
                .form-container {
                    width: 100%;
                    padding: 0 3rem;

                    .review,
                    .message,
                    .vote {
                        margin-bottom: 1rem;
                        padding: 1rem 3rem;
                    }
                }
            }
        }
    }
}

@media screen and (max-width: 992px) {
    #trainer-gallery {
        .container {
            .col-gallery {
                padding: 2rem 1rem;
                flex-direction: column;

                .card-trainer {
                    width: calc(90% - 2rem);
                    margin: 0 auto 3rem;

                    .caption {
                        .social {
                            i {
                                font-size: 1.75rem;
                            }
                        }
                    }

                    .description p {
                        color: black;
                        font-weight: bold;
                        font-size: 1.5rem;
                        padding: 10px;
                    }

                    .votes-reviews {
                        color: black;
                        font-weight: bold;
                        font-size: 1.35rem;
                        margin-top: 1rem;
                        padding: 10px;

                        .votes {
                            margin-bottom: 2rem;
                        }

                        .review-list {
                            // font-size: 1.1rem;
                            margin: 1rem 0;
                        }
                    }
                }

                .form-container {
                    width: calc(90% - 2rem);
                    margin: 0 auto;
                    padding: 0;

                    .review,
                    .message,
                    .vote {
                        margin-bottom: 1rem;
                        padding: 1rem;
                    }
                }
            }
        }
    }
}

@media screen and (max-width: 768px) {
    #trainer-gallery {
        h2 {
            font-size: 2.5rem;
        }

        h3 {
            font-size: 1.75rem;
            margin: 0.5rem 0;
        }

        p {
            font-size: 1rem;
        }

        .container {
            .col-gallery {
                padding: 2rem 0.5rem;

                .form-container {
                    width: 100%;
                    padding: 0 1rem;

                    .review,
                    .message,
                    .vote {
                        margin-bottom: 1rem;
                        padding: 1rem 1.25rem;
                    }
                }

                .info {
                    .votes-reviews {
                        font-size: 1rem;
                        margin-top: 0.75rem;
                    }
                }
            }
        }
    }
}

@media screen and (max-width: 700px) {
    #trainer-gallery {
        h2 {
            font-size: 2rem;
        }

        h3 {
            font-size: 1.25rem;
            margin: 0.35rem 0;
        }

        p {
            font-size: 1rem;
        }

        .container {
            .col-gallery {
                padding: 2rem 0;
                flex-direction: column;

                .card-trainer {
                    width: calc(100% - 2rem);
                    margin: 0 auto;

                    .img-card {
                        img {
                            object-position: top;
                        }
                    }

                    .description p {
                        color: black;
                        font-weight: bold;
                        font-size: 1.25rem;
                        padding: 10px;
                    }

                    .votes-reviews {
                        color: black;
                        font-weight: bold;
                        font-size: 1.15rem;
                        margin-top: 1rem;
                        padding: 10px;

                        .votes {
                            margin-bottom: 2rem;
                        }

                        .review-list {
                            // font-size: 1.1rem;
                            margin: 1rem 0;
                        }
                    }
                }

                .form-container {
                    width: 100%;
                    padding: 1rem;

                    .review,
                    .message,
                    .vote {
                        margin-bottom: 1rem;
                        padding: 0.5rem;
                    }
                }
            }
        }
    }
}
</style>
