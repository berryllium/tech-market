<template>
  <footer>
    <div class="container footer__wrap">
      <div class="footer__item footer-menu">
        <div class="footer__header">
          <i class="fa fa-bars" aria-hidden="true"></i>
          <span class="footer__title">Меню</span>
        </div>
        <p class="footer__par">
          <router-link class="footer__link" to="/">Главная</router-link>
        </p>
        <p class="footer__par">
          <router-link class="footer__link" to="/about">О нас</router-link>
        </p>
        <p class="footer__par">
          <router-link class="footer__link" to="/delivery">Доставка и оплата</router-link>
        </p>
        <p class="footer__par">
          <router-link class="footer__link" to="/contacts">Контакты</router-link>
        </p>
        <p class="footer__par">
          <router-link class="footer__link" to="/guarantee">Гарантия</router-link>
        </p>
        <p class="footer__par">
          <router-link class="footer__link" to="/feedback">Отзывы</router-link>
        </p>
      </div>
      <div class="footer__item footer-catalog">
        <div class="footer__header">
          <i class="fa fa-database" aria-hidden="true"></i>
          <span class="footer__title">Каталог</span>
        </div>
        <p class="footer__par">
          <a href="#" class="footer__link">Раздел_каталога</a>
        </p>
        <p class="footer__par">
          <a href="#" class="footer__link">Раздел_каталога</a>
        </p>
        <p class="footer__par">
          <a href="#" class="footer__link">Раздел_каталога</a>
        </p>
        <p class="footer__par">
          <a href="#" class="footer__link">Раздел_каталога</a>
        </p>
        <p class="footer__par">
          <a href="#" class="footer__link">Раздел_каталога</a>
        </p>
        <p class="footer__par">
          <a href="#" class="footer__link">Раздел_каталога</a>
        </p>
      </div>
      <div class="footer__item footer-address">
        <div class="footer__header">
          <i class="fa fa-map-marker" aria-hidden="true"></i>
          <span class="footer__title">Адрес</span>
        </div>
        <p class="footer__par">Москва, ул. Лермонтова</p>
        <p class="footer__par">Доставка по всей России</p>
      </div>
      <div class="footer__item footer-contacts">
        <div class="footer__header">
          <i class="fa fa-phone" aria-hidden="true"></i>
          <span class="footer__title">Контакты</span>
        </div>
        <p class="footer__par">
          <a href="tel: 89999999999">8(999)999-99-99</a>
        </p>
        <p class="footer__par">
          <a href="tel: 89999999999">8(999)999-99-99</a>
        </p>
        <div class="soc-icons">
          <a href="#">
            <i class="fa fa-whatsapp" aria-hidden="true"></i>
          </a>
          <a href="#">
            <i class="fa fa-telegram" aria-hidden="true"></i>
          </a>
          <a href="#">
            <i class="fa fa-vk" aria-hidden="true"></i>
          </a>
          <a href="#">
            <i class="fa fa-instagram" aria-hidden="true"></i>
          </a>
        </div>
      </div>
      <div class="footer__item footer-payment">
        <div class="footer__header">
          <i class="fa fa-credit-card" aria-hidden="true"></i>
          <span class="footer__title">Оплата</span>
        </div>
        <img src="images/payment.png" alt="payment" class="payment-img" />
        <p class="footer__par">Оплата банковской картой, наличными или переводом</p>
      </div>
    </div>
  </footer>
</template>

<style lang="less" scoped>
@import url("../style/variables.less");
.footer__wrap {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  padding: 20px 0;
  border-top: 2px solid #e1e1e1;
}
.fa {
  font-size: 1.5em;
  color: @blue;
}
.footer__header {
  display: flex;
  align-items: center;
  margin-bottom: 20px;
}
.footer__title {
  margin-left: 10px;
  font-size: 1em;
  text-transform: uppercase;
  color: @blue;
}
.footer__par {
  color: @grey;
  margin-bottom: 10px;
  a {
    &:hover {
      color: @blue;
    }
  }
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
    &.fa-vk {
      color: #597da3;
    }
    &.fa-instagram {
      color: #cc000f;
    }
    &:hover {
      opacity: 1;
    }
  }
}
.payment-img {
  width: 100%;
  margin-bottom: 10px;
}
</style>