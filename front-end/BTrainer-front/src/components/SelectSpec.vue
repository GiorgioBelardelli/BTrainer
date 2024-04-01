<script>
import axios from "axios";
import { store } from "../store";

export default {
    name: 'SelectSpec',
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
            store.arrayFilter = this.profiles.filter((profile) => {
                return profile.profile.specializations.some((spec) =>
                    this.selectedSpecializations.includes(spec)
                );
            });
            localStorage.setItem('arrayFilter', JSON.stringify(store.arrayFilter));
            this.$router.push({
                name: "Risultati",
            });
            // window.location.reload();
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
                    this.specializations = data.specializations.map((spec) => {
                        const imageName = getImageName(spec.name);
                        return {
                            name: spec.name,
                            imgPath: imageName
                        };
                    });
                    // console.log(this.specializations);
                }
            })
            .catch((err) => {
                console.error(err);
            });

        function getImageName(specName) {
            switch (specName) {
                case "Bodybuilding":
                    return "bb.png";
                case "Powerlifting":
                    return "pl.png";
                case "CrossFit":
                    return "crossfit.png";
                case "Calistenica":
                    return "cali.png";
                case "Yoga":
                    return "yoga.png";
                case "Pilates":
                    return "pilates.png";
                case "Kickboxing":
                    return "kick.png";
                case "High-Intensity Interval Training":
                    return "hi-training.png";
                case "Recupero post-infortunio":
                    return "post.png";
                case "Difesa Personale":
                    return "personal.png";
                default:
                    return "";
            }
        }
    }
}
</script>

<template>
    <div class="spec-label">
        <div class="specialization" v-for="(specialization, index) in specializations" :key="specialization.id">
            <input type="checkbox" :id="'checkbox_' + index" :value="specialization.name"
                v-model="selectedSpecializations" @change="getSelectedSpecializations" style="display: none;" />
            <label id="label-spec" :for="'checkbox_' + index">
                <div class="img">
                    <img :src="getImagePath(`../assets/logos/specializations/${specialization.imgPath}`)"
                        :alt="specialization.name" />
                </div>
                <div class="text">
                    {{ specialization.name }}
                </div>
            </label>
        </div>
    </div>
</template>

<style lang="scss" scoped>
img {
    width: 50%;

    &:hover {
        cursor: pointer;
    }
}

.spec-label {
    margin-bottom: .5rem;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;

    .specialization {
        width: calc(10% - 1rem);
        margin: .5rem;

        #label-spec {
            text-align: center;

            img {
                width: 4.5rem;

                &:hover {
                    scale: 1.1;
                }
            }

            .text {
                font-size: 1.1rem;
            }
        }
    }
}

select,
button {
    margin-left: 15px;
}

@media all and (max-width: 1000px) {
    #trainer-gallery {
        .spec-label {
            .specialization {
                width: calc(100% / 4);

                #label-spec {
                    text-align: center;

                    img {
                        width: 5rem;
                    }

                    .text {
                        font-size: 1.5rem;
                    }
                }
            }
        }

        .container {
            width: 95%;

            .col-gallery {
                .card-trainer {
                    width: calc((100% / 3) - 2rem);

                    img {
                        height: 600px;
                    }

                    i {
                        font-size: 0.9rem;
                    }
                }
            }
        }
    }
}

@media all and (max-width: 900px) {
    h3 {
        font-size: 2.5rem;
    }

    h4 {
        font-size: 2.05rem;
    }

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
    #trainer-gallery .container {
        width: 95%;
    }

    #trainer-gallery .container .col-gallery .card-trainer {
        width: calc((50%) - 2rem);
    }
}

@media all and (max-width: 576px) {
    h3 {
        font-size: 2.35rem;
    }

    h4 {
        font-size: 2rem;
    }

    #trainer-gallery {
        .spec-label {
            justify-content: space-evenly;

            .text {
                font-size: .85rem;
            }

            .specialization {
                width: calc(100% / 3);

                #label-spec {
                    text-align: center;

                    img {
                        width: 4.5rem;
                    }

                    .text {
                        font-size: 1.25rem;
                    }
                }
            }
        }

        .container {
            width: 80%;

            .col-gallery {
                .card-trainer {
                    width: calc(100% - 2rem);

                    img {
                        height: 500px;
                    }
                }
            }
        }
    }
}
</style>