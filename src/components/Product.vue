<template>
  <div href="#" class="product-card">
    <router-link class="product-card__link" to="/product">
    <div class="product-card__title">Название какого-то товара в 2 строки</div>
    <img class="product-card__img" src="https://img2.freepng.ru/20180206/pyw/kisspng-iphone-4-telephone-samsung-galaxy-clip-art-aok-cliparts-5a79bcc68e77f8.8337419115179276225836.jpg" alt="photo" />
    </router-link>
    <div class="product-card__feedback">
      <div class="product-card__stars product-card__stars_four">
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star-o" aria-hidden="true"></i>
      </div>
      <span class="product-card__counter">(18)</span>
    </div>
    <div class="product-card__price">
      <div class="product-card__new-price">7500 руб.</div>
      <div class="product-card__old-price">12700 руб.</div>
    </div>
    <div class="product-card__buttons">
      <!-- <button class="vie-btn">Посмотреть</button> -->
      <button class="buy-btn">Купить</button>
    </div>
  </div>
</template>

<style lang="less" scoped>
@import url("../style/variables.less");
.product-card {
  display: block;
  padding: 10px   5px;
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16);
  &__link {
    display: block;
    transition-duration: .3s;
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
      color: gold;
    }
    .fa-star-o {
      color: gold;
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
  }
  &__new-price {
    color: @blue;
    font-weight: bold;
    font-size: 1.2em;
  }
  &__buttons {
    display: flex;
    justify-content: flex-end;
    padding: 5px 10px;
    button {
      border: none;
      border-radius: 5px;
      outline: none;
      padding: 5px 10px;
      background: #288ee0;
      color: white;
      &:hover {
        cursor: pointer;
        background: darken(@blue, 10%);
      }
      &:active {
        transform: scale(0.95);
      }
    }
  }
}
</style>