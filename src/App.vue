<template>

  <nav id="nav" class="navbar navbar-expand navbar-dark bg-dark mb-4">
    <div class="nav navbar-nav">
      <router-link to="/create" class="nav-link">Create</router-link>
      <router-link to="/list" class="nav-link">List</router-link>
    </div>
  </nav>

  <router-view/>
</template>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
}

#nav a.router-link-exact-active {
  color: #42b983;
}
</style>
