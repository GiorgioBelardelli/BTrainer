<script>
import axios from "axios";

export default {
    name: "AppTrainerGallery",
    data() {
        return {
            users: [],
            profiles: [],
            specializations: [],
        };
    },

    mounted() {
        axios
            .get("http://localhost:8000/api/v1/projects")
            .then((res) => {
                const data = res.data;
                if (data.status === "success") this.projects = data.projects;

                console.log("project: ", this.project);
            })
            .catch((err) => {
                console.err(err);
            });
    },
};
</script>

<template>
    <div class="container">
        <h1></h1>
    </div>
</template>

<style lang="scss" scoped>
.container {
    padding-top: 120px;
    height: 800px;
}
</style>
