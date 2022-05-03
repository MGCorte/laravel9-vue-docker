<template>
    <div>
        <div class="row">
            <div class="col-12 col-md-12 text-center">
                <h3 class="text-center mt-2 text-primary">Detalhes do Respositório</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-md-6 text-center">
                <button v-if="repository_local || salvo" class="btn btn-success mb-2">Repositório Salvo</button>
                <form @submit.prevent="saveItem" method="POST">
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
                    <button v-if="!salvo && !repository_local" type="submit" class="btn btn-warning mb-2">Salvar repositório</button>
                </form>
            </div>
            <div class="col-6 col-md-6 text-center">
                <router-link to="/" class="nav-item btn btn-primary">Voltar ao início</router-link>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label class="fw-bold text-primary">Linguagem</label>
                <h3 class="px-3">{{ repository.language }}</h3>
                <h4 class="px-3"><img alt="Imagem do repositório" v-if="repository.owner.avatar_url" :src="repository.owner.avatar_url" height="40"> {{ repository.name }}</h4>
                <label class="fw-bold text-primary">ID do Repositório</label>
                <h3 class="px-3">{{ repository.id }}</h3>
                <label class="fw-bold text-primary">Nome completo</label>
                <h4 class="px-3">{{ repository.full_name }}</h4>
                <label class="fw-bold text-primary mt-2">Descrição</label>
                <p>{{ repository.description }}</p>
                <label class="fw-bold text-primary">Estrelas</label>
                <p class="px-3">{{ repository.stargazers_count }}</p>
                <label class="fw-bold text-primary">Url do repositório</label>
                <p class="px-3"><a :href="repository.html_url" :title="repository.html_url" target="_blank">{{ repository.html_url }}</a></p>
                <label class="fw-bold text-primary">HomePage do repositório</label>
                <p class="px-3"><a :href="repository.homepage" :title="repository.homepage" target="_blank">{{ repository.homepage }}</a></p>
                <label class="fw-bold text-primary">Tópicos</label>
                <p class="px-3">{{ repository.topics }}</p>
                <label class="fw-bold text-primary">Criado em</label>
                <p class="px-3">{{ repository.created_at }}</p>
                <label class="fw-bold text-primary">Alterado em</label>
                <p class="px-3">{{ repository.updated_at }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <router-link to="/" class="btn btn-primary ">VOLTAR</router-link>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                repository: {},
                repository_local: false,
                salvo:false,
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
                await this.axios
                    .get(`https://api.github.com/repositories/${this.$route.params.id}`)
                    .then((response) => {
                        this.repository = response.data;
                    });
            },
            async getLocal() {
                await this.axios
                    .get(`http://localhost:8000/api/respository/showgit/${this.$route.params.id}`)
                    .then((response) => {
                        this.repository_local = response.data.length > 0 ? true : false;
                    });
            },
            /**
             * salva na base local os dados encontrados no gitHub
             */
            saveItem() {
                this.axios
                    .post(`http://localhost:8000/api/respository/store`, this.repository)
                    .then(response => {
                        this.salvo = true;
                    })
                    .catch(err => {
                        console.log(err);
                    });
            }
        }
    }
</script>