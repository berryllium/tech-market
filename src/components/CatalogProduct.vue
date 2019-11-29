<template>
  <router-link class="product-card" to="/product">
    <img class="product-card__img" src="http://placehold.it/80x100" alt="photo" />
    <div class="product-card__title">Набор инструментов</div>
  </router-link>
</template>


<style lang="less" scoped>
@import url("../style/variables.less");

.product-card {
  width: 100px;
  height: 150px;
  &__img {
    display: block;
    width: 100%;
    height: 80px;
    object-fit: cover;
    margin-bottom: 10px;
  }
  &__title {
    font-size: 0.8em;
    text-align: center;
  }
  &:hover {
    text-decoration: underline;
  }
}
</style>