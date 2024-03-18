<script>

    export default {
      name: "AppFooter",
    }
</script>

<template>
    <footer>
        <!-- Div Contenitore Bottom  -->
        <div class="bottom">
            <!-- sezione contatti a sinistra  -->
            <div class="contacts">
                <div class="logo">
                    <router-link to="/">  
                    <img src="../assets/logos/header.svg" alt="logo">
                     </router-link>
                    <p>
                        "Push yourself beyond limits, embrace the grind, and witness the transformation. In this arena of dedication, sweat, and perseverance, greatness is forged."
                    </p>

                    <div class="social-bottom">
                      <i class="fa-brands fa-facebook"></i>
                      <i class="fa-brands fa-instagram"></i>
                      <i class="fa-brands fa-x-twitter"></i>
                      <i class="fa-brands fa-tiktok"></i>
                      <i class="fa-regular fa-envelope"></i>
                    </div>

                    <p>
                        Privacy Policy | © 2024 BTrainer <br>
                        Design by Team1 Boolean Classe 112
                    </p>

                </div>
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
                <ul>ORARI:
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
        padding-top: 100px;
        height: 300px;
        background-color: black;

        .bottom{
            width: 80%;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;

            .contacts {
                flex-basis: 30%;
                .logo {
                    margin-top: 30px;
                }
                img {
                    width: 100px;
                }
                p {
                    font-size: 12px;
                    color: $lightgrey;
                    margin-bottom: 10px;
                    margin-top: 10px;
                }


                .social-bottom {
                    display: flex;
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
                text-align: center;
                ul {

                    margin-top: 30px;

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
                margin-top: 30px;
                text-align: center;
                flex-basis: 30%;
                font-size: 15px;
                color: $lightgrey;
                li {
                    padding-top: 10px;
                }
            }
        }
    }
</style>
