<template>
    <div>
        <div class="row">
            <div class="col-12 col-md-12 text-center">
                <h3 class="text-center text-primary">Detalhes do Respositório</h3>
            </div>
        </div>
        <div v-if="loading" class="row mt-5">
            <div class="col-md-12 text-center">
                <loading></loading>
            </div>
        </div>
        <div v-else class="row">
            <div class="col-md-12">
                <h3 class="mb-3">Linguagem: {{ repository.language }}</h3>
                <h4 class="mb-3">
                    <img v-if="repository.avatar_url" :src="repository.avatar_url" height="40">
                    {{ repository.name }}
                </h4>
                <ul class="list-content text-break">
                    <li>
                        <strong>ID do Repositório:</strong>
                        {{ repository.repository_id }}</li>
                    <li>
                        <strong>Nome completo:</strong> {{ repository.full_name }}</li>
                    <li>Estrelas: {{ repository.stargazers_count }}</li>
                    <li>
                        <strong>Url do repositório:</strong>
                        <a :href="repository.html_url" :title="repository.html_url" target="_blank">
                            {{ repository.html_url }}
                        </a>
                    </li>
                    <li>
                        <strong>Tópicos</strong>
                        <p class="text-break">
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
                loading: false
            }
        },
        created() {
            this.loading = true;
            this.axios
                .get(`http://localhost:8000/api/respository/show/${this.$route.params.id}`)
                .then((response) => {
                    this.repository = response.data;
                    this.loading = false;
                });
        },
        methods: {
        }
    }
</script>
