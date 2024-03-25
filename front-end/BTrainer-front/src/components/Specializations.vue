<script>
</script>

<template>
    <section id="specializations">
        <h1>SCEGLI UNA SPECIALIZZAZIONE</h1>
        <div class="cards">
            <div class="card" id="double">
                <img src="../assets/specializations/bb.png" alt="">
                <h2 class="slide-right">Bodybuilding</h2>
            </div>
            <div class="card">
                <img src="../assets/specializations/crossfit.png" alt="">
                <h2 class="slide-right">Calisthenics</h2>
            </div>
            <div class="card">
                <img src="../assets/specializations/cali.png" alt="">
                <h2 class="slide-right">CrossFit</h2>
            </div>
            <div class="card" id="double">
                <img src="../assets/specializations/hi-training.png" alt="">
                <h2 class="slide-right">High-Intensity Interval Training</h2>
            </div>
            <div class="card" id="double">
                <img src="../assets/specializations/pl.png" alt="">
                <h2 class="slide-right">PowerLifting</h2>
            </div>
            <div class="card">
                <img src="../assets/specializations/yoga.png" alt="">
                <h2 class="slide-right">Yoga</h2>
            </div>
            <div class="card">
                <img src="../assets/specializations/post.png" alt="">
                <h2 class="slide-right">Recupero post-infortunio</h2>
            </div>
            <div class="card" id="double">
                <img src="../assets/specializations/kick.png" alt="">
                <h2 class="slide-right">Kickboxing</h2>
            </div>
            <div class="card" id="double">
                <img src="../assets/specializations/pilates.png" alt="">
                <h2 class="slide-right">Pilates</h2>
            </div>
            <div class="card">
                <img src="../assets/specializations/personal.png" alt="">
                <h2 class="slide-right">Difesa Personale</h2>
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
    background-color: rgb(37, 37, 37);

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
    }

    @keyframes slide-right {
        0% {
            transform: translateX(-10%);
        }

        100% {
            transform: translateX(0);
        }
    }

    @keyframes slide-right-exit {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-10%);
        }
    }

    .card {
        &:hover {
            h2 {
                filter: grayscale(0%);
                animation: slide-right 0.85s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
            }
        }

        &:not(:hover) h2 {
            animation: slide-right-exit 0.85s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }
    }

    .cards {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;

        #double {
            width: calc((100% /1.5) - 2rem);
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
                filter: grayscale(100%);
                transition: filter 1s ease, transform 1s ease;
                object-fit: cover;
            }

            &:hover {
                cursor: pointer;

                img {
                    filter: grayscale(0%);
                    transform: scale(1.1);
                }
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