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
                    "Push yourself beyond limits, embrace the grind, and witness the transformation. In this arena of dedication, sweat, and perseverance, greatness is forged."
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

        .image-logo {
            width: 75%;
            padding-top:20px;
            padding-left: 15px;
            margin: auto;
            img {
                width: 80px;
            }
        }

        .bottom{
            width: 80%;
            padding: 15px;
            margin: auto;
            display: flex;
            align-items: stretch;
            min-height: 150px;
            justify-content: space-between;
            flex-wrap: wrap;

            .contacts,
            .spec,
            .times {
            flex: 1;
            }

            .contacts {
                flex-basis: 30%;
                align-self: center;

                p {
                    font-size: 12px;
                    width: 75%;
                    color: $lightgrey;
                    margin-bottom: 10px;
                    margin-top: 10px;
                    margin: auto;
                }

                p:hover {
                    color: yellow;
                    transform: scale(1.01);
                }


                .social-bottom {
                    display: flex;
                    width: 75%;
                    margin: auto;
                    padding-top: 10px;
                    padding-bottom: 10px;
                    justify-content: flex-start;
                    gap: 10px;

                    i {
                        width: 20px;
                        color: $grey;
                        margin-right: 5px;
                    }
                    i:hover {
                          color: $yellow;
                          transform: scale(1.5); 
                        }
                    p {
                        font-size: 10px;
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
                    font-size: 12px;
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
                font-size: 15px;
                color: $lightgrey;

                li {
                    padding-top: 10px;
                }
                li:hover, {
                    color: yellow;
                    transform: scale(1.01);
                }
            }
        }
    }


@media all and (min-width: 769px) {

    footer {
        height: 400px;
    }

    // footer .bottom {
    //     height: 350px;
    // }
    

    #trainer-gallery .container .col-gallery .card-trainer {
        width: calc((100% / 3) - 2rem);
    }
}

// Media Query Tablet

@media all and (max-width: 768px) {
    footer  {
        min-height: 400px;
    }
    .image-logo {
        display: flex;
        justify-content: center;
    }
    footer .bottom {
        width: 95%;
        flex-direction: column;
    }

    footer .bottom .contacts {
        flex-basis: 70%;
        margin: auto;
        order: 3;
        text-align: center;
    }
    footer .bottom .contacts .social-bottom {
        justify-content: center;
        padding: 15px;
    }

    footer .bottom .spec {
        flex-basis: 100%;
        margin: auto;
        text-align: center;
    }
    footer .bottom .times {
        flex-basis: 100%;
        margin: auto;
        padding-top: 50px;
        padding-bottom: 50px;
        text-align: center;
    }

}

// Media Query Smartphone

// @media all and (max-width: 576px) {
//     footer .bottom *  {
//         width: 100%;
//     }

// }

</style>
