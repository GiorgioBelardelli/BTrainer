<script>
</script>

<template>
    <section id="specializations">
        <h1>I nostri trainer sono specializzati in...</h1>
        <div class="cards">
            <div class="card" id="double">
                <div class="overlay"></div>
                <img src="../assets/specializations/bb.png" alt="">
                <h2 class="slide-top">Bodybuilding</h2>
                <p>Il bodybuilding è una disciplina di fitness incentrata sull'allenamento per aumentare e modellare la
                    massa muscolare attraverso l'uso di pesi e resistenza. Con un'attenzione particolare alla dieta e
                    alla costanza nell'allenamento, mira a sviluppare muscoli più grandi, definiti e forti, promuovendo
                    disciplina mentale e benessere fisico.</p>
            </div>
            <div class="card">
                <div class="overlay"></div>
                <img src="../assets/specializations/crossfit.png" alt="">
                <h2 class="slide-top">Calisthenics</h2>
                <p>Il calistenics è un'allenamento basato sul peso corporeo, utilizzando esercizi come trazioni e
                    flessioni per sviluppare forza e agilità. Senza l'uso di attrezzature pesanti, promuove la
                    connessione mente-corpo e favorisce l'adattabilità fisica. Questa disciplina offre un approccio
                    versatile e accessibile al fitness.</p>
            </div>
            <div class="card">
                <div class="overlay"></div>
                <img src="../assets/specializations/cali.png" alt="">
                <h2 class="slide-top">CrossFit</h2>
                <p>Il CrossFit è un programma di fitness che integra esercizi di forza, resistenza e condizionamento
                    fisico ad alta intensità. Attraverso una varietà di movimenti funzionali eseguiti ad alta intensità,
                    promuove la forza, la resistenza cardiovascolare e l'agilità. Con un focus sull'allenamento ad alta
                    intensità e la comunità, il CrossFit offre un approccio dinamico e sfidante al fitness.</p>
            </div>
            <div class="card" id="double">
                <div class="overlay"></div>
                <img src="../assets/specializations/hi-training.png" alt="">
                <h2 class="slide-top">High-Intensity Interval Training</h2>
                <p>L'High-Intensity Interval Training (HIIT) è un metodo di allenamento che alterna brevi esplosioni di
                    esercizio ad alta intensità con periodi di recupero attivo o riposo. Con sessioni di allenamento più
                    brevi ma intense, l'HIIT offre un efficace e efficiente modo per migliorare la forma fisica
                    generale.</p>
            </div>
            <div class="card" id="double">
                <div class="overlay"></div>
                <img src="../assets/specializations/pl.png" alt="">
                <h2 class="slide-top">PowerLifting</h2>
                <p>Il powerlifting è uno sport di forza che si concentra su tre sollevamenti principali: squat, panca
                    piana e stacco da terra. Gli atleti cercano di sollevare il massimo peso possibile in ogni
                    sollevamento, dimostrando forza, tecnica e determinazione. Con un'attenzione particolare alla forza
                    pura, il powerlifting è una disciplina sfidante e gratificante per coloro che cercano di superare i
                    propri limiti fisici.</p>
            </div>
            <div class="card">
                <div class="overlay"></div>
                <img src="../assets/specializations/yoga.png" alt="">
                <h2 class="slide-top">Yoga</h2>
                <p>Lo yoga è una pratica antica che unisce movimenti fluidi, respirazione consapevole e meditazione per
                    promuovere benessere fisico e mentale. Attraverso una serie di posture e sequenze, lo yoga migliora
                    la flessibilità, la forza e la concentrazione, mentre riduce lo stress e favorisce il rilassamento.
                </p>
            </div>
            <div class="card">
                <div class="overlay"></div>
                <img src="../assets/specializations/post.png" alt="">
                <h2 class="slide-top">Recupero post-infortunio</h2>
                <p>Il recupero post-infortunio coinvolge una combinazione di riposo, terapia fisica e graduale
                    reintroduzione dell'attività fisica. Attraverso l'uso di tecniche di riabilitazione specifiche, come
                    esercizi di stretching, terapia manuale e lavoro di rafforzamento, si mira a ripristinare la
                    funzionalità e prevenire future lesioni. </p>
            </div>
            <div class="card" id="double">
                <div class="overlay"></div>
                <img src="../assets/specializations/kick.png" alt="">
                <h2 class="slide-top">Kickboxing</h2>
                <p>Il kick-boxing è uno sport di combattimento che combina tecniche di pugilato e calci, eseguite in
                    modo coordinato e dinamico. Questo allenamento ad alta intensità migliora la forza, l'agilità e la
                    resistenza cardiovascolare, mentre sviluppa abilità di autodifesa e disciplina mentale. Con una
                    varietà di stili e livelli di difficoltà, il kick-boxing offre un eccellente modo per mantenere la
                    forma fisica e aumentare la fiducia in se stessi.</p>
            </div>
            <div class="card" id="double">
                <div class="overlay"></div>
                <img src="../assets/specializations/pilates.png" alt="">
                <h2 class="slide-top">Pilates</h2>
                <p>Il pilates è un metodo di allenamento che si concentra sul potenziamento dei muscoli stabilizzatori
                    del corpo, migliorando la postura e la flessibilità. Attraverso esercizi di controllo del respiro e
                    movimenti precisi, favorisce il rafforzamento del core e la tonificazione muscolare. Con un'enfasi
                    sull'allineamento corporeo e la consapevolezza del movimento, il pilates offre benefici per la
                    salute fisica e mentale.</p>
            </div>
            <div class="card">
                <div class="overlay"></div>
                <img src="../assets/specializations/personal.png" alt="">
                <h2 class="slide-top">Difesa Personale</h2>
                <p>La difesa personale è un insieme di tecniche e strategie utilizzate per proteggersi da potenziali
                    aggressori o situazioni di pericolo. Attraverso l'apprendimento di movimenti di blocco, disarmo e
                    controllo, si mira a sviluppare consapevolezza e capacità di autodifesa. Con un focus
                    sull'efficacia e la sicurezza personale, offre competenze pratiche e fiducia
                    nell'affrontare situazioni di emergenza.</p>
            </div>
        </div>
    </section>
