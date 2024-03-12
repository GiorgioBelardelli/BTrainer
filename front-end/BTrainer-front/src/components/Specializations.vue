<script>
</script>

<template>
    <div class="container">
        <h1>Specializations</h1>
        <div class="cards">
            <div class="card" id="double">
                <img src="../assets/specializations/bb.png" alt="">
                <div class="logo">
                    <img src="../assets/logos/specializations/bb.png" alt="">
                </div>
            </div>
            <div class="card">
                <img src="../assets/specializations/crossfit.png" alt="">
                <div class="logo">
                    <img src="../assets/logos/specializations/crossfit.png" alt="">
                </div>
            </div>
            <div class="card">
                <img src="../assets/specializations/cali.png" alt="">
                <div class="logo">
                    <img src="../assets/logos/specializations/cali.png" alt="">
                </div>
            </div>
            <div class="card" id="double">
                <img src="../assets/specializations/hi-training.png" alt="">
                <div class="logo">
                    <img src="../assets/logos/specializations/hi-training.png" alt="">
                </div>
            </div>
            <div class="card">
                <img src="https://picsum.photos/200/300?random=3" alt="">
                <div class="logo">
                    <img src="../assets/logos/specializations/kick.png" alt="">
                </div>
            </div>
            <div class="card">
                <img src="https://picsum.photos/200/300?random=1" alt="">
                <div class="logo">
                    <img src="../assets/logos/specializations/pd.png" alt="">
                </div>
            </div>
            <div class="card">
                <img src="https://picsum.photos/200/300?random=2" alt="">
                <div class="logo">
                    <img src="../assets/logos/specializations/pilates.png" alt="">
                </div>
            </div>
            <div class="card">
                <img src="https://picsum.photos/200/300?random=3" alt="">
                <div class="logo">
                    <img src="../assets/logos/specializations/pl.png" alt="">
                </div>
            </div>
            <div class="card">
                <img src="https://picsum.photos/200/300?random=2" alt="">
                <div class="logo">
                    <img src="../assets/logos/specializations/post.png" alt="">
                </div>
            </div>
            <div class="card">
                <img src="https://picsum.photos/200/300?random=3" alt="">
                <div class="logo">
                    <img src="../assets/logos/specializations/yoga.png" alt="">
                </div>
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

            img {
                width: 100%;
                filter: grayscale(100%);
                transition: filter 1s ease;
                object-fit: cover;
                border-radius: 10px;
            }

            &:hover {
                cursor: pointer;
                img {
                    filter: grayscale(0%);
                }
            }
            
            .logo {
                position: absolute;
                border-radius: 50%;
                z-index: 50;
                bottom: 1rem;
                left: 1rem;

                img {
                    width: 20%;
                }
            } 
        }
    }
}
</style>