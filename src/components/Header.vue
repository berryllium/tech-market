<template>
  <header>
    <div class="container">
      <nav id="menu">
        <router-link class="menu__item" to="/">Главная</router-link>
        <router-link class="menu__item" to="/">О нас</router-link>
        <router-link class="menu__item" to="/">Каталог</router-link>
        <router-link class="menu__item" to="/">Доставка и оплата</router-link>
        <router-link class="menu__item" to="/">Контакты</router-link>
        <router-link class="menu__item" to="/">Гаратния</router-link>
        <router-link class="menu__item" to="/">Отзывы</router-link>
      </nav>
      <div class="header-info">
        <div class="header-info__item"><img src="http://placehold.it/100x100" /></div>
        <div class="header-info__item"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
        <div class="header-info__item"></div>
        <div class="header-info__item"></div>
      </div>
    </div>
  </header>
</template>

<style lang="less" scoped>
@import url("../style/variables.less");
#menu {
  display: flex;
  height: 65px;
  line-height: 65px;
  border-bottom: 2px solid #e1e1e1;
  justify-content: space-between;
  .menu__item {
    text-transform: uppercase;
    text-decoration: none;
    font-size: 0.9em;
    color: #666;
    padding: 0;
    &:hover {
      transform: scale(1.05);
      color: @blue;
    }
  }
}
</style>
