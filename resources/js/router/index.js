import { createRouter, createWebHistory } from 'vue-router'

import App from '../components/App.vue'
import Create from '../components/Create.vue'
import Edit from '../components/Edit.vue'
import NotFound from '../components/NotFound.vue'

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            component: App
        },
        {
            path: '/create',
            component: Create
        },
        {
            name: 'edit',
            path: '/edit/:id',
            component: Edit
        },
        {
            path: '/crud',
            redirect: '/'
        },
        {
            path: '/:catchAll(.*)',
            component: NotFound
        }
    ]
})
  
export default router
