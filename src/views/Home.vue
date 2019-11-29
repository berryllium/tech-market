<template>
  <div class="content">
    <div class="products">
      <product />
      <product />
      <product />
      <product />
      <product />
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

<style lang="less" scoped>
  .products {
    display: grid;
    gap: 25px;
    grid-template-columns: repeat(4, 1fr);
  }
</style>