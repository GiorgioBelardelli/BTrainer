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

            selectedStar: -1,
            stars: [1, 2, 3, 4, 5],

            arrayMediaVoti: [{ idProfile: "", mediaVoti: 0 }],
        };
    },
    created() {
        this.specialization = this.$route.query.specialization;
        const storedArrayFilter = localStorage.getItem("arrayFilter");
        if (storedArrayFilter) {
            this.arrayFilter = JSON.parse(storedArrayFilter);
        }
    },

    mounted() {
        axios
            .get("http://localhost:8000/api/v1/votes")
            .then((res) => {
                const data = res.data;
                if (data.status === "success") {
                    this.votes = data.votes;
                    // Aggiungi la logica per indicare se il profilo è sponsorizzato
                    this.arrayFilter.forEach((profile) => {
                        profile.isSponsored = profile.profile.is_sponsored;
                    });
                    // Ordina i profili per visualizzare quelli sponsorizzati prima degli altri
                    this.arrayFilter.sort((a, b) => {
                        return (
                            (b.isSponsored ? 1 : 0) - (a.isSponsored ? 1 : 0)
                        );
                    });
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

        selectStar(index) {
            this.selectedStar = index;
            this.voteSelect = index + 1;
            this.filterVote();
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
            }
            this.arrayFilter = filteredArray;
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
                        console.log("dentro recensioni");
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
                        console.log("dentro recensioni");
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
                        console.log("dentro recensioni");
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
            <div class="vote-star">
                <div v-for="(star, index) in stars" :key="index" class="icon-container" @click="selectStar(index)">
                    <i class="fas fa-star" :class="{ active: index <= selectedStar }"></i>
                </div>
            </div>

            <select name="vote" id="vote" v-model="reviewSelect" @change="filterReview" class="custom-select">
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
                    <div class="overlay"></div>
                    <img v-if="profile.isSponsored" id="sponsor-logo" src="../assets/logos/sponsor.svg" alt="Sponsor" />
                    <img :src="getImagePath(
                    `../assets/trainers/${profile.profile.photo}`
                )
                    " :alt="profile.name + ' ' + profile.surname" />
                    <div class="caption">
                        <div class="name">
                            <h3>
                                {{ profile.name }} {{ profile.surname }}
                            </h3>
                        </div>
                        <div v-for="specialization in profile.profile
                    .specializations" :key="specialization" class="specializations">
                            <h4>{{ specialization }}</h4>
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

#trainer-gallery {
    padding-top: 160px;
    width: 100%;
    min-height: calc(100vh - 300px);
    background-image: url(../assets/Lightgrey-Wallpaper.webp);
    background-size: cover;
    padding-bottom: 50px;

    form {
        display: flex;
        justify-content: center;
        align-items: center;

        .custom-select {
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            color: $grey;
            padding: 8px;
            border-radius: 5px;
            font-size: 16px;
        }

        .custom-select option {
            background-color: #fff;
            color: $grey;
        }

        &>div {
            margin: 0 2rem;
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

    .container {
        margin: auto;
        width: 80%;

        .col-gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;

            .overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.6);
                z-index: 10;
            }

            .card-trainer {
                position: relative;
                border-radius: 0% 2rem 0% 2rem / 0% 2rem 0% 2rem;
                margin: 1rem;
                overflow: hidden;
                width: calc((100% / 3) - 2rem);
                box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.7);

                #sponsor-logo {
                    width: 20%;
                    height: auto;
                    position: absolute;
                    border: none;
                    top: 0.5rem;
                    right: 0.5rem;
                    z-index: 30;
                }

                img {
                    display: block;
                    height: 500px;
                    object-fit: cover;
                    object-position: top;
                    transition: filter 1s ease, transform 1s ease;
                }

                &:hover {
                    cursor: pointer;
                }
            }
        }

        .caption {
            text-align: center;
            position: absolute;
            bottom: 1rem;
            left: 50%;
            transform: translateX(-50%);
            z-index: 30;

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
        }
    }
}

@media all and (max-width: 1000px) {
    #trainer-gallery {
        .spec-label {
            .specialization {
                width: calc(100% / 5);

                #label-spec {
                    text-align: center;
                }
            }
        }

        .container {
            width: 95%;

            .col-gallery {
                .card-trainer {
                    width: calc((100% / 3) - 2rem);

                    i {
                        font-size: 0.9rem;
                    }
                }
            }
        }
    }
}

@media all and (max-width: 900px) {
    #trainer-gallery {
        .container {
            width: 95%;

            .col-gallery {
                .card-trainer {
                    width: calc((50%) - 2rem);

                    i {
                        font-size: 0.9rem;
                    }
                }
            }
        }
    }
}

@media all and (max-width: 768px) {
    #trainer-gallery {
        form {
            display: flex;
            flex-direction: column;

            &>div {
                margin: 1rem 0;
            }
        }

        .container {
            width: 95%;
        }
    }

    #trainer-gallery .container .col-gallery .card-trainer {
        width: calc((50%) - 2rem);
    }
}

@media all and (max-width: 576px) {
    #trainer-gallery {
        .spec-label {
            justify-content: space-evenly;

            .text {
                font-size: .85rem;
            }

            .specialization {
                width: calc(100% / 4);

                #label-spec {
                    text-align: center;
                }
            }
        }

        .container {
            width: 80%;

            .col-gallery {
                .card-trainer {
                    width: calc(100% - 2rem);
                }
            }
        }
    }
}
</style>
