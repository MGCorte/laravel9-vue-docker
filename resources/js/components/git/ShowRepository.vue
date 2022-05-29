<template>
    <div>
        <div class="row">
            <div class="col-12 col-md-12 text-center">
                <h3 class="text-center mt-2 text-primary">Detalhes do Respositório</h3>
            </div>
        </div>
        <div v-if="loading" class="row mt-5">
            <div class="col-md-12 text-center">
                <loading></loading>
            </div>
        </div>
        <div class="row" v-else>
            <div class="col-12 col-xs-12 col-md-12 text-left">
                <button v-if="repository_local || save" class="btn btn-success mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                        <title>Salvo na base local</title>
                        <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                        <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                    </svg>
                    Salvo na base local
                </button>
                <form v-if="!save && !repository_local" @submit.prevent="saveItem" method="POST">
                    <input type="text" class="d-none" v-model="repository.id">
                    <input type="text" class="d-none" v-model="repository.name">
                    <input type="text" class="d-none" v-model="repository.description">
                    <input type="text" class="d-none" v-model="repository.owner.avatar_url">
                    <input type="text" class="d-none" v-model="repository.full_name">
                    <input type="text" class="d-none" v-model="repository.stargazers_count">
                    <input type="text" class="d-none" v-model="repository.html_url">
                    <input type="text" class="d-none" v-model="repository.homepage">
                    <input type="text" class="d-none" v-model="repository.language">
                    <input type="text" class="d-none" v-model="repository.topics">
                    <input type="text" class="d-none" v-model="repository.created_at">
                    <input type="text" class="d-none" v-model="repository.updated_at">
                    <button type="submit" class="btn btn-warning mb-2">
                        <span v-show="saving" class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save2-fill" viewBox="0 0 16 16">
                            <title>Salvar na balse local</title>
                            <path d="M8.5 1.5A1.5 1.5 0 0 1 10 0h4a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h6c-.314.418-.5.937-.5 1.5v6h-2a.5.5 0 0 0-.354.854l2.5 2.5a.5.5 0 0 0 .708 0l2.5-2.5A.5.5 0 0 0 10.5 7.5h-2v-6z"/>
                        </svg>
                        Salvar na balse local
                    </button>
                </form>
            </div>
<!--            <div class="col-6 col-md-6 text-center">-->
<!--                <router-link to="/" class="nav-item btn btn-primary">Voltar ao início</router-link>-->
<!--            </div>-->
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="mb-3">Linguagem: {{ repository.language }}</h3>
                <h4 class="mb-3">
                    <img alt="Imagem do repositório" v-if="repository.owner.avatar_url" :src="repository.owner.avatar_url" height="40">
                    {{ repository.name }}
                </h4>
                <ul class="list-content text-break">
                    <li>
                        <strong>ID do Repositório:</strong>
                        {{ repository.id }}</li>
                    <li>
                        <strong>Nome completo:</strong> {{ repository.full_name }}
                    </li>
                    <li><strong> Estrelas:</strong> {{ repository.stargazers_count }}</li>
                    <li>
                        <strong>Url do repositório:</strong>
                        <a :href="repository.html_url" :title="repository.html_url" target="_blank">
                            {{ repository.html_url }}
                        </a>
                    </li>
                    <li>
                        <strong>Tópicos</strong>
                        <p>
                            {{ (repository.topics) }}
                        </p>
                    </li>
                    <li>
                        <strong>HomePage do repositório</strong>
                        <p>
                            <a :href="repository.homepage" :title="repository.homepage" target="_blank">
                                {{ repository.homepage }}
                            </a>
                        </p>
                    </li>
                    <li>
                        <strong>Criado em:</strong> {{ repository.created_at }}
                    </li>
                    <li>
                        <strong>Alterado em:</strong> {{ repository.updated_at }}
                    </li>
                </ul>
                <h5>Descrição</h5>
                <p>{{ repository.description }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <button @click="$router.go(-1)" class="btn btn-primary">Voltar</button>
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
                repository: {},
                repository_local: false,
                save:false,
                saving: false,
                loading: false
            }
        },
        created() {
            /**
             * busca dados no gitHub conforme repository_id informado
            */
           this.getdados();
            /**
             * busca dados no repositorio local comparando repository_id
            */
            this.getLocal();
        },
        methods: {
            async getdados() {
                this.loading = true;
                await this.axios
                    .get(`https://api.github.com/repositories/${this.$route.params.id}`)
                    .then((response) => {
                        this.repository = response.data;
                        this.loading = false;
                    });
            },
            async getLocal() {
                this.loading = true;
                await this.axios
                    .get(`http://localhost:8000/api/respository/showgit/${this.$route.params.id}`)
                    .then((response) => {
                        this.repository_local = response.data.length > 0 ? true : false;
                        this.loading = false;
                    });
            },
            /**
             * salva na base local os dados encontrados no gitHub
             */
            saveItem() {
                this.saving = true;
                this.axios
                    .post(`http://localhost:8000/api/respository/store`, this.repository)
                    .then(response => {
                        this.save = true;
                        this.saving = false;
                    })
                    .catch(err => {
                        console.log(err);
                        this.saving = false;
                    });
            }
        }
    }
</script>
