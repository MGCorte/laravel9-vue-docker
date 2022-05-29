<template>
    <div>
        <header>
            <div class="row m-0 mb-2 bg-light p-0 pt-2 pb-2">
                <div class="col-3 col-xs-3 col-md-1 text-center">
                    <a href="/">
                        <img height="40" src="/storage/images/logo-github.png" alt="">
                    </a>
                </div>
                <div class="col-9 col-xs-9 col-md-9 text-left pt-1">
                    <h4 class="text-secondary">Repositórios GitHub</h4>
                </div>
            </div>
        </header>
        <main id="content" class="container" role="main">
            <div class="mb-2">
                <router-view></router-view>
            </div>
        </main>
        <footer class="bg-light p-3 text-center">
            Criado por Marcelo Giovani Corte
        </footer>
    </div>
</template>

<script>
    export default {}
</script>
