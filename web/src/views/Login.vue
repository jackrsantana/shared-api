<template>
  <form
    class="w-full h-screen flex items-center justify-center"
    @submit.stop.prevent="login"
  >
    <div class="w-full md:w-1/3 bg-green-50 rounded-lg border p-2 shadow-lg">
      <div class="flex font-bold justify-center">
        <img
          class="h-20 w-20"
          src="https://raw.githubusercontent.com/sefyudem/Responsive-Login-Form/master/img/avatar.svg"
        />
      </div>

      <h2 class="text-2xl text-center text-gray-700 mb-2">
        Formulário de Login
      </h2>

      <div class="p-2">
        <div class="w-full mb-2">
          <div class="flex items-center">
            <input
              v-model="email"
              type="text"
              placeholder="E-mail"
              class="w-full border rounded p-2 text-gray-700 focus:outline-none"
            />
          </div>
        </div>
        <div class="w-full mb-2">
          <div class="flex items-center">
            <input
              v-model="password"
              type="password"
              placeholder="Senha"
              class="w-full border rounded p-2 text-gray-700 focus:outline-none"
            />
          </div>
        </div>
        <a
          href="#"
          class="text-xs font-semibold text-green-600 float-right mb-2"
          >Esqueci minha senha</a
        >
        <button
          class="block clear-both w-full py-2 rounded-full bg-green-600 text-gray-100 focus:outline-none"
          type="submit"
        >
          Entrar
        </button>
      </div>
    </div>
  </form>
</template>

<script>
import { ref } from "vue";
import router from "../router";

import http from "../services/http";

export default {
  setup() {
    const email = ref("");
    const password = ref("");

    function login() {
      http
        .post("/login", {
          email: email.value,
          password: password.value,
        })
        .then((response) => {
          localStorage.setItem("access_token", response.data.access_token);
          router.replace("/dashboard");        
        })
        .catch(({ response }) => {
          alert(`Erro: ${response.status} - ${response.statusText}`);
        });
    }

    return {
      email,
      password,
      login,
    };
  },
};
</script>
