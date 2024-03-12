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
                    <img src="../assets/logos/header.svg" alt="logo">
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
            <div class="spec">
                <ul>
                    <li>Cyclette</li>
                    <li>AcquaGym</li>
                    <li>Calystenichs</li>
                    <li>Power Lifting</li>
                    <li>Running</li>
                </ul>
            </div>
            <div class="times">
                <ul>Working hours:
                    <li>Monday-Friday: 8:00 - 17:00</li>
                    <li>Saturday: 9:00 - 13:00</li>
                    <li>Sunday: CLOSED</li>
                </ul>

            </div>
        </div>
    </footer>
</template>

<style lang="scss" scoped>
    @use '../styles/partials/variables' as *;

    footer {
        margin-top: 100px;
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
                img {
                    width: 100px;
                }
                p {
                    font-size: 15px;
                    color: $lightgrey;
                    margin-bottom: 10px;
                    margin-top: 10px;
                }
                .social-bottom {
                    display: flex;
                    justify-content: center;
                    gap: 20px;

                    i {
                        width: 20px;
                        color: $grey;
                        margin-right: 10px;
                    }
                    i:hover {
                          color: $yellow;
                          transform: scale(1.5); 
                        }
                }

            }
            .spec {
                flex-basis: 30%;
                text-align: center;

                li {
                    padding-top: 5px;
                    color: $lightgrey;
                    font-size: 15px;
                }
            }
            .times {
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
