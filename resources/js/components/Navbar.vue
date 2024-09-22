<template>
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand">
                <router-link class="navbar-brand" to="/">Biblioteca</router-link>
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <router-link class="nav-link" to="/">Livros</router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" to="/autores">Autores</router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" to="/editoras">Editoras</router-link>
                </li>
            </ul>
        </div>
    </nav>
</template>
  
<script>
    export default {
      name: "Navbar",
    };
</script>
  