<script>

export default {
    name: "AppFooter",
}
</script>

<template>
    <footer>

        <div class="image-logo">
            <router-link to="/">
                <img src="../assets/logos/header.svg" alt="logo" id="logo-footer">
            </router-link>
        </div>
        <!-- Div Contenitore Bottom  -->
        <div class="bottom">
            <!-- sezione contatti a sinistra  -->
            <div class="contacts">

                <p>
                    "Push yourself beyond limits, embrace the grind, and witness the transformation. In this arena of
                    dedication, sweat, and perseverance, greatness is forged."
                </p>

                <div class="social-bottom">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-x-twitter"></i>
                    <i class="fa-regular fa-envelope"></i>
                    <i class="fa-brands fa-tiktok"></i>
                </div>

                <p>
                    Privacy Policy | © 2024 BTrainer <br>
                    Design by Team1 Boolean Classe 112
                </p>

            </div>

            <!-- Sezione centrale specializzazioni (qui verranno ciclate tutte le specialization) -->

            <!-- BONUS: al link su una singola specializzazione inserire un link che mandi alle specifiche della specializzazione -->

            <div class="spec">
                <ul>
                    <li>
                        <a href="http://localhost:5174/#specializations">Powerlifting</a>
                    </li>
                    <li>
                        <a href="http://localhost:5174/#specializations">Crossfit</a>
                    </li>
                    <li>
                        <a href="http://localhost:5174/#specializations">Calistenica</a>
                    </li>
                    <li>
                        <a href="http://localhost:5174/#specializations">Yoga</a>
                    </li>
                    <li>
                        <a href="http://localhost:5174/#specializations">Pilates</a>
                    </li>
                    <li>
                        <a href="http://localhost:5174/#specializations">Kickboxing</a>
                    </li>
                    <li>
                        <a href="http://localhost:5174/#specializations">High Intensity Interval Training</a>
                    </li>
                    <li>
                        <a href="http://localhost:5174/#specializations">Recupero Post-Infortunio</a>
                    </li>
                    <li>
                        <a href="http://localhost:5174/#specializations">Difesa Personale</a>
                    </li>

                </ul>
            </div>
            <div class="times">
                <ul>
                    <li>ORARI:</li>
                    <li>LUNEDI-VENERDI: 8:00 - 17:00</li>
                    <li>SABATO: 9:00 - 13:00</li>
                    <li>DOMENICA: CHIUSO</li>
                </ul>

            </div>
        </div>
    </footer>
</template>

<style lang="scss" scoped>
@use '../styles/partials/variables' as *;

footer {
    background-color: black;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 3rem;

    .image-logo {

        img {
            width: 100px;
        }
    }

    .bottom {
        width: 80%;
        margin: auto;
        display: flex;

        .contacts,
        .spec,
        .times {
            flex: 1;
        }

        .contacts {
            flex-basis: 30%;
            align-self: center;

            p {
                text-align: center;
                font-size: 18px;
                color: $lightgrey;
                margin-bottom: 10px;
                margin-top: 10px;
            }

            p:hover {
                color: $yellow;
                transform: scale(1.01);
            }

            .social-bottom {
                display: flex;
                width: 75%;
                margin: auto;
                padding-top: 10px;
                padding-bottom: 10px;
                justify-content: center;
                gap: 10px;

                i {
                    color: $grey;
                    margin-right: 5px;
                    font-size: 20px;
                }

                i:hover {
                    color: $yellow;
                    transform: scale(1.5);
                }

                p {
                    font-size: 18px;
                }
            }

        }

        .spec {
            flex-basis: 30%;
            align-self: center;
            text-align: center;

            ul {

                li {
                    padding-top: 5px;
                    color: $lightgrey;
                    font-size: 18px;
                }

                li:hover {
                    color: $yellow;
                }
            }

        }

        .times {
            align-self: center;
            text-align: center;
            flex-basis: 30%;
            font-size: 18px;
            color: $lightgrey;

            li {
                padding-top: 10px;
            }

            li:hover {
                color: $yellow;
                transform: scale(1.01);
            }
        }
    }
}

@media all and (max-width: 992px) {

    footer {
        padding: 1.85rem;
        flex-direction: column;

        .image-logo {

            img {
                width: 150px;
            }
        }

        &>div {
            margin: 2rem 0;
        }

        .bottom {
            width: 75%;
            flex-direction: column;

            &>div {
                margin: 1rem 0;
            }

            .contacts {
                p {
                    font-size: 22px;
                }

                .social-bottom {
                    margin: 1rem 0;
                    width: 100%;
                    display: flex;
                    justify-content: center;

                    i {
                        font-size: 2rem;
                    }
                }
            }

            .spec {
                ul {
                    li {
                        font-size: 22px;
                    }
                }
            }

            .times {
                font-size: 22px;
            }
        }
    }
}


@media all and (min-width: 769px) {
    #trainer-gallery .container .col-gallery .card-trainer {
        width: calc((100% / 3) - 2rem);
    }
}

// Media Query Tablet

@media all and (max-width: 768px) {
    footer {
        flex-direction: column;
        padding: 1rem;

        .image-logo {

            img {
                width: 150px;
            }
        }

        &>div {
            margin: 1rem 0;
        }

        .bottom {
            width: 95%;
            flex-direction: column;

            &>div {
                margin: 1rem 0;
            }

            .contacts {
                p {
                    font-size: 18px;
                }

                .social-bottom {
                    margin: 1rem 0;
                    width: 100%;
                    display: flex;
                    justify-content: center;

                    i {
                        font-size: 1.5rem;
                    }
                }
            }

            .spec {
                ul {
                    li {
                        font-size: 18px;
                    }
                }
            }

            .times {
                font-size: 18px;
            }
        }
    }
}
</style>