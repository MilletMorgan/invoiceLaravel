import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
import Index from '../views/organisation/Index'
import Add from '../views/organisation/Add'
import Edit from '../views/organisation/Edit'
import Show from '../views/organisation/Show'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/about',
    name: 'About',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
  },

    // Organisations
  {
    path: '/organisation',
    name: 'Index',
    component: Index
  },
  {
    path: '/organisation/add',
    name: 'Add',
    component: Add
  },
  {
    path: '/organisation/edit/:id',
    name: 'Edit',
    component: Edit
  },
  {
    path: '/organisation/show/:id',
    name: 'Show',
    component: Show
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
