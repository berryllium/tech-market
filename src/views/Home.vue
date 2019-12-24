<template>
  <div class="content">
    <ul class="filters">
      <li class="filter">
        <div class="filter-name">Популярность</div>
        <select name="filter1">
          <option value="значение 1">по убыванию</option>
          <option value="значение 2">по возрастанию</option>
        </select>
      </li>
      <li class="filter">
        <div class="filter-name">Цена</div>
        <select name="filter2">
          <option value="значение 1">по убыванию</option>
          <option value="значение 2">по возрастанию</option>
        </select>
      </li>
      <li class="filter">
        <div class="filter-name">Мощность</div>
        <select name="filter2">
          <option value="значение 1">по убыванию</option>
          <option value="значение 2">по возрастанию</option>
        </select>
      </li>
    </ul>
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
      if(this.currentCategory.length == 0) return this.$store.getters.filteredCatalog
      else {
        return this.$store.getters.filteredCatalog.filter(product => product.category == this.currentCategory)
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