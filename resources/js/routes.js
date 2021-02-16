import News from './components/News.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: News
    },
    {
        name: 'news',
        path: '/news',
        component: News
    },
];
