<template>
    <div>
        <div class="row">
            <div class="col-md-12 text-center mt-2">
                <h3 class="text-uppercase text-primary">{{language}}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center mt-2">
                <router-link to="/" class="nav-item btn btn-primary">Retornar a página inicial</router-link>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-2">
                <h4 class="text-center">Repositorios encontrados no GitHub</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-2 text-center">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>stars</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-show="loading">
                            <td colspan="4">
                                <loading></loading>
                            </td>
                        </tr>
                        <tr v-for="repository in repositories" :key="repository.id">
                            <td>{{ repository.id }}</td>
                            <td>{{ repository.name }}</td>
                            <td>{{ repository.stargazers_count }}</td>
                            <td>
                                <div class="text-center" role="group">
                                    <router-link :to="{name: 'showgit', params: { id: repository.id }}" class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <title>Visualizar detalhes</title>
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                        </svg>
                                    </router-link>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    import Loading from "../Loading";
    export default {
        components: {Loading},
        data() {
            return {
                repositories: [],
                language: '',
                salvo:false,
                loading: false
            }
        },
        mounted(){
            this.repositories = [];
            this.language = this.$route.params.name;
        },
        created() {
            this.loading = true;
            this.getResults(this.$route.params.page);
        },
        methods: {
            getResults(page=1) {
                this.axios
                    .get(`https://api.github.com/search/repositories?q=${this.$route.params.name}&sort=stars&order=desc&page=${page}&per_page=10`)
                    .then((response) => {
                        this.repositories = response.data.items;
                        this.loading = false;
                    });
            },
        }
    }
</script>
