<template>
    <div>
        <div class="row">
            <div class="col-md-12 text-center mb-3">
                <h5>Escolha uma das linguagens para exibir seus repositórios no GitHub</h5>
                <router-link to="/git/list/php" class="btn btn-primary mb-2">PHP</router-link>
                <router-link to="/git/list/javascript" class="btn btn-dark mb-2">JAVASCRIPT</router-link>
                <router-link to="/git/list/typescript" class="btn btn-success mb-2">TYPESCRIPT</router-link>
                <router-link to="/git/list/pyton" class="btn btn-danger mb-2">PYTON</router-link>
                <router-link to="/git/list/java" class="btn btn-info mb-2">JAVA</router-link>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-2 text-center">
                <h3 class="text-center">Lista de Repositorios salvos</h3>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Linguagem</th>
                            <th>Avaliação</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-show="loading">
                            <td colspan="4">
                                <loading></loading>
                            </td>
                        </tr>
                        <tr v-if="!repositories.length">
                            <td colspan="4">
                                <h6>Não esistem repositóris salvos na base local</h6>
                            </td>
                        </tr>
                        <tr v-else v-for="repository in repositories" :key="repository.id">
                            <td>{{ repository.name }}</td>
                            <td class="text-primary">{{ repository.language }}</td>
                            <td>{{ repository.stargazers_count }}</td>
                            <td>
                                <!-- Example single danger button -->
                                <div class="btn-group dropleft">
                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-left">
                                        <li class="p-1">
                                            <router-link :to="{name: 'show', params: { id: repository.id }}"
                                                         class="dropdown-item bg-primary text-white">
                                                Ver detalhes
                                            </router-link>
                                        </li>
                                        <li class="p-1">
                                            <button class="dropdown-item bg-danger text-white"
                                                    @click="deletePost(repository.id)">
                                                Excluir
                                            </button>
                                        </li>
                                    </ul>
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
                loading: false
            }
        },
        created() {
            this.loading = true;
            this.axios
                .get('http://localhost:8000/api/repositories')
                .then(response => {
                    this.repositories = response.data;
                    this.loading = false;
                });
        },
        methods: {
            deletePost(id) {
                this.loading = true;
                this.axios
                    .delete(`http://localhost:8000/api/respository/delete/${id}`)
                    .then(response => {
                        let i = this.repositories.map(item => item.id).indexOf(id); // find index of object
                        this.repositories.splice(i, 1);
                        this.loading = false;
                    });
            }
        }
    }
</script>
