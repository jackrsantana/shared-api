<template>
  <div class="w-full h-screen flex items-center justify-center">
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
              type="text"
              placeholder="E-mail"
              class="w-full border rounded p-2 text-gray-700 focus:outline-none"
            />
          </div>
        </div>
        <div class="w-full mb-2">
          <div class="flex items-center">
            <input
              type="text"
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

        <a
          class="block clear-both w-full py-2 rounded-full bg-green-600 text-gray-100 focus:outline-none"
          @click="login"
          >Entrar</a
        >
      </div>
    </div>
  </div>
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
          email: "jack.rsantana@gmail.com",
          password: "123456",
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
