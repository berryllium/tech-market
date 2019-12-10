<template>
  <div class="content">
    <section class="section-buy">
      <div :key="key" class="slider-wrap">
        <h2>{{oneProduct.title}}</h2>
        <div class="slider" data-auto="false">
          <img
            v-for="image in oneProduct.photos"
            :key="image.id"
            :src="`db/images/products/${oneProduct.id}/${image.src}`"
            :alt="image.alt"
          />
        </div>
      </div>
      <div class="product-card">
        <div class="block-feedback">
          <div class="stars stars_four">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i
              class="fa"
              :class="rating > 1 ? 'fa-star' : 'fa-star-o'"
              aria-hidden="true"
            ></i>
            <i
              class="fa"
              :class="rating > 2 ? 'fa-star' : 'fa-star-o'"
              aria-hidden="true"
            ></i>
            <i
              class="fa"
              :class="rating > 3 ? 'fa-star' : 'fa-star-o'"
              aria-hidden="true"
            ></i>
            <i
              class="fa"
              :class="rating > 4 ? 'fa-star' : 'fa-star-o'"
              aria-hidden="true"
            ></i>
          </div>
          <div class="counter">Отзывы: {{oneProduct.feedbacks.length}}</div>
        </div>
        <div class="block-price">
          <div class="price-line price-line_rec">
            <span class="price-name">Рыночная цена</span>
            <span class="price-value">{{oneProduct.price_old}} руб.</span>
          </div>
          <div class="price-line price-line_your">
            <span class="price-name">Ваша цена</span>
            <span class="price-value">{{oneProduct.price_new}} руб.</span>
          </div>
          <div class="price-line price-line_econ">
            <span class="price-name">Вы экономите</span>
            <span class="price-value">{{oneProduct.price_old-oneProduct.price_new}} руб.</span>
          </div>
        </div>
        <div class="block-btn">
          <button class="buy-btn" @click="buyOneClick" :data-id="oneProduct.id">Купить в 1 клик</button>
          <router-link
            tag="button"
            to="cart"
            v-if="isBuy"
            class="cart-btn cart-btn_is-buy"
            @click="toCart"
            :data-id="oneProduct.id"
          >В корзине</router-link>
          <button v-else class="cart-btn" @click="toCart" :data-id="oneProduct.id">Купить</button>
        </div>
        <div class="properties">
          <header class="properties__header">Особенности товара</header>
          <div class="properties__content">{{oneProduct.features}}</div>
        </div>
      </div>
    </section>
    <section class="section-tabs">
      <div class="tabs">
        <ul class="tabs__header">
          <li
            class="tabs__link"
            :class="this.tab == 'desc'?'active':''"
            @click="changeTab('desc')"
          >Описание</li>
          <li
            class="tabs__link"
            :class="this.tab == 'prop'?'active':''"
            @click="changeTab('prop')"
          >Характеристики</li>
          <li
            class="tabs__link"
            :class="this.tab == 'guar'?'active':''"
            @click="changeTab('guar')"
          >Гарантия</li>
          <li
            class="tabs__link"
            :class="this.tab == 'deliv'?'active':''"
            @click="changeTab('deliv')"
          >Доставка и оплата</li>
          <li
            class="tabs__link"
            :class="this.tab == 'feed'?'active':''"
            @click="changeTab('feed')"
          >Отзывы</li>
        </ul>
        <div class="tabs__content">
          <div class="tabs__item" v-if="this.tab=='desc'">{{oneProduct.description}}</div>
          <div class="tabs__item" v-if="this.tab=='prop'">
            <table class="tabs__table">
              <tr v-for="property in oneProduct.properties" :key="property.name">
                <td>{{property.name}}</td>
                <td>{{property.value}}</td>
              </tr>
            </table>
          </div>
          <div class="tabs__item" v-if="this.tab=='guar'">
            <h4>Гарантия от производителя</h4>
            <li>На данную модель гироскутера распространяется официальная гарантия от производителя на бесплатный ремонт и обслуживание в течении 12 месяцев.</li>
            <li>Гироскутер не подлежит гарантии если было самовольное вскрытие устройства.</li>
          </div>
          <div class="tabs__item" v-if="this.tab=='deliv'">
            <h4>Доставка по Москве</h4>
            <p>Для клиентов наш интернет-салон открыт круглые сутки. Если Вы делаете заказ в Москве, наш курьер доставит Ваше приобретение всего в течение часа. Вы можете позвонить нам по телефону, а также сделать заказ через онлайн-форму на сайте. Все это бесплатно, удобно и экономит Ваше время.</p>
          </div>
          <div class="tabs__item" v-if="this.tab=='feed'">
            <div class="feedback-wrap">
              <FeedbackForm />
              <Feedback
                v-for="feedback in oneProduct.feedbacks"
                :key="feedback.date"
                :feedback="feedback"
              />
            </div>
          </div>
        </div>
      </div>
    </section>
    <OrderForm v-if="showForm" @closeForm="closeForm" />
  </div>
