<template>
    <section id="intro">
        <div class="container">
            <p><b>Team 1 Fintess Center</b> è la tua risorsa online per trovare informazioni riguardo vari allenamenti
                offerti da
                personal trainer qualificati. Attraverso il nostro sito puoi esplorare le specializzazioni dei trainer,
                leggere le recensioni dei clienti e trovare il trainer perfetto per te. Che tu sia un principiante o un
                atleta esperto, i nostri professionisti sono pronti ad aiutarti a raggiungere i tuoi obiettivi di
                fitness in
                modo efficace e motivante. Inizia il tuo viaggio verso una vita più sana e attiva!</p>
            <div class="img">
                <img src="../assets/style/fancy1.svg" alt="">
            </div>
            <div class="cards">
                <div class="card" id="sponsor">
                    <a href="#sponsor-profile">
                        <div class="title">
                            <h3>I nostri Personal Trainer Sponsorizzati</h3>
                        </div>
                    </a>
                </div>
                <div class="card" id="trainer">
                    <a href="#trainer-gallery">
                        <div class="title">
                            <h3>Scegli la specializzazione che fa per te!</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
</script>

<style lang="scss" scoped>
@use "../styles/partials/variables" as *;
@import url('https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

#intro {
    background-image: url(../assets/bg-intro.png);
    background-size: cover;

    .container {
        height: 400px;
        position: relative;
        font-family: "Montserrat Alternates", sans-serif;
        padding: 3rem 2rem 3rem 4rem;

        .cards {
            display: flex;
            width: 100%;

            .card {
                background-color: $grey;
                padding: 2rem;
                margin: 0 7rem;
                width: calc(50% - 14rem);
                border-radius: 0% 2rem 0% 2rem / 0% 2rem 0% 2rem;
                z-index: 30;
                bottom: 0;
                transform: translateY(50%);
                position: absolute;
                display: flex;
                align-items: center;
                text-align: center;
            }

            #sponsor {
                left: 0;
            }

            #trainer {
                right: 0;
            }
        }

        h1 {
            text-align: center;
        }

        p {
            width: 70%;
            font-size: 1.5rem;
            line-height: 1.5;
        }
    }

    img {
        position: absolute;
        width: 13%;
        z-index: 30;
        bottom: 0;
        left: 0;
        transform: translateY(50%);
    }
}

@media screen and (max-width: 1200px) {
    #intro {
        .container {
            padding: 2rem;

            p {
                font-size: 1.35rem;
            }

            .cards {
                .card {
                    margin: 0 5rem;
                    width: calc(50% - 10rem);
                }
            }
        }
    }
}

@media screen and (max-width: 992px) {
    #intro {
        .container {
            padding: 2rem;

            p {
                font-size: 1.25rem;
            }

            .cards {
                .card {
                    margin: 0 2rem;
                    width: calc(50% - 4rem);

                    .title {
                        h3 {
                            font-size: 1.25rem;
                        }
                    }
                }
            }
        }
    }
}

@media screen and (max-width: 768px) {
    #intro {
        .container {
            padding: 2rem;

            p {
                font-size: 1.15rem;
                width: 80%;
            }

            .cards {
                .card {
                    padding: 1.25rem;
                    margin: 0 1rem;
                    width: calc(50% - 2rem);

                    .title {
                        h3 {
                            font-size: 1.25rem;
                        }
                    }
                }
            }
        }
    }
}

@media screen and (max-width: 576px) {
    #intro {
        .container {
            padding: 1rem 1rem 1.5rem 1.5rem;

            p {
                font-size: 1.05rem;
                width: 95%;
            }

            .cards {
                .card {
                    padding: 1.25rem;
                    margin: 0 .5rem;
                    width: calc(50% - 1rem);

                    .title {
                        h3 {
                            font-size: 1.15rem;
                        }
                    }
                }
            }
        }
    }
}
</style>