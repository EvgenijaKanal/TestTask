
<!--<template>-->
<!--&lt;!&ndash;    <app-component :data='@json($data)' />&ndash;&gt;-->
<!--    <div class="wrapper" >-->
<!--        <div class="card" v-for="item in groceryList"-->
<!--             v-bind:todo="item"-->
<!--             v-bind:key="item.id"-->
<!--        >-->
<!--            <h3 class="card-title">CARD TITLE{{message}}</h3>-->
<!--            <figure>-->
<!--                <img src="https:\/\/g2.delphi.lv\/images\/pix\/420x0\/29C7_p6kfII\/astrazeneca-52879199.jpg"-->
<!--                     class="responsive"-->
<!--                     alt="Elephant at sunset">-->
<!--                <figcaption>An elephant at sunset</figcaption>-->
<!--            </figure>-->
<!--            <p class="card-content">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>-->
<!--            <button class="card-btn">READ MORE</button>-->
<!--        </div>-->
<!--    </div>-->
<!--</template>-->
<!--<script>-->
<!--import VueRecaptcha from 'vue-recaptcha';-->
<!--const default_layout = "default";-->
<!--import axios from 'axios';-->

<!--export default {-->

<!--    name: 'AppComponent',-->
<!--    props: ['data'],-->
<!--    computed: {-->
<!--    },-->
<!--    data() {-->
<!--        return {-->
<!--            news: [],-->
<!--            message:'Hello World',-->
<!--            groceryList: [-->
<!--                { id: 0, text: 'Овощи' },-->
<!--                { id: 1, text: 'Сыр' },-->
<!--                { id: 2, text: 'Что там ещё люди едят?' }-->
<!--            ]-->

<!--        }-->
<!--    },-->
<!--    methods: {-->
<!--        loadUsers() {-->
<!--            console.log(axios.get('/news'));-->
<!--            const  data  =  axios.get('/news');-->
<!--            console.log('ttt',JSON.parse(data.data));-->
<!--            // this.news = data;-->
<!--            // console.log(this.news);-->
<!--        }-->
<!--    },-->
<!--    beforeMount() {-->
<!--         this.loadUsers();-->
<!--    }-->

<!--};-->
<!--</script>-->
