<template>
  <div class="cart-product">
    <img src="images/image-phone.jpg" alt="photo" class="cart-product__img">
    <a href="/product" class="cart-product__name">Название товара</a>
    <div class="cart-product__count">
      <input type="number" min="1" name="count" class="cart-product__input" id="count" value="1">
      <label for="count"> шт.</label>
    </div>
    <div class="cart-product__price">5800 руб.</div>
    <button class="cart-product__remove">&times;</button>
  </div>
</template>
<style lang="less" scoped>
@import url('../style/variables.less');
  .cart-product {
    display: grid;
    grid-template-columns: 30% 35% 15% 15% 5%;
    align-items: center;
    margin-bottom: 20px;
    &__img {
      width: 150px;
      height: 150px;
      object-fit: contain;
    }
    &__input {
      width: 50px;
    }
    &__remove {
      margin-left: auto;
      border: none;
      outline: none;
      display: flex;
      justify-content: center;
      align-items: center;
      width: 30px;
      height: 30px;
      font-size: 1.5em;
      background: @grey;
      border-radius: 50%;
      color: white;
      &:hover {
        cursor: pointer;
        background-color: red;
      }
      &:active {
        transform: scale(.95)
      }
    }
  }
</style>