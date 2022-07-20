export default {
  auth(to, from, next) {
    const token = localStorage.getItem("access_token");
    
    if (to.matched.some(record => record.meta.requiresAuth)) {
      if (!token) {
        next("/login");
      } else {
        next();
      }
    }
  },
};
