<template>
    <div class="wrapper">
        <input type="text" id="dynamic-label-input" list="newsList" v-model="search">
        <button
            @click="getNews"
            class="searchButton">
            >
            <span class="icon"><i class="fa fa-envelope" ></i></span>
        </button>
        <dataList id="newsList" size="3">
            <option v-for="news in filteredNews" :key="news.id"
                    v-bind:value="news.title">
                {{ news.name }}
            </option>
        </dataList>
    </div>
</template>
<script>

export default {
    name: "SelectNews",
    data() {
        return {
            search: '',
            filteredNews: []
        }
    },
    watch: {
        search: function (tat) {
            if (this.search.length > 3) {
                this.selectNews(this.search);
            }
        }
    },
    methods: {
        getNews() {
            this.$emit('input', JSON.stringify(this.search));
        },
        selectNews(str) {
            this.axios.get('/news/searchtitle?str=' + str)
                .then(response => {
                    this.filteredNews = response.data;
                }).catch(function (error) {
                    console.log(error)
            });
        }
    },
}
</script>

<style scoped>
@import url(https://fonts.googleapis.com/css?family=Open+Sans);

body {
    background: #f2f2f2;
    font-family: 'Open Sans', sans-serif;
}
.searchButton {
    width: 40px;
    height: 36px;
    border: 1px solid #00B4CC;
    background: #00B4CC;
    text-align: center;
    color: #fff;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
    font-size: 20px;
}
input {
    width: 450px;
    font-size: 13px;
    padding: 6px 0 4px 10px;
    border: 1px solid #cecece;
    background: #F6F6f6;
    border-radius: 8px;
}
input:focus {
    outline: none;
}
button.icon {
    position:relative;
    top: 2px;
    display: inline-block;
    width: 25px;
    color: #9c27b0;
    vertical-align: top;
}
</style>
