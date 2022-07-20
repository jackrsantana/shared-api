<template>
  <h2>Teste 123</h2>
</template>

<script>
import axios from "axios";
axios.defaults.baseURL = "http://localhost:8000/api";

export default {
  setup() {
    function login() {
      console.log("Login");
      axios
        .post("login", {
          email: "dudley.douglas@example.org",
          password: "secret",
        })
        .then((response) => {
          console.log(response);
        })
        .catch((error) => {
          console.log(error);
        });
    }

    return {
      login,
    };
  },
};
</script>
