<script>
export default {
    name: "AppBmi",

    data() {
        return {
            height: '',
            weight: '',
            bmi: '', 
            valutation: '',
        };
    },

    methods: {
        calcBmi() {
            const height = parseFloat(this.height);
            const weight = parseFloat(this.weight);
            this.bmi = weight / ((height / 100) * (height / 100)); 
            console.log(this.bmi);
        },
        // calcValutation () {
        //     if (this.bmi < 18.5 valutation = "SOTTOPESO"),
        //     if else (this.bmi < 18.5 valutation = "NORMOPESO"),
        //     if else
        // },
    }, 
}
</script>

<template>
    <section id="bmi">
        <h2>Calculate your BMI!</h2>

        <form @submit.prevent="calcBmi"> 
            <input type="number" v-model="height" name="height" id="height" placeholder="Enter your height (cm)" >
            <input type="number" v-model="weight" name="weight" id="weight" placeholder="Enter your weight (Kg)">
            <input type="submit" value="CALC">
        </form>
        <div class="result">
            <h5>Il tuo Bmi è: </h5>
            <div class="message">{{ bmi }}</div> 
        </div>

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
            padding: 30px;
            display: flex;
            justify-content: center;


            input {
                flex-basis: 15%;
            }

        }
        .result {
            margin: auto;
            padding-top: 50px;

            h5 {
                text-align: center;
                font-size: 45px;
            }   

            .message {
                font-size: 55px;
                text-align: center;
                font-style: bold;
                padding-top: 15px;
            }
        }
    }

</style>
