<template>
  <div class="content">
    <h1>Главная</h1>
    <div class="main-catalog__wrapper">
      <product />
    </div>
  </div>
</template>

<script>
import Product from "@/components/Product";
export default {
  components: {
    'product': Product
  }
}
</script>