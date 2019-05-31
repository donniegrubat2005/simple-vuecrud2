<template>
  <div class="container">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <router-link to="/" class="navbar-brand">Vue</router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <router-link to="/" class="nav-link">Home</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/create" class="nav-link">Create</router-link>
                </li>
            </ul>

        </div>
    </nav>
      <div class="container">
          <router-view></router-view>
      </div>
  </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>

</style>
