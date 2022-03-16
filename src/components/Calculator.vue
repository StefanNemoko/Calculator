<script setup>
    import Button from './calculator/Button.vue'
</script>
<template>
    <div class="row" id="screen">
        <p>0</p>
    </div>
    <div class="row">
        <Button button="AC" bgcolor="#787878" hoverbg="#b8b8b8" @click="reset(true)"/>
        <Button button="C" bgcolor="#787878" hoverbg="#b8b8b8" @click="reset(false)"/>
        <Button button="±" bgcolor="#787878" hoverbg="#b8b8b8" @click="plusminus"/>
        <Button button="%" bgcolor="#787878" hoverbg="#b8b8b8" @click="operator('%')"/>
    </div>
    <div class="row">
        <Button button="7" @click="addNumber('7')"/>
        <Button button="8" @click="addNumber('8')"/>
        <Button button="9" @click="addNumber('9')"/>
        <Button button="/" bgcolor="#FFA500" hoverbg="#ffbf47" @click="operator('/')"/>
    </div>
    <div class="row">
        <Button button="4" @click="addNumber('4')"/>
        <Button button="5" @click="addNumber('5')"/>
        <Button button="6" @click="addNumber('6')"/>
        <Button button="X" bgcolor="#FFA500" hoverbg="#ffbf47" @click="operator('*')"/>
    </div>
    <div class="row">
        <Button button="1" @click="addNumber('1')"/>
        <Button button="2" @click="addNumber('2')"/>
        <Button button="3" @click="addNumber('3')"/>
        <Button button="-" bgcolor="#FFA500" hoverbg="#ffbf47" @click="operator('-')"/>
    </div>
    <div class="row">
        <Button button="0" @click="addNumber('0')"/>
        <Button button="." @click="addNumber('.')"/>
        <Button button="=" bgcolor="#FFA500" hoverbg="#ffbf47" @click="calculate"/>
        <Button button="+" bgcolor="#FFA500" hoverbg="#ffbf47" @click="operator('+')"/>
    </div>
</template>

<style scoped>
    div{
        background-color: rgba(0, 0, 0, .8);
        color: white;
        padding-left: 20px;
    }
    div:nth-child(1){
        height: 100px;
        border-radius: 12,5%;
        padding-top: 10px;
        background-color: grey;
    }
    div:nth-child(2){
        padding-top: 20px;
    }
    div:nth-child(6){
        padding-bottom: 20px;
    }
</style>

<script>
var n=[];
var o=[];
var v="";

export default {
    methods: {
        plusminus(){
            if($("#screen p").text().includes("-")){
                $("#screen p").text().replace("-", "");
            }else{
                $("#screen p").prepend("-");
            }
        },
        addNumber(v){
            if($("#screen p").text() == 0){
                if($("#screen p").text().includes("-")){
                    $("#screen p").text("-" + v);
                }else{
                    $("#screen p").text(v);
                }
            }else{
                $("#screen p").append(v);
            }
        },
        operator(v){
            n.push($("#screen p").text());
            o.push(v);

            //reset screen
            this.reset(false);
        },
        reset(hard){
            // reset whole calculation
            if(hard){
                n=[];
                o=[];
                v = "";
            }
            $("#screen p").text("0");
        },
        calculate(){
            this.operator("=");
            v = "";
            n.forEach(function (e, i){
                if(n.length - 1 !== i){
                    v += e + " " + o[i] + " ";
                }else{
                    v += e;
                }
            });
            n = [];
            o = [];
            $("#screen p").text(eval(v));
            v="";
        }

    }
}
</script>


