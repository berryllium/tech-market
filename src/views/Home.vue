<template>
  <div class="content">
    <ul class="filters" v-if="currentCategory">
      <li class="filter">
        <div class="filer__name">Цена</div>
        <label><span class="filter__label">От</span><input
          @change="filterCategory(filters)"
          @keyup="filterCategory(filters)"
          v-model="filters.priceMin"
          type="number"
          placeholder="от"
        /></label>
        <label><span class="filter__label">До</span><input
          @change="filterCategory(filters)"
          @keyup="filterCategory(filters)"
          v-model="filters.priceMax"
          type="number"
          placeholder="до"
        /></label>
      </li>
      <li class="filter" v-for="(spec, index) in filters.specifications" :key="spec.name">
        <div class="filer__name">{{spec.name}}</div>
        <label><span class="filter__label">От</span><input
          @change="filterCategory(filters)"
          @keyup="filterCategory(filters)"
          v-model.number="filters.specifications[index].min"
          type="number"
          placeholder="от"
        /></label>
        <label><span class="filter__label">До</span><input
          @change="filterCategory(filters)"
          @keyup="filterCategory(filters)"
          v-model.number="filters.specifications[index].max"
          type="number"
          placeholder="до"
        /></label>
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
        priceMax: 999999,
        priceMin: 0,
        specifications: [
          {
            name: 'Мощность',
            min: 0,
            max: 10000
          },
          {
            name: 'Шум',
            min: 0,
            max: 100
          }
        ]
      },
    };
  },
  methods: {
    ...mapMutations(["filterCategory"])
  },
  computed: {
    ...mapGetters(["filteredCatalog", "currentCategory"])
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
  margin: 0 0 20px 0;
  display: flex;
  flex-wrap: wrap;
}
.filter {
  display: flex;
  flex-direction: column;
  margin-right: 22px;
  &__name {
    text-transform: capitalize;
  }
  label {
    margin-top: 5px;
  }
  input {
    box-sizing: border-box;
    width: 170px;
    min-width: 170px;
  }
  &__label {
    display: inline-block;
    width: 30px;
  }
}
</style>