<script>
import axios from "axios";
import { store } from "../store";

export default {
    name: "AppTrainerGallery",
    data() {
        return {
            store,
            profiles: [],
            filteredProfiles: [],
            specializations: [],
            selectedSpecializations: [],
            profilesTemp: [],
        };
    },

    methods: {
        getImagePath: function (imgPath) {
            return new URL(imgPath, import.meta.url).href;
        },

        getSelectedSpecializations() {
            // Modifica: Rinomina il metodo per eliminare la "s" alla fine
            // Filtra i profili in base alle specializzazioni selezionate
            store.arrayFilter = this.profiles.filter((profile) => {
                return profile.profile.specializations.some((spec) =>
                    this.selectedSpecializations.includes(spec)
                );
            });

            // Naviga alla pagina Risultati e passa i risultati filtrati come parametro nell'URL
            this.$router.push({
                name: "Risultati",
            });
        },

        showDetails(id) {
            console.log("ID Profilo:", id);
            this.$router.push({
                name: "About",
                params: { id: id },
            });
        },
    },

    mounted() {
        axios
            .get("http://localhost:8000/api/v1/all")
            .then((res) => {
                const data = res.data;
                if (data.status === "success") this.profiles = data.data;

                // console.log("profiles: ", this.profiles);
            })
            .catch((err) => {
                console.error(err);
            });

        axios
            .get("http://localhost:8000/api/v1/sponsored/profiles")
            .then((res) => {
                const data = res.data;
                if (data.status === "success") this.filteredProfiles = data.data;

                // console.log("profiles: ", this.profiles);
            })
            .catch((err) => {
                console.error(err);
            });

        axios
            .get("http://localhost:8000/api/v1/specializations")
            .then((res) => {
                const data = res.data;
                if (data.status === "success") {
                    this.specializations = data.specializations.map(
                        (spec) => spec.name
                    );
                    // console.log(this.specializations);
                }
            })
            .catch((err) => {
                console.error(err);
            });
    },
};
</script>

<template>

    <div id="trainer-gallery">
        <h2>SCEGLI IL TUO PERSONAL TRAINER IDEALE</h2>
        <div class="selection">
            <div class="spec-label">
                <label>Scegli la specializzazione:</label>
            </div>
            <div v-for="specialization in specializations" :key="specialization">
                <input type="checkbox" :id="specialization" :value="specialization" v-model="selectedSpecializations"
                    @change="getSelectedSpecializations" />
                <label :for="specialization">{{ specialization }}</label>
            </div>
        </div>
        <div class="container">
            <h2>Profili Sponsorizzati:</h2>
            <div class="col-gallery">
                <div v-for="profile in filteredProfiles" :key="profile.id" class="card-trainer"
                    @click="showDetails(profile.id)">
                    <div class="style-trainer">
                        <img :src="getImagePath(
                `../assets/trainers/${profile.profile.photo}`
            )
                " :alt="profile.name + ' ' + profile.surname" />
                        <figcaption>
                            <img id="sponsor-logo" src="../assets/logos/sponsor.svg" alt="">
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

h2 {
    color: $grey;
    font-size: 40px;
    text-align: center;
    padding-top: 1.5rem;
    margin-bottom: 25px;
}

button {
    padding: 8px;
    background-color: yellow;
    color: black;
    border-radius: 8px;
}

.selection {
    margin: 0 auto .5rem;
    width: 25%;

    .spec-label {
        margin-bottom: .5rem;
    }

    select,
    button {
        margin-left: 15px;
    }
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
    position: relative;
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
    width: 100%;
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
                margin: 1rem 1rem;
                border-radius: 25% 1rem 15% 2% / 0% 1rem 15% 2%;
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
