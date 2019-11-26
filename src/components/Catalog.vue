<template>
  <aside class="catalog">
    <ul class="catalog__list">
        <catalog-sub />
        <catalog-sub />
        <catalog-sub />
        <catalog-sub />
        <catalog-sub />
        <catalog-sub />
    </ul>
  </aside>
</template>
<script>
import CatalogSubMenu from "@/components/CatalogSubMenu";
export default {
  components: {
    "catalog-sub": CatalogSubMenu
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