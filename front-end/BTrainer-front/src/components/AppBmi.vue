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
            this.calcValutation(); // Chiamo calcValutation dopo aver calcolato il BMI
        },
        calcValutation() {
            if (this.bmi < 18.5) {
                this.valutation = "SOTTOPESO";
            } else if (this.bmi >= 18.5 && this.bmi < 25) {
                this.valutation = "NORMOPESO";
            } else if (this.bmi >= 25 && this.bmi < 30) {
                this.valutation = "SOVRAPPESO";
            } else {
                this.valutation = "OBESITÀ";
            }
        },
    }, 
}
</script>

<template>
    <section id="bmi">


        <div class="titlebmi">
            <h2>Calcola il tuo BMI!</h2>
        </div>

        <form @submit.prevent="calcBmi"> 
            <input type="number" v-model="height" name="height" id="height" placeholder="Inserisci la tua altezza (cm)" >
            <input type="number" v-model="weight" name="weight" id="weight" placeholder="Inserisci il tuo peso (Kg)"">
            <input type="submit" value="CALC">
        </form>

        <div class="result">

            <h5>Il tuo Bmi è: </h5>
            
            <div class="message">{{ bmi }}</div> 
            <div class="message">{{ valutation }}</div> <!-- Visualizzo la valutation -->
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

        .titlebmi {
            padding: 5px;
            margin: auto;
            width: 25%;

            h2 {
            font-size: 30px;
            text-align: center;
            color: black;
        }
        }

        form {
            margin: auto;
            padding: 30px;
            display: flex;
            justify-content: center;

            input {
                flex-basis: 15%;
                margin-left: 15px;
                height: 30px;
                padding-left: 10px;
            }
        }
        .result {
            margin: auto;
            padding-top: 25px;

                h5 {
                    text-align: center;
                    font-size: 40px;
                }  

            .message {
                font-size: 40px;
                text-align: center;
                font-style: bold;
                padding-top: 15px;
            }
        }
    }
</style>

