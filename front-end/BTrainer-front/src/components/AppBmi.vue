<script>
export default {
    name: "AppBmi",

    methods: {
        calcBmi(height, weight) {
            const bmi = weight / ((height / 100) * (height / 100));
            console.log(bmi);
            return bmi;
        },
    }, 
}
</script>

<template>
    <section id="bmi">
        <h2>Calculate your BMI!</h2>
        <form action="get">
            <input type="number" name="heigth" id="heigth" placeholder="Enter your height (cm)" >
            <input type="number" name="weight" id="weigth" placeholder="Enter your weight (Kg)">
            <input type="submit" value="CALC">
        </form>
        <span>Il tuo Bmi è: </span>
        <span class="message"></span>
    </section>
</template>

<style lang="scss" scoped>
    @use '../styles/partials/variables' as *;

    #bmi {
        width: 100%;
        height: 400px;
        padding: 50px;
        background-image: url(../assets/bmi-wallpaper.jpeg);
        filter: grayscale(100%);

        h2 {
            font-size: 30px;
            text-align: center;
        }
        form {
            margin: auto;
            display: flex;
            justify-content: center;


            input {
                flex-basis: 30%;
            }

        }
    }

</style>
