<script>
import axios from "axios";

export default {
    name: "AppTrainerGallery",
    data() {
        return {
            profiles: [],
            specializations: [],
            selectedSpecialization: null,
            arrayFilter: [],
            profilesTemp:[],
        };
    },

    methods: {
        getImagePath: function (imgPath) {
            return new URL(imgPath, import.meta.url).href;
        },

        getSelectedSpecialization() {
            // Filtra i profili in base alla specializzazione selezionata
            this.arrayFilter = this.profiles.filter(profile => {
                return profile.profile.specializations.includes(this.selectedSpecialization);
            });

            // Naviga alla pagina Risultati e passa i risultati filtrati come parametro nell'URL
            this.$router.push({
                name: 'Risultati',
                query: { 
                    specialization: this.selectedSpecialization,
                    profiles: JSON.stringify(this.arrayFilter) // Converti l'array in una stringa JSON
                }
            });
        },

        showDetails(id) {
            console.log('ID Profilo:', id);
            this.$router.push({
                name: 'About',
            });
        }
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
                console.err(err);
            });

        axios
            .get("http://localhost:8000/api/v1/specializations")
            .then((res) => {
                const data = res.data;
                if (data.status === "success") {
                    for (let i = 0; i <= data.specializations.length-1; i++) {
                        this.specializations[i] = data.specializations[i].name;
                    }
                    // console.log(this.specializations);
                }
            })
            .catch((err) => {
                console.err(err);
            });
    },
};
</script>

<template>
    <h2>SCEGLI IL TUO PERSONAL TRAINER IDEALE</h2>
    
    <div id="trainer-gallery">
        <div class="selection">
            <label for="specialization">Scegli la specializzazione:</label>
            <select
                v-model="selectedSpecialization"
                name="specialization"
                id="specialization"
            >
                <option
                    v-for="specialization in specializations"
                    :key="specialization.id"
                    :value="specialization"
                >
                    {{ specialization }}
                </option>
            </select>
            <button @click="getSelectedSpecialization" type="button">Filtra</button>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-gallery">
                    <div
                        v-for="profile in profiles"
                        :key="profile.id"
                        class="card-trainer" @click="showDetails(profile.id)"
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

button {
    padding: 8px;
    background-color: yellow;
    color: black;
    border-radius: 8px;
}
.selection {
    margin: auto;
    width: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 50px;

    label , select , button {
        margin-left: 15px;
    }
}

#trainer-gallery {
    width: 100%;
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

            .name {
                margin: .5rem 0;
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