</template>

<script>
import Feedback from "@/components/Feedback";
import OrderForm from "@/components/OrderForm";
import FeedbackForm from "@/components/FeedbackForm";
import { mapGetters, mapMutations } from "vuex";
export default {
  components: {
    Feedback,
    FeedbackForm,
    OrderForm
  },
  data() {
    return {
      tab: "desc",
      oneProduct: [],
      key: 0,
      showForm: false
    };
  },
  computed: {
    ...mapGetters(["allCart", "ratingProduct"]),
    isBuy() {
      return this.allCart.find(el => el.id == this.oneProduct.id)
        ? true
        : false;
    },
    rating() {
      return this.$store.getters.ratingProduct(this.oneProduct.id);
    }
  },
  methods: {
    ...mapMutations(["addToCart"]),
    changeTab(tab) {
      this.tab = tab;
    },
    buyOneClick(event) {
      this.showForm = true;
    },
    closeForm(target) {
      if (target == "form-wrap" || target == "form__close")
        this.showForm = false;
    },
    toCart() {
      this.addToCart(event.target.dataset.id);
    },
    slider() {
      setTimeout(() => {
        jQuery(".slider").fotorama({
          allowfullscreen: true,
          nav: "thumbs",
          height: 450
        });
        jQuery(".slider-wrap").css("opacity", "1");
      });
    }
  },
  watch: {
    "$route.params.id": {
      immediate: true,
      handler() {
        this.oneProduct = this.$store.getters.oneProduct(this.$route.params.id);
        this.key = Math.random();
      }
    }
  },
  updated() {
    this.slider();
  },
  mounted() {
    console.log(this.allCart);
    console.log(this.isBuy);
    var $ = require("jquery");
    window.jQuery = $;
    const fotorama = require("fotorama/fotorama");
    this.slider();
  }
};
</script>

<style lang="less" scoped>
@import url("../style/variables.less");
@import url("https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css");

h1 {
  text-align: left;
}
.section-buy {
  display: flex;
  flex-wrap: wrap;
  margin-bottom: 15px;
}
.slider-wrap {
  width: 50%;
  height: 550px;
  opacity: 0;
}
.product-card {
  box-sizing: border-box;
  width: 50%;
  padding-left: 10px;
}
.block-feedback {
  margin-bottom: 20px;
  .fa-star,
  .fa-star-o {
    font-size: 1.5em;
    color: @gold;
  }
  .counter {
    font-style: italic;
    color: @grey;
  }
}
.block-price {
  font-size: 1.3em;
  margin-bottom: 30px;
  .price-line {
    display: flex;
    justify-content: space-between;
    padding: 15px 0;
    border-bottom: 2px solid #e1e1e1;
  }
  .price-line_rec > .price-value {
    color: @grey;
  }
  .price-line_your > .price-value {
    font-size: 1.1em;
    font-weight: bold;
  }
  .price-line_econ > .price-value {
    font-size: 1.1em;
    color: @red;
  }
}
.block-btn {
  button {
    transition-duration: 0.3s;
    border: none;
    outline: none;
    display: block;
    width: 100%;
    padding: 10px 0;
    margin-bottom: 20px;
    &:hover {
      cursor: pointer;
    }
    &:active {
      transform: scale(0.99);
    }
  }
  .buy-btn {
    color: white;
    background-color: @blue;
    &:hover {
      background-color: darken(@blue, 15%);
    }
  }
  .cart-btn {
    color: @red;
    border: 1px solid @red;
    background: none;
    margin-bottom: 10px;
    &:hover {
      color: white;
      background-color: @red;
    }
    &_is-buy {
      color: white;
      background-color: @red;
    }
  }
}
.properties {
  border: 1px solid lighten(@grey, 40%);
  &__header {
    box-sizing: border-box;
    background: lighten(@grey, 40%);
    padding: 10px 0;
    text-align: center;
  }
  &__content {
    padding: 10px;
    text-align: justify;
  }
}
.tabs {
  border: 1px solid lighten(@grey, 40%);
  margin-bottom: 20px;

  .tabs__header {
    display: flex;
    list-style-type: none;
    padding: 0;
    margin: -1px;
    border: 1px solid @blue;
  }
  .tabs__link {
    padding: 10px 0;
    text-align: center;
    flex: 1;
    transition-duration: 0.3s;
    &:hover,
    &.active {
      background-color: @blue;
      color: white;
      cursor: pointer;
    }
  }
  .tabs__content {
    padding: 10px;
  }
  .tabs__table {
    border-collapse: collapse;
    width: 100%;
    th,
    td {
      padding: 5px;
    }
    td {
      width: 50%;
    }
    th {
      background-color: lighten(@grey, 40%);
    }
  }
}
</style>