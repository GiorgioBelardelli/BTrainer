<template>
    <div class="container">
        <img src="../assets/bg.svg" alt="">
    </div>
</template>

<script>
</script>

<style lang="scss" scoped>
.container {
    img {
        width: 100%;
        display: block;
    }
}

@media all and (max-width: 768px) {
    .container {
        padding-top: 2.25rem;

        img {
            background-size: cover;
            scale: 1.28;

        }
    }

}
</style>