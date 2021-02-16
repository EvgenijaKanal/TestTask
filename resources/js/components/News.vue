<template>
    <div>
        <SelectNews @input="searchToString"/>

        <div class="wrapper">
            <div class="card" v-for="news in listNews.data" :key="news.id">
                <h3 class="card-title">{{ news.title }}</h3>
                <figure>
                    <img :src="news.imageUrl"
                         class="responsive">
                    <figcaption></figcaption>
                </figure>
                <p class="card-content">{{ news.description }}</p>
                <button class="card-btn" @click="toFullNews(news.newsUrl)">Перейти</button>
            </div>
        </div>

        <div class="wrapper">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div>
                        <div class="card-body">
                            <pagination :data="listNews" @pagination-change-page="loadNews"></pagination>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>


const default_layout = "default";
import SelectNews from "./SelectNews";

export default {
    name: 'News',
    components: {
        SelectNews
    },
    data() {
        return {
            fullNewsLinc: '',
            search: undefined,
            listNews: {},

        }
    },
    mounted() {
        this.loadNews();
    },
    methods: {
        searchToString(search) {
            this.search = search;
            this.loadNews();
        },
        loadNews(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }

            var url = '/news?page=' + page;
            if (typeof this.search != 'undefined') {
                url = '/news?page=' + page + '&str=' + this.search;
            }

            this.axios.get(url)
                .then((response) => {
                    this.listNews = response.data;
                })
                .catch(function (error) {
                    console.log(error)
                });
        },
        loadBySearch(str) {
            this.axios.get('/news/search?str=' + str)
                .then(response => {
                    this.listNews = response.data;
                }).catch(function (error) {
                    console.log(error)
            });
        },
        toFullNews(link) {
            window.location = link;
        },
    }
};

function updateNewsList() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', window.location + 'system/cronWorkImitation', true);
    xhr.send();
    console.log(xhr);
}
setTimeout(function () {
    updateNewsList();
     window.location.reload();
}, 5 * 60 * 1000);


</script>
