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
    <OrderForm />
  </div>
</template>
<script>
import CartProduct from "@/components/CartProduct";
import OrderForm from "@/components/OrderForm";
import { mapGetters } from "vuex";
export default {
  components: {
    "cart-product": CartProduct,
    OrderForm
  },
  computed: {
    ...mapGetters(["allCart", "oneProduct"]),
    sum() {
      let sum = 0;
      this.allCart.forEach(element => {
        sum += this.oneProduct(element.id).price_new * element.count;
      });
      return sum;
    }
  },
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
</style>