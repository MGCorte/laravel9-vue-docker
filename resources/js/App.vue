<template>
    <div class="container">
        <div class="row mt-2 mb-2 bg-light p-2">
            <div class="col-3 col-xs-3 col-md-1">
                <a href="/">
                    <img height="40" src="storage/images/logo-github.png" alt="">
                </a>
            </div>
            <div class="col-9 col-xs-9 col-md-11 text-left">
                <h4 class="text-secondary">Repositórios GitHub</h4>
            </div>
        </div>
        <div class="mb-5">
            <router-view></router-view>
        </div>
        
    </div>
</template>
 
<script>
    export default {}
</script>