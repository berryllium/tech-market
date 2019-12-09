<template>
  <div class="content">
    <h1>Корзина товаров</h1>
    <div class="cart-products">
      <cart-product
        v-for="product in allCart"
        :id="product.id"
        :count="product.count"
        :key="product.id"
      />
    </div>
    <div class="amount">
      Итого:
      <span class="sum">{{sum}}</span> руб.
    </div>
    <div class="form">
      <h3 class="form__header">Оформление заказа</h3>
      <div class="form__content">
        <div class="form__user">
          <label for="name">Ваше имя</label>
          <input type="name" class="form__name" name="name" placeholder="Имя" />
          <label for="email">Ваш email</label>
          <input
            type="email"
            class="form__email"
            name="email"
            placeholder="Адрес электронной почты"
          />
          <label for="phone">Ваш телефон</label>
          <input type="phone" class="form__phone" name="phone" placeholder="Номер телефона" />
          <label for="address">Ваш адрес</label>
          <textarea rows="4" class="form__address" name="address" placeholder="Адрес доставки"></textarea>
        </div>
      </div>
      <input type="submit" class="form__button" name="order" value="Оформить заказ" />
    </div>
  </div>
</template>
<script>
import CartProduct from "@/components/CartProduct";
import { mapGetters } from 'vuex';
export default {
  components: {
    "cart-product": CartProduct
  },
  computed: {
    ...mapGetters(['allCart', 'oneProduct']),
    sum() {
      let sum = 0
      this.allCart.forEach(element => {
        sum += this.oneProduct(element.id).price_new * element.count
      });
      return sum
    }
  },
  methods: {
  }
};
</script>
<style lang="less" scoped>
@import url("../style/variables.less");
.amount {
  text-align: right;
  font-size: 1.2em;
  span {
    font-weight: bold;
  }
}
.form {
  margin: 0 auto;
  width: 50%;
  &__header {
    margin: 20px 0;
  }
  input,
  textarea {
    box-sizing: border-box;
    width: 100%;
    padding: 5px;
    margin: 5px 0 10px 0;
  }
  &__button {
    display: block;
    margin-top: 20px;
    text-align: center;
    border: none;
    outline: none;
    padding: 10px;
    background-color: @blue;
    color: white;
    &:hover {
      cursor: pointer;
      background-color: darken(@blue, 10%);
    }
    &:active {
      transform: scale(0.95);
    }
  }
}
</style>