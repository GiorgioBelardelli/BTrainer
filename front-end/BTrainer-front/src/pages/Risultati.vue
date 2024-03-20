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
                    if (recensioni > 3 && recensioni <= 8) {
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
                    if (recensioni > 8) {
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
            <select
                name="vote"
                id="vote"
                v-model="voteSelect"
                @change="filterVote"
            >
                <option :value="voteSelect" disabled>Scegli un voto</option>
                <option
                    v-for="vote in votes"
                    :key="vote.id"
                    :value="vote.value"
                >
                    {{ vote.value }}
                </option>
            </select>

            <select
                name="vote"
                id="vote"
                v-model="reviewSelect"
                @change="filterReview"
            >
                <option :value="reviewSelect" disabled>
                    Scegli numero Recensioni
                </option>
                <option value="1">0-3</option>
                <option value="2">4-7</option>
                <option value="3">8+</option>
            </select>
        </form>
        <div class="container">
            <div class="row">
                <div class="col-gallery">
                    <div
                        v-for="profile in arrayFilter"
                        :key="profile.id"
                        class="card-trainer"
                        @click="showDetails(profile.id)"
                    >
                        <img
                            :src="
                                getImagePath(
                                    `../assets/trainers/${profile.profile.photo}`
                                )
                            "
                            :alt="profile.name + ' ' + profile.surname"
                        />
                        <div class="caption">
                            <div class="name">
                                {{ profile.name }} {{ profile.surname }}
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
                        </div>
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

h2 {
    color: $grey;
    font-size: 40px;
    text-align: center;
    margin-top: 25px;
    margin-bottom: 25px;
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

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;

            .card-trainer {
                position: relative;
                margin: 1rem 0.5rem;
                overflow: hidden;
                border: 1 px solid black;
                width: 25%;

                img {
                    width: 100%;
                    height: 400px;
                    object-fit: cover;
                    object-position: center;
                    transition: filter 1s ease, transform 1s ease;
                    display: block;
                    border-radius: 10px;
                    border: 2px solid black;
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
            text-align: center;
            padding-bottom: 25px;
            padding-top: 10px;

            .name,
            .specializations,
            .social {
                margin-bottom: 5px;
            }

            .name {
                margin: 0.5rem 0;
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

            .social {
                margin: 1rem 0;
            }
        }
    }
}
</style>
