<template>
  <header>
    <div class="container">
      <nav id="menu">
        <router-link class="menu__item" to="/">Главная</router-link>
        <router-link class="menu__item" to="/about">О нас</router-link>
        <router-link class="menu__item" to="/delivery">Доставка и оплата</router-link>
        <router-link class="menu__item" to="/contacts">Контакты</router-link>
        <router-link class="menu__item" to="/guarantee">Гарантия</router-link>
        <router-link class="menu__item" to="/feedback">Отзывы</router-link>
        <input
          v-model="searchStr"
          @keyup="search"
          type="text"
          name="search"
          id="top-search"
          placeholder="Поиск"
        />
        <router-link class="menu__item" to="/cart">
          <i class="fa fa-shopping-cart" aria-hidden="true">
            <div class="cart-count">{{this.getAllCount}}</div>
          </i>
        </router-link>
      </nav>
      <div class="header-info">
        <div class="header-info__item header-logo">
          <a href="/">
            <img src="images/logo.png" />
          </a>
        </div>
        <div class="header-info__item">
          <i class="fa fa-map-marker left-icon" aria-hidden="true"></i>
          <p>Москва, ул. Лермонтова</p>
          <p>Доставка по всей России</p>
        </div>
        <div class="header-info__item">
          <i class="fa fa-phone left-icon" aria-hidden="true"></i>
          <p>
            <a href="tel: 89999999999">8(999)999-99-99</a>
          </p>
          <p>
            <a href="tel: 89999999999">8(999)999-99-99</a>
          </p>
          <div class="soc-icons">
            <a href="#">
              <i class="fa fa-whatsapp" aria-hidden="true"></i>
            </a>
            <a href="#">
              <i class="fa fa-telegram" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        <div class="header-info__item">
          <i class="fa fa-clock-o left-icon" aria-hidden="true"></i>
          <p>
            Прием заказов и доставка
            <b>8.00-24.00</b>
          </p>
          <p>
            Самовывоз
            <b>10.00-19.00</b>
          </p>
          <p>Работаем без выходных</p>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  data() {
    return {
      searchStr: ""
    };
  },
  computed: {
    ...mapGetters(["getAllCount"])
  },
  methods: {
    search() {
      this.$store.dispatch("search", this.searchStr);
      if (this.$route.fullPath != "/") this.$router.push("/");
    }
  }
};
</script>

<style lang="less" scoped>
@import url("../style/variables.less");
#menu {
  display: flex;
  justify-content: space-between;
  align-items: center;
  height: 45px;
  border-bottom: 2px solid #e1e1e1;
  .menu__item {
    text-transform: uppercase;
    text-decoration: none;
    font-size: 0.9em;
    color: @grey;
    padding: 0;
    &:hover {
      transform: scale(1.05);
      color: @blue;
    }
    .fa-shopping-cart {
      position: relative;
      font-size: 2em;
      margin-right: 15px;
      .cart-count {
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: .6em;
        width: 20px;
        height: 20px;
        border-radius: 20px;
        color: white;
        background-color: @blue;
        position: absolute;
        right: -10px;
        top: -5px;
      }
    }
  }
  #top-search {
    outline: none;
    box-sizing: border-box;
    border: 1px solid lighten(@grey, 30%);
    border-radius: 10px;
    padding: 5px;
  }
}
.header-logo {
  width: 250px;
  img {
    width: 100%;
    height: auto;
    object-fit: contain;
  }
}
.header-info {
  display: flex;
  justify-content: space-between;
  margin: 10px 0 30px 0;
  .header-info__item:not(:first-child) {
    display: flex;
    flex-direction: column;
    position: relative;
    padding-left: 30px;
    p {
      margin-bottom: 10px;
    }
    .left-icon {
      position: absolute;
      font-size: 1.5em;
      top: 0;
      left: 0;
      color: @blue;
    }
    .soc-icons {
      i {
        opacity: 0.8;
        transition-duration: 0.3s;
        font-size: 1.5em;
        margin-right: 10px;
        &.fa-whatsapp {
          color: #11c200;
        }
        &.fa-telegram {
          color: #0088cc;
        }
        &:hover {
          opacity: 1;
        }
      }
    }
  }
}
</style>
