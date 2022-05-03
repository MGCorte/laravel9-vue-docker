/**
 * localrepositories
 */
import ListRepositories from './components/local/ListRepositories.vue';
import ShowRepository from './components/local/ShowRepository.vue';

/**
 * git repositories
*/
import ListNameRepositoryGit from './components/git/ListNameRepository.vue';
import ShowRepositoryGit from './components/git/ShowRepository.vue';
 
export const routes = [
    {
        name: 'home',
        path: '/',
        component: ListRepositories
    },
    {
        name: 'show',
        path: '/show/:id',
        component: ShowRepository
    },
    {
        name: 'showgit',
        path: '/git/show/:id',
        component: ShowRepositoryGit
    },
    {
        name: 'listgit',
        path: '/git/list/:name',
        component: ListNameRepositoryGit
    },
];