import {createRouter, createWebHistory} from "vue-router";

import livroIndex from '../components/livros/Index.vue'
import livroForm from '../components/livros/Form.vue'
import notFound from '../components/notFound.vue'

const routes = [
    {
        path:'/',
        name: 'livros.index',
        component: livroIndex
    },
    {
        path:'/livros/create',
        name: 'livros.create',
        component: livroForm
    },
    {
        path:'/livros/:id/edit',
        name: 'livros.edit',
        component: livroForm
    },
    {
        path:'/:pathMatch(.*)*',
        name:'notfound',
        component: notFound
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router