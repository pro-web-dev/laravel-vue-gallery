<template>
<div class="container">
        <h1 class="text-center mb-3">My Gallery</h1>
        <div class="row">
            <div class="col-lg-4 col-sm-6 my-2" v-for="(image, index) in images" :key="index">
                <div class="box">
                    <router-link :to="{name: 'showGallery', params: {id: image.id}}">
                        <img src="" class="img-thumbnail">
                    </router-link>
                    <router-link :to="{name: 'showGallery', params: {id: image.id}}" class="btn btn-info">
                        Show <i class="fa fa-eye"></i>
                    </router-link>
                    <router-link :to="{name: 'editGallery', params: {id: image.id}}" class="btn btn-warning">
                        Edit <i class="fa fa-edit"></i>
                    </router-link>
                    <router-link :to="{name: 'showGallery', params: {id: image.id}}" class="fa fa-eye mr-3">
                        View
                    </router-link>
                    <a href="#" class="btn btn-danger" @click="deleteEntry(image.id, index)">
                        Delete <i class="fa fa-remove"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                images: []
            }
        },
        mounted() {
            var app = this;
            HTTP.get('image')
                .then( (resp) => {
                    app.images = resp.data;
                })
                .catch( (resp) => {
                    alert("Не удалось загрузить");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Вы действительно хотите удалить?")) {
                    let app = this;
                    HTTP.delete('image/' + id)
                        .then( (resp) => {
                            app.images.splice(index, 1);
                        })
                        .catch( (resp) => {
                            alert("Не удалось удалить!");
                        });
                }
            }
        }
    }
</script>
