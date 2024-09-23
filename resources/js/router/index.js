import {createRouter, createWebHistory} from "vue-router";

import livroIndex from '../components/livros/LivroIndex.vue'
import livroForm from '../components/livros/LivroForm.vue'
import autorIndex from '../components/autores/AutorIndex.vue'
import autorForm from '../components/autores/AutorForm.vue'
import editoraIndex from '../components/editoras/EditoraIndex.vue'
import editoraForm from '../components/editoras/EditoraForm.vue'
// import generoIndex from '../components/generos/GeneroIndex.vue'
// import generoForm from '../components/generos/GeneroForm.vue'

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
        path:'/autores',
        name: 'autores.index',
        component: autorIndex
    },
    {
        path:'/autores/create',
        name: 'autores.create',
        component: autorForm
    },
    {
        path:'/autores/:id/edit',
        name: 'autores.edit',
        component: autorForm
    },
    {
        path:'/editoras',
        name: 'editoras.index',
        component: editoraIndex
    },
    {
        path:'/editoras/create',
        name: 'editoras.create',
        component: editoraForm
    },
    {
        path:'/editoras/:id/edit',
        name: 'editoras.edit',
        component: editoraForm
    },
    // {
    //     path:'/generos',
    //     name: 'editoras.index',
    //     component: autorIndex
    // },
    // {
    //     path:'/generos/create',
    //     name: 'editoras.create',
    //     component: autorForm
    // },
    // {
    //     path:'/generos/:id/edit',
    //     name: 'editoras.edit',
    //     component: autorForm
    // },
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