<template>
  <router-link class="product-card" to="/product">
    <img class="product-card__img" src="https://img2.freepng.ru/20180206/pyw/kisspng-iphone-4-telephone-samsung-galaxy-clip-art-aok-cliparts-5a79bcc68e77f8.8337419115179276225836.jpg" alt="photo" />
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
    object-fit: contain;
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