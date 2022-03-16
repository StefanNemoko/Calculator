<template>
        <p>{{button}}</p>
</template>

<script>
export default {
    props: {
        button: {
            type: String,
            required: true
        },
        bgcolor: {
            type: String,
            required: false,
            default: "#36454F"
        },
        hoverbg: {
            type: String,
            required: false,
            default: "#556977"
        }
    }
}
</script>

<style scoped>
    p{
        text-align: center;
        display: inline-block;
        background-color: v-bind(bgcolor);
        margin-left: 10px;
        border-radius: 50%;
        font-size: 2em;
        width: 50px;
        user-select: none;
        -moz-user-select: none;
        -webkit-user-select: none;
    }
    p:hover{
        cursor: pointer;
        background-color: v-bind(hoverbg);
        transition: 1s;
    }
</style>