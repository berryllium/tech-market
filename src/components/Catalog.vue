<template>
  <aside class="catalog" @click="closeMenu">
    <ul class="catalog__list">
      <catalog-sub :showMenu="showMenu" v-for="category in allCategories" :category="category" :key="category.name" />
    </ul>
  </aside>
</template>
<script>
import CatalogSubMenu from "@/components/CatalogSubMenu";
import { mapGetters } from "vuex";
export default {
  components: {
    "catalog-sub": CatalogSubMenu
  },
  data() {
    return {
      showMenu: true
    };
  },
  computed: {
    ...mapGetters(["allCategories"])
  },
  methods: {
    closeMenu() {
      this.showMenu = false;
      setTimeout(() => (this.showMenu = true), 200);
    }
  }
};
</script>
<style lang="less" scoped>
@import url("../style/variables.less");
.catalog {
  box-sizing: border-box;
  position: relative;
  width: @catalogW;
  height: 100%;
  border: 1px solid @bg;
  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.16);

  .catalog__list {
    list-style-type: none;
    padding: 0px;
  }
}
</style>