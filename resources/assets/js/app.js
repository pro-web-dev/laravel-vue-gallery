require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';
window.HTTP = axios.create({
    baseURL: `/`,
});

Vue.use(VueRouter);

import GalleryIndex from './gallery/GalleryIndex.vue';
import GalleryCreate from './gallery/GalleryCreate.vue';
import GalleryShow from './gallery/GalleryShow.vue';
import GalleryEdit from './gallery/GalleryEdit.vue';

const routes = [
    {path: '/', components: {galleryIndex: GalleryIndex}},
    {path: '/gallery/create', component: GalleryCreate, name: 'createGallery'},
    {path: '/gallery/edit/:id', component: GalleryEdit, name: 'editGallery'},
    {path: '/gallery/show/:id', component: GalleryShow, name: 'showGallery'}
];

const router = new VueRouter({ mode: 'history', routes });

const app = new Vue({ router }).$mount('#app');