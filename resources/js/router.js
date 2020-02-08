import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
    {
        path: '/admin/dashboard',
        name: 'admin.dashboard',
        label: 'Dashboard',
        component: AdminDashboard
    },
]

const router = new VueRouter({
    routes
})


export default router;