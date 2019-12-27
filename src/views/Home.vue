<template>
  <div class="content">
    <ul class="filters">
      <li class="filter">
        <input
          @change="filterCategory(filters)"
          v-model="filters.priceMin"
          type="number"
          name="price-min"
          id="price-min"
          placeholder="min"
        />
        <input
          @change="filterCategory(filters)"
          v-model="filters.priceMax"
          type="number"
          name="price-max"
          id="price-max"
          placeholder="max"
        />
      </li>
    </ul>
    <div class="products">
      <product v-for="product in filteredCatalog" :product="product" :key="product.id" />
    </div>
  </div>
</template>

<script>
import Product from "@/components/Product";
import { mapGetters, mapMutations } from "vuex";
export default {
  data() {
    return {
      filters: {
        priceMax: 99500,
        priceMin: 0
      }
    };
  },
  methods: {
    ...mapMutations(["filterCategory"])
  },
  computed: {
    ...mapGetters(["filteredCatalog"])
  },
  components: {
    product: Product
  }
};
</script>

<style lang="less" scoped>
.products {
  display: grid;
  gap: 25px;
  grid-template-columns: repeat(4, 1fr);
}
.filters {
  list-style-type: none;
  padding: 0;
  display: flex;
  flex-wrap: wrap;
}
.filter {
  margin-right: 20px;
}
</style>