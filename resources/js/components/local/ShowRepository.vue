<template>
    <div>
        <div class="row">
            <div class="col-12 col-md-12 text-center">
                <h3 class="text-center text-primary">Detalhes do Respositório</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <label class="fw-bold text-primary">Linguagem</label>
                <h3 class="px-3">{{ repository.language }}</h3>
                <h4><img v-if="repository.avatar_url" :src="repository.avatar_url" height="40"> {{ repository.name }}</h4>
                <label class="fw-bold text-primary">ID do Repositório</label>
                <h3 class="px-3">{{ repository.repository_id }}</h3>
                <label class="fw-bold text-primary">Nome completo</label>
                <h4 class="px-3">{{ repository.full_name }}</h4>
                <label class="fw-bold text-primary">Descrição</label>
                <p class="px-3">{{ repository.description }}</p>
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
                repository: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/respository/show/${this.$route.params.id}`)
                .then((response) => {
                    this.repository = response.data;
                });
        },
        methods: {
        }
    }
</script>