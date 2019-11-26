<template>
  <header>
    <div class="container">
      <nav id="menu">
        <router-link class="menu__item" to="/">Главная</router-link>
        <router-link class="menu__item" to="/">О нас</router-link>
        <!-- <router-link class="menu__item" to="/">Каталог</router-link> -->
        <router-link class="menu__item" to="/">Доставка и оплата</router-link>
        <router-link class="menu__item" to="/">Контакты</router-link>
        <router-link class="menu__item" to="/">Гаратния</router-link>
        <router-link class="menu__item" to="/">Отзывы</router-link>
        <input type="text" name="search" id="top-search" placeholder="Поиск" />
        <router-link class="menu__item" to="/">
          <i class="fa fa-shopping-cart" aria-hidden="true"></i>
        </router-link>
      </nav>
      <div class="header-info">
        <div class="header-info__item">
          <a href="/">
            <img src="http://placehold.it/100x100" />
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
          <i class="fa fa-time left-icon" aria-hidden="true"></i>
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
      font-size: 2em;
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
.header-info {
  display: flex;
  justify-content: space-between;
  padding: 20px 0;
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
        font-size: 1.5em;
        margin-right: 10px;
        &.fa-whatsapp {
          color: #11c200;
        }
        &.fa-telegram {
          color: #0088cc;
        }
      }
    }
  }
}
</style>
