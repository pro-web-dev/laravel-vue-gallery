<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <h1>Edit Image</h1>
                <img :src="getImage" class="img-thumbnail w-100">
                <form @submit.prevent="submitForm">
                    <input type="file" name="image" class="form-control my-3" @change="addFile()">
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                files: {},
                file: {},

                imageObj: {},
                imageId: {},

                formData: {},
                attachment: '',

                message: '',
                errors: {}
            }
        },
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.imageId = id;
            HTTP.get('api/gallery/' + id)
                .then((resp) => {
                    app.imageObj = resp.data;
                })
                .catch(() => {
                    alert("Не удалось загрузить задачу");
                });
        },
        methods: {
            submitForm() {
                console.log(this.formData);
                this.formData = new FormData();
                this.formData.append('file', this.attachment);

                HTTP.patch('api/gallery/', this.formData, {headers: {'Content-Type': 'multipart/form-data'}})
                    .then(response => {
                        app.$router.replace('/');
                    })
                    .catch(error => {
                        alert(error.response.data.errors);
                        this.errors = error.response.data.errors;
                    });
            },

            addFile() {
                this.attachment = this.$refs.file.files[0];
            },
        },
        computed: {
            getImage(){
                return this.imageObj.image ? '/' + this.imageObj.image : '/img/no-image.png';
            }
        }
    }
</script>