</template>

<style lang="scss" scoped>
@use '../styles/partials/mixins' as *;
@use '../styles/partials/variables' as *;

#specializations {
    padding: 0 10%;
    margin: 0 auto 0;
    // background-color: rgb(37, 37, 37);
    background-image: url(../assets/bg-spec.png);
    position: relative;

    h1 {
        text-align: center;
        padding-top: 5rem;
        margin-bottom: 3rem;
        color: $yellow;
        font-size: 40px;
    }

    h2 {
        filter: grayscale(100%);
        transition: filter 1s ease;
        transition: transform 0.85s ease;
        color: $yellow;
        font-size: 2rem;
        position: absolute;
        bottom: 1rem;
        z-index: 20;
    }

    p {
        position: absolute;
        bottom: -15rem;
        padding: 1rem;
        line-height: 1.5;
        color: $yellow;
        font-weight: bold;
        z-index: 20;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        z-index: 10;
        opacity: 0;
        transition: opacity 0.5s ease;
    }

    @keyframes slide-top {
        0% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(-350px);
        }
    }

    @keyframes slide-bottom {
        0% {
            transform: translateY(-350px);
        }

        100% {
            transform: translateY(0);
        }
    }

    .card {
        &:hover {
            .overlay {
                opacity: 1;
            }

            h2 {
                filter: grayscale(0%);
                animation: slide-top 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) 1s both;
            }

            p {
                filter: grayscale(0%);
                animation: slide-top 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) 2s both;
            }
        }

        &:not(:hover) {
            h2 {
                animation: slide-bottom 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) 1s both;
            }

            p {
                filter: grayscale(100%);
                animation: slide-bottom 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) 1s both;
            }
        }
    }

    .cards {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;

        #double {
            width: calc((100% /1.5) - 2rem);

            p {
                position: absolute;
                bottom: -10rem;
                padding: 1rem 4rem;
                line-height: 1.75;
                color: $yellow;
                font-weight: bold;
            }
        }

        .card {
            display: flex;
            justify-content: center;
            position: relative;
            width: calc((100% /3) - 2rem);
            margin: 0 1rem 2rem;
            overflow: hidden;

            img {
                width: 100%;
                filter: grayscale(0%);
                transition: filter 1s ease, transform 1s ease;
                object-fit: cover;
            }

            &:hover {
                cursor: pointer;

                img {
                    filter: grayscale(100%);
                    transform: scale(1.1);
                }
            }
        }
    }
}

@media screen and (max-width: 1440px) {
    #specializations {

        p {
            bottom: -300px;
        }

        .cards {
            #double {

                p {
                    bottom: -13em;
                    padding: 1rem 4rem;
                }
            }
        }

        @keyframes slide-top {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-285px);
            }
        }

        @keyframes slide-bottom {
            0% {
                transform: translateY(-285px);
            }

            100% {
                transform: translateY(0);
            }
        }
    }
}

@media screen and (max-width: 1200px) {
    #specializations {
        padding: 0 5%;
        margin: 0 auto 0;

        h2 {
            font-size: 1.5rem;
        }
    }
}

@media screen and (max-width: 992px) {
    #specializations {
        padding: 0 5%;
        margin: 0 auto 0;

        h1 {
            text-align: center;
            padding-top: 3rem;
            margin-bottom: 2rem;
            font-size: 1.5rem;
        }

        h2 {
            font-size: 2rem;
        }

        .cards {
            display: flex;
            justify-content: center;

            #double {
                width: calc((85%) - 2rem);
            }

            .card {
                width: calc((85%) - 2rem);
                margin: 0 1rem 2rem;
            }
        }
    }
}

@media screen and (max-width: 768px) {
    #specializations {
        padding: 0 5%;
        margin: 0 auto 0;

        h1 {
            text-align: center;
            padding-top: 3rem;
            margin-bottom: 2rem;
            font-size: 1.5rem;
        }

        h2 {
            font-size: 2rem;
        }

        .cards {
            display: flex;
            justify-content: center;

            #double {
                width: calc((85%) - 2rem);
            }

            .card {
                width: calc((85%) - 2rem);
                margin: 0 1rem 2rem;
            }
        }
    }
}

@media screen and (max-width: 576px) {
    #specializations {
        padding: 0 2.5%;
        margin: 0 auto 0;

        h1 {
            text-align: center;
            padding-top: 2rem;
            margin-bottom: 1rem;
            font-size: 1.35rem;
        }

        .cards {
            display: flex;
            justify-content: center;

            #double {
                width: calc((100%) - 2rem);
            }

            .card {
                width: calc((100%) - 2rem);
                margin: 0 1rem 2rem;
            }
        }
    }
}
</style>