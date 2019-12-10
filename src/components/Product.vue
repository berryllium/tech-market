<template>
  <div href="#" class="product-card">
    <router-link class="product-card__link" :to="'/product'+product.id">
      <div class="product-card__title">{{product.title}}</div>
      <img class="product-card__img" :src="'db/images/' + product.img" alt="photo" />
    </router-link>
    <div class="product-card__feedback">
      <div class="product-card__stars product-card__stars_four">
        <i class="fa" :class="rating > 0 ? 'fa-star' : 'fa-star-o'" aria-hidden="true"></i>
        <i class="fa" :class="rating > 1 ? 'fa-star' : 'fa-star-o'" aria-hidden="true"></i>
        <i class="fa" :class="rating > 2 ? 'fa-star' : 'fa-star-o'" aria-hidden="true"></i>
        <i class="fa" :class="rating > 3 ? 'fa-star' : 'fa-star-o'" aria-hidden="true"></i>
        <i class="fa" :class="rating > 4 ? 'fa-star' : 'fa-star-o'" aria-hidden="true"></i>
      </div>
      <span class="product-card__counter">({{product.feedbacks.length}})</span>
    </div>
    <div class="product-card__price">
      <div class="product-card__new-price">{{product.price_new}} руб.</div>
      <div class="product-card__old-price">{{product.price_old}} руб.</div>
    </div>
    <div class="product-card__buttons">
      <router-link class="menu__item" :to="'/product'+product.id">
        <button class="more-btn">Подробнее</button>
      </router-link>
      <router-link
        to="/cart"
        v-if="isBuy"
        tag="button"
        class="buy-btn is-buy"
        :data-id="product.id"
        @click="toCart"
      >В корзине</router-link>
      <button v-else class="buy-btn" :data-id="product.id" @click="toCart">Купить</button>
    </div>
  </div>
</template>

<script>
import { mapMutations, mapGetters } from "vuex";
export default {
  props: ["product"],
  computed: {
    ...mapGetters(["allCart", "ratingProduct"]),
    isBuy() {
      return this.allCart.find(el => el.id == this.product.id) ? true : false;
    },
    rating() {
      return this.$store.getters.ratingProduct(this.product.id);
    }
  },
  methods: {
    ...mapMutations(["addToCart"]),
    toCart() {
      this.addToCart(event.target.dataset.id);
    }
  }
};
</script>

<style lang="less" scoped>
@import url("../style/variables.less");
.product-card {
  display: block;
  padding: 10px 5px;
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16);
  &__link {
    display: block;
    transition-duration: 0.3s;
    &:hover {
      transform: translateY(-5px);
    }
  }
  &__title {
    font-size: 1.1em;
    margin-bottom: 10px;
  }
  &__img {
    display: block;
    width: 100%;
    height: 150px;
    object-fit: contain;
    margin-bottom: 10px;
  }
  &__feedback {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    margin-bottom: 10px;
  }
  &__stars {
    font-size: 1.2em;
    margin-right: 10px;
    .fa-star {
      color: @gold;
    }
    .fa-star-o {
      color: @gold;
    }
  }
  &__counter {
    font-size: 0.8em;
    color: @grey;
  }
  &__price {
    display: flex;
    justify-content: space-between;
    padding: 0 5px;
    align-items: center;
    margin-bottom: 15px;
  }
  &__old-price {
    color: @grey;
    text-decoration: line-through;
    font-size: 0.9em;
  }
  &__new-price {
    color: @blue;
    font-weight: bold;
    font-size: 1.1em;
  }
  &__buttons {
    display: flex;
    justify-content: space-between;
    .buy-btn,
    .more-btn {
      min-width: 45%;
      transition-duration: 0.3s;
      border-radius: 5px;
      padding: 5px 5px;
      border: none;
      outline: none;
      &:hover {
        cursor: pointer;
      }
      &:active {
        transform: scale(0.95);
      }
    }
    .buy-btn {
      background-color: @blue;
      color: white;
      &:hover {
        background: darken(@blue, 10%);
      }
    }
    .is-buy {
      background-color: @gold;
      &:hover {
        background-color: darken(@gold, 10%);
      }
    }
    .more-btn {
      background: none;
      border: 1px solid @blue;
      color: @blue;
      &:hover {
        background-color: @blue;
        color: white;
      }
    }
  }
}
</style>