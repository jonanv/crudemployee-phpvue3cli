import { createRouter, createWebHistory } from 'vue-router'

import Create from '../components/Create.vue'
import Edit from '../components/Edit.vue'
import List from '../components/List.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: List
  },
  {
    path: '/create',
    name: 'Create',
    component: Create
  },
  {
    path: '/edit/:id',
    name: 'Edit',
    component: Edit
  },
  {
    path: '/list',
    name: 'List',
    component: List
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
