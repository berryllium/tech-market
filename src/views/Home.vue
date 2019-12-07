<template>
  <div class="content">
    <div class="products">
      <product v-for="product in this.products" :product="product" :key="product.id" />
    </div>
  </div>
</template>

<script>
import Product from "@/components/Product";
import { mapGetters } from 'vuex';
export default {
  computed: {
    ...mapGetters(['currentCategory']),
    products() {
      if(this.currentCategory.length == 0) return this.$store.getters.allCatalog
      else {
        return this.$store.getters.allCatalog.filter(product => product.category == this.currentCategory)
      }
    }
  },
  components: {
    product: Product
  },
};
</script>

<style lang="less" scoped>
.products {
  display: grid;
  gap: 25px;
  grid-template-columns: repeat(4, 1fr);
}
</style>