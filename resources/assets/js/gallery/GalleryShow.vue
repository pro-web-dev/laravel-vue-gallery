<template>
    <div class="container">
        <h1 class="text-center mb-3">Show image</h1>
        <div class="row justify-content-center">
            <div class="col-12 my-2">
                <img :src="getImage()" class="img-thumbnail w-100">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                imageId: null,
                image: {
                    title: '',
                    description: '',
                }
            }
        },
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.imageId = id;
            HTTP.get('api/gallery/' + id)
                .then( (resp) => {
                    app.image = resp.data;
                })
                .catch( (resp) => {
                    alert("Не удалось загрузить задачи " + resp);
                });
        },
        methods: {
            getImage(){
                return this.image.image ? '/' + this.image.image : '/img/no-image.png';
            }
        }
    }
</script>
