<script>
</script>

<template>
    <div class="container">
        <h1>Specializations</h1>
        <div class="cards">
            <div class="card" id="double">
                <img src="../assets/specializations/bb.png" alt="">
                <h2 class="slide-right">Bodybuilding</h2>
            </div>
            <div class="card">
                <img src="../assets/specializations/crossfit.png" alt="">
            </div>
            <div class="card">
                <img src="../assets/specializations/cali.png" alt="">
            </div>
            <div class="card" id="double">
                <img src="../assets/specializations/hi-training.png" alt="">
            </div>
            <div class="card">
                <img src="https://picsum.photos/200/300?random=3" alt="">
            </div>
            <div class="card">
                <img src="https://picsum.photos/200/300?random=1" alt="">
            </div>
            <div class="card">
                <img src="https://picsum.photos/200/300?random=2" alt="">
            </div>
            <div class="card">
                <img src="https://picsum.photos/200/300?random=3" alt="">
            </div>
            <div class="card">
                <img src="https://picsum.photos/200/300?random=2" alt="">
            </div>
            <div class="card">
                <img src="https://picsum.photos/200/300?random=3" alt="">
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@use '../styles/partials/mixins' as *;
@use '../styles/partials/variables' as *;

.container {
    width: 80%;
    margin: 0 auto;

    h1 {
        text-align: center;
        margin-bottom: 3rem;
        color: $yellow;
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
            transform: translateX(-50%);
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
            transform: translateX(-50%);
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
</style>