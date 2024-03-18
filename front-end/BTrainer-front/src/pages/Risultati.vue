<script>
export default {
    name: "Risultati",
    data() {
        return {
            arrayFilter: [],
            specialization: null
        };
    },
    created() {
        this.specialization = this.$route.query.specialization;
        this.arrayFilter = JSON.parse(this.$route.query.profiles);
    },

    methods: {
        getImagePath: function (imgPath) {
            return new URL(imgPath, import.meta.url).href;
        },
    }
};

</script>

<template>
    <div id="trainer-gallery">
        <div class="container">
            <div class="row">
                <div class="col-gallery">
                    <div
                        v-for="profile in arrayFilter"
                        :key="profile.id"
                        class="card-trainer"
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

                // &:hover {
                //     cursor: pointer;
                //     img {
                //         transform: scale(1.1);
                //         display: block;
                //     }
                // }
            }
        }
        .caption {
            text-align: center;
            padding-bottom: 25px;
            padding-top: 10px;

        .name, .specializations, .social {
            margin-bottom: 5px;
        }

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
