<template>
    <header>
        <div class="logo">
            <img src="../assets/logos/header.svg" alt="">
        </div>
    
        <nav>
            <ul>
                <a href=""><li>Home</li></a>
                <a href=""><li>Test</li></a>
                <a href=""><li>Test</li></a>
                <a href=""><li>Test</li></a>
            </ul>
        </nav>
    
        <div class="header-icons">
            <a href=""><i class="fa-regular fa-user"></i></a>
            <a href=""><i class="fa-solid fa-plus"></i></a>
        </div>
    </header>
</template>

<script>
</script>

<style lang="scss" scoped>
@use '../styles/partials/mixins' as *;
@use '../styles/partials/variables' as *;

header {
    background-color: #000;
    height: 120px;
    padding: 0 3rem;
    display: flex;
    justify-content: space-between;
    align-items: center;

    .logo {
        height: 100%;
        img {
            height: 100%;
        }
    }

    nav {
        color: $lightgrey;
        ul {
            display: flex;
            justify-content: space-between;
            li {
                margin: 0 1.25rem;
            }
        }
    }

    .header-icons {
        i {
            color: $yellow;
            margin: 0 1.25rem;
        }
    }
}
</style>