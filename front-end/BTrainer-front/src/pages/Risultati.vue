<script>
import axios from "axios";
import { store } from "../store";

export default {
    name: "Risultati",
    data() {
        return {
            store,
            profile: null,
            arrayFilter: [],

            numReview: [],
            votes: [],

            specialization: null,

            voteSelect: 0,
            reviewSelect: 0,

            arrayMediaVoti: [{ idProfile: "", mediaVoti: 0 }],
        };
    },
    created() {
        this.specialization = this.$route.query.specialization;
        this.arrayFilter = store.arrayFilter;
    },

    mounted() {
        axios
            .get("http://localhost:8000/api/v1/votes")
            .then((res) => {
                const data = res.data;
                if (data.status === "success") {
                    this.votes = data.votes;
                    // console.log(this.votes);
                }
            })
            .catch((err) => {
                console.error(err);
            });
    },

    methods: {
        getImagePath: function (imgPath) {
            return new URL(imgPath, import.meta.url).href;
        },

        showDetails(id) {
            // console.log('ID Profilo:', id);
            this.$router.push({
                name: "About",
                params: { id: id },
            });
        },

        filterVote() {
            let filteredArray = [];
            // store.mediaVotes >= this.voteSelect;
            // console.log('array filter: ' + this.arrayFilter[2].profile.votes[0].value);
            for (let i = 0; i < this.arrayFilter.length; i++) {
                let voti = this.arrayFilter[i].profile.votes;
                // console.log('voti: ' + voti.value);
                let tempTot = 0;
                voti.forEach((vote) => {
                    // console.log(vote.value);
                    tempTot += vote.value;
                });
                // console.log(tempTot);
                let mediaVoti = tempTot / voti.length;
                if (mediaVoti >= this.voteSelect) {
                    filteredArray.push(this.arrayFilter[i]);
                }
                console.log("media voti: " + mediaVoti);
            }
            this.arrayFilter = filteredArray;
            console.log("voto select: " + this.voteSelect);
        },

        filterReview() {
            let filteredArray = [];
            console.log("value della select: " + this.reviewSelect);
            if (this.reviewSelect == 1) {
                console.log("sono dentro if value 1");
                for (let i = 0; i < this.arrayFilter.length; i++) {
                    let recensioni = this.arrayFilter[i].profile.reviews.length;
                    console.log("n° recensioni: " + recensioni);
                    if (recensioni >= 0 && recensioni <= 3) {
                        console.log('dentro recensioni');
                        filteredArray.push(this.arrayFilter[i]);
                    }
                }
            }
            if (this.reviewSelect == 2) {
                console.log("sono dentro if value 2");
                for (let i = 0; i < this.arrayFilter.length; i++) {
                    let recensioni = this.arrayFilter[i].profile.reviews.length;
                    console.log("n° recensioni: " + recensioni);
                    if (recensioni > 3 && recensioni <= 7) {
                        console.log('dentro recensioni');
                        filteredArray.push(this.arrayFilter[i]);
                    }
                }
            }
            if (this.reviewSelect == 3) {
                console.log("sono dentro if value 3");
                for (let i = 0; i < this.arrayFilter.length; i++) {
                    let recensioni = this.arrayFilter[i].profile.reviews.length;
                    console.log("n° recensioni: " + recensioni);
                    if (recensioni > 7) {
                        console.log('dentro recensioni');
                        filteredArray.push(this.arrayFilter[i]);
                    }
                }
            }

            console.log("filtered array: " + filteredArray);
            this.arrayFilter = filteredArray;
        },
    },
};
</script>

<template>
    <div id="trainer-gallery">
        <form style="text-align: center">
            <select name="vote" id="vote" v-model="voteSelect" @change="filterVote">
                <option :value="voteSelect" disabled>Scegli un voto</option>
                <option v-for="vote in votes" :key="vote.id" :value="vote.value">
                    {{ vote.value }}
                </option>
            </select>

            <select name="vote" id="vote" v-model="reviewSelect" @change="filterReview">
                <option :value="reviewSelect" disabled>
                    Scegli numero Recensioni
                </option>
                <option value="1">0-3</option>
                <option value="2">4-7</option>
                <option value="3">8+</option>
            </select>
        </form>
        <div class="container">
            <div class="col-gallery">
                <div v-for="profile in arrayFilter" :key="profile.id" class="card-trainer"
                    @click="showDetails(profile.id)">
                    <div class="style-trainer">
                        <img :src="getImagePath(
                `../assets/trainers/${profile.profile.photo}`
            )
                " :alt="profile.name + ' ' + profile.surname" />
                        <figcaption>
                            <div class="caption">
                                <div class="name">
                                    <h3>{{ profile.name }} {{ profile.surname }}</h3>
                                </div>
                                <div v-for="specialization in profile.profile
                .specializations" :key="specialization" class="specializations">
                                    <h4>{{ specialization }}</h4>
                                </div>
                                <div class="social">
                                    <i class="fa-brands fa-facebook"></i>
                                    <i class="fa-brands fa-instagram"></i>
                                    <i class="fa-brands fa-x-twitter"></i>
                                    <i class="fa-brands fa-tiktok"></i>
                                    <i class="fa-regular fa-envelope"></i>
                                </div>
                            </div>
                        </figcaption>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@use "../styles/partials/variables" as *;

select {
    margin: 0 10px;
}

.style-trainer {
    border-radius: 25% 1rem 15% 2% / 0% 1rem 15% 2%;
    display: grid;
    overflow: hidden;
    cursor: pointer;
    box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.7);
}

.style-trainer>* {
    grid-area: 1/1;
    transition: .4s;
}

.style-trainer figcaption {
    display: grid;
    align-items: end;
    font-size: 2.3rem;
    font-weight: bold;
    padding: .75rem;
    background: var(--c, #0009);
    clip-path: inset(0 var(--_i, 100%) 0 0);
}

.style-trainer:hover figcaption {
    --_i: 0%;
}

.style-trainer:hover img {
    transform: scale(1.2);
}

#trainer-gallery {
    padding-top: 160px;
    width: 100%;
    min-height: calc(100vh - 300px);
    background-image: url(../assets/Lightgrey-Wallpaper.webp);
    background-size: cover;
    padding-bottom: 50px;

    .container {
        margin: auto;
        width: 80%;

        .col-gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;

            .card-trainer {
                border-radius: 25% 1rem 15% 2% / 0% 1rem 15% 2%;
                margin: 1rem 1rem;
                overflow: hidden;
                width: calc((100% / 3) - 2rem);
                box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.7);

                #sponsor-logo {
                    width: 20%;
                    height: auto;
                    position: absolute;
                    border: none;
                    top: .5rem;
                    right: .5rem;
                }

                img {
                    height: 500px;
                    object-fit: cover;
                    object-position: center;
                    transition: filter 1s ease, transform 1s ease;
                }

                &:hover {
                    cursor: pointer;
                }
            }
        }

        .caption {
            text-align: center;

            .name {
                margin: 0.5rem 0;
                transition: filter 0.25s ease, transform 0.25s ease;
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
                margin: .25rem 0;
            }
        }
    }
}
</style>