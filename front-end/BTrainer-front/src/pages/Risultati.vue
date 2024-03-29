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
    // background-image: url(../assets/Lightgrey-Wallpaper.webp);
    background-color: #EEEBEB;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 2000 1500'%3E%3Cdefs%3E%3Crect stroke='%23EEEBEB' stroke-width='0.1' width='1' height='1' id='s'/%3E%3Cpattern id='a' width='3' height='3' patternUnits='userSpaceOnUse' patternTransform='scale(20.4) translate(-950.98 -713.24)'%3E%3Cuse fill='%23ece9e9' href='%23s' y='2'/%3E%3Cuse fill='%23ece9e9' href='%23s' x='1' y='2'/%3E%3Cuse fill='%23e9e6e6' href='%23s' x='2' y='2'/%3E%3Cuse fill='%23e9e6e6' href='%23s'/%3E%3Cuse fill='%23e7e4e4' href='%23s' x='2'/%3E%3Cuse fill='%23e7e4e4' href='%23s' x='1' y='1'/%3E%3C/pattern%3E%3Cpattern id='b' width='7' height='11' patternUnits='userSpaceOnUse' patternTransform='scale(20.4) translate(-950.98 -713.24)'%3E%3Cg fill='%23e4e1e1'%3E%3Cuse href='%23s'/%3E%3Cuse href='%23s' y='5' /%3E%3Cuse href='%23s' x='1' y='10'/%3E%3Cuse href='%23s' x='2' y='1'/%3E%3Cuse href='%23s' x='2' y='4'/%3E%3Cuse href='%23s' x='3' y='8'/%3E%3Cuse href='%23s' x='4' y='3'/%3E%3Cuse href='%23s' x='4' y='7'/%3E%3Cuse href='%23s' x='5' y='2'/%3E%3Cuse href='%23s' x='5' y='6'/%3E%3Cuse href='%23s' x='6' y='9'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='h' width='5' height='13' patternUnits='userSpaceOnUse' patternTransform='scale(20.4) translate(-950.98 -713.24)'%3E%3Cg fill='%23e4e1e1'%3E%3Cuse href='%23s' y='5'/%3E%3Cuse href='%23s' y='8'/%3E%3Cuse href='%23s' x='1' y='1'/%3E%3Cuse href='%23s' x='1' y='9'/%3E%3Cuse href='%23s' x='1' y='12'/%3E%3Cuse href='%23s' x='2'/%3E%3Cuse href='%23s' x='2' y='4'/%3E%3Cuse href='%23s' x='3' y='2'/%3E%3Cuse href='%23s' x='3' y='6'/%3E%3Cuse href='%23s' x='3' y='11'/%3E%3Cuse href='%23s' x='4' y='3'/%3E%3Cuse href='%23s' x='4' y='7'/%3E%3Cuse href='%23s' x='4' y='10'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='c' width='17' height='13' patternUnits='userSpaceOnUse' patternTransform='scale(20.4) translate(-950.98 -713.24)'%3E%3Cg fill='%23e2dfdf'%3E%3Cuse href='%23s' y='11'/%3E%3Cuse href='%23s' x='2' y='9'/%3E%3Cuse href='%23s' x='5' y='12'/%3E%3Cuse href='%23s' x='9' y='4'/%3E%3Cuse href='%23s' x='12' y='1'/%3E%3Cuse href='%23s' x='16' y='6'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='d' width='19' height='17' patternUnits='userSpaceOnUse' patternTransform='scale(20.4) translate(-950.98 -713.24)'%3E%3Cg fill='%23EEEBEB'%3E%3Cuse href='%23s' y='9'/%3E%3Cuse href='%23s' x='16' y='5'/%3E%3Cuse href='%23s' x='14' y='2'/%3E%3Cuse href='%23s' x='11' y='11'/%3E%3Cuse href='%23s' x='6' y='14'/%3E%3C/g%3E%3Cg fill='%23dfdcdc'%3E%3Cuse href='%23s' x='3' y='13'/%3E%3Cuse href='%23s' x='9' y='7'/%3E%3Cuse href='%23s' x='13' y='10'/%3E%3Cuse href='%23s' x='15' y='4'/%3E%3Cuse href='%23s' x='18' y='1'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='e' width='47' height='53' patternUnits='userSpaceOnUse' patternTransform='scale(20.4) translate(-950.98 -713.24)'%3E%3Cg fill='%23FFCC00'%3E%3Cuse href='%23s' x='2' y='5'/%3E%3Cuse href='%23s' x='16' y='38'/%3E%3Cuse href='%23s' x='46' y='42'/%3E%3Cuse href='%23s' x='29' y='20'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='f' width='59' height='71' patternUnits='userSpaceOnUse' patternTransform='scale(20.4) translate(-950.98 -713.24)'%3E%3Cg fill='%23FFCC00'%3E%3Cuse href='%23s' x='33' y='13'/%3E%3Cuse href='%23s' x='27' y='54'/%3E%3Cuse href='%23s' x='55' y='55'/%3E%3C/g%3E%3C/pattern%3E%3Cpattern id='g' width='139' height='97' patternUnits='userSpaceOnUse' patternTransform='scale(20.4) translate(-950.98 -713.24)'%3E%3Cg fill='%23FFCC00'%3E%3Cuse href='%23s' x='11' y='8'/%3E%3Cuse href='%23s' x='51' y='13'/%3E%3Cuse href='%23s' x='17' y='73'/%3E%3Cuse href='%23s' x='99' y='57'/%3E%3C/g%3E%3C/pattern%3E%3C/defs%3E%3Crect fill='url(%23a)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23b)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23h)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23c)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23d)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23e)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23f)' width='100%25' height='100%25'/%3E%3Crect fill='url(%23g)' width='100%25' height='100%25'/%3E%3C/svg%3E");
    background-attachment: fixed;
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
            width: 100%;
            min-height: 30%;
            padding-bottom: 1rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            z-index: 30;
            background: rgba(40, 40, 40, 0.5);
            backdrop-filter: blur(10px);
            border-radius: 0% 2rem 0% 2rem / 0% 2rem 0% 2rem;

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
