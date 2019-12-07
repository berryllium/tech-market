<template>
  <router-link class="product-card" :to="{name: 'product', params: {id: product.id}}">
    <img class="product-card__img" :src="'db/images/' + product.img" alt="photo" />
    <div class="product-card__title">{{product.title}}</div>
  </router-link>
</template>

<script>
export default {
  props: [
    'product'
  ]
}
</script>

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