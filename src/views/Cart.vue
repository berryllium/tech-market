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
    <div v-if="getAllCount" class="amount">
      Итого:
      <span class="sum">{{sum}}</span> руб.
    </div>
    <div  v-if="getAllCount" class="button-wrap">
      <button @click="showForm = true" class="order-btn">Оформить заказ</button>
    </div>
     <div v-else class="empty">Корзина пуста</div>
    <OrderForm v-if="showForm" @closeForm="closeForm" @order="clearCart"/>
  </div>
</template>
<script>
import CartProduct from "@/components/CartProduct";
import OrderForm from "@/components/OrderForm";
import { mapGetters, mapMutations } from "vuex";
export default {
  components: {
    "cart-product": CartProduct,
    OrderForm
  },
  data() {
    return {
      showForm: false
    };
  },
  computed: {
    ...mapGetters(["allCart", "oneProduct", "getAllCount"]),
    sum() {
      let sum = 0;
      this.allCart.forEach(element => {
        sum += this.oneProduct(element.id).price_new * element.count;
      });
      return sum;
    }
  },
  methods: {
    ...mapMutations(['clearCart']),
    closeForm(target) {
      if(target == 'form-wrap' || target == 'form__close') this.showForm = false;
    },
  }
};
</script>
<style lang="less" scoped>
@import url("../style/variables.less");
.bottom {
  margin-top: 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.button-wrap {
  display: flex;
  flex: 1;
  justify-content: center;
}
.amount {
  align-self: right;
  text-align: right;
  font-size: 1.2em;
  span {
    font-weight: bold;
  }
}
.order-btn {
  display: block;
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
.empty {
  text-align: center;
}
</style>