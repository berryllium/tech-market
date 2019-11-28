<template>
  <a href="#" class="product-card">
    <img src="http://placehold.it/250x200" alt=""/>
    <div class="product-card__title">Название товара</div>
    <div class="product-card__title">Товар 1</div>
    <div class="product-card__price">500$</div>
  </a>
</template>

<style lang="less" scoped>
@import url("../style/variables.less");
.product-card {
  display: block;
  text-align: center;
  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.16);
  width: 250px;
  height: 300px;
}
</style>