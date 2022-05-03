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
                    <tr v-for="repository in repositories" :key="repository.id">
                        <td>{{ repository.id }}</td>
                        <td>{{ repository.name }}</td>
                        <td>{{ repository.stargazers_count }}</td>
                        <td>
                            <div class="text-center" role="group">
                                <router-link :to="{name: 'showgit', params: { id: repository.id }}" class="btn btn-primary">+</router-link>
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
    export default {
        data() {
            return {
                repositories: [],
                language: '',
                salvo:false,
            }
        },
        mounted(){
            this.repositories = [];
            this.language = this.$route.params.name;
        },
        created() {
            this.getResults(this.$route.params.page);
        },
        methods: {
            getResults(page=1) {
                this.axios
                    .get(`https://api.github.com/search/repositories?q=${this.$route.params.name}&sort=stars&order=desc&page=${page}&per_page=10`)
                    .then((response) => {
                        this.repositories = response.data.items;
                        console.log(response.data);
                    });
            },
        }
    }
</script>