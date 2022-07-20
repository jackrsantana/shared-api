import { createRouter, createWebHistory } from "vue-router";
import Guard from '../services/middleware'

const routes = [
  {
    path: "/login",
    name: "Login",
    component: () => import("../views/Login.vue"),
  },
  {
    path: "/signup",
    name: "Signup",
    component: () => import("../views/Signup.vue"),
  },
  {
    path: '/dashboard',
    name: 'Dashboard',
    component: () => import('../views/Dashboard.vue'),
    beforeEnter: Guard.auth,
    meta: {
      requiresAuth: true
    }
  }
];

export const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
