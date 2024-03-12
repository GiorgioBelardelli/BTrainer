<template>
    <header>
        <div class="logo">
            <img src="../assets/logos/header.svg" alt="">
        </div>
    
        <nav>
            <ul>
                <router-link to="/"><li>Home</li></router-link>
                <router-link to="/about"><li>About</li></router-link>
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
    position: fixed;
    width: 100%;
    background-color: rgba(0, 0, 0, .6);
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