<template>
    <header>
        <div class="logo">
            <router-link to="/">
                <img src="../assets/logos/header.svg" alt="" />
            </router-link>
        </div>

        <nav>
            <ul>
                <router-link to="/">
                    <li>Home</li>
                </router-link>
            </ul>
        </nav>

        <div class="header-icons">
            <a href="http://127.0.0.1:8000/login">
                <i class="fa-regular fa-user"></i>
                Accedi
            </a>
            <a href="http://127.0.0.1:8000/register"><i class="fa-solid fa-plus"></i>
                Registrati
            </a>
        </div>
    </header>
</template>

<script></script>

<style lang="scss" scoped>
@use "../styles/partials/mixins" as *;
@use "../styles/partials/variables" as *;

header {
    position: fixed;
    z-index: 1000;
    width: 100%;
    background-color: rgba(0, 0, 0, 0.75);
    height: 120px;
    padding: 0 3rem;
    display: flex;
    justify-content: space-between;
    align-items: center;

    .logo {
        display: flex;
        align-items: center;

        img {
            width: 80%;
            max-height: 120px;
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

    a {
        color: white;
    }

    a:hover {
        color: $yellow;
    }
}

@media screen and (max-width: 992px) {
    header {
        padding: 0 1rem;
        font-size: 1.75rem;

        .header-icons {
            i {
                font-size: 1.85rem;
                margin: 0 1rem;
            }
        }
    }
}

@media screen and (max-width: 576px) {
    header {
        padding: 0 0.5rem;
        font-size: 1.25rem;

        .logo {
            img {
                width: 90%;
            }
        }

        .header-icons {
            display: flex;
            flex-direction: column;

            i {
                font-size: 1.35rem;
                margin: 0 1rem;
            }

            &>* {
                margin: 0.5rem 0;
            }
        }
    }
}
</style>
