<script setup>
    import Header from "../Shared/Header.vue";
    import Footer from "../Shared/Footer.vue";
</script>

<template>
    <Header />
  <main class="h-48">
    <slot />
  </main>
    <Footer />
</template>
