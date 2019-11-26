<template>
  <li class="catalog__item">
    <img src="http://placehold.it/40x40" alt class="catalog__icon" />
    <div class="catalog__title">Категория товара</div>
    <div class="submenu catalog__submenu">
      <div class="submenu__wrap">
        <header class="submenu__header">
          <div class="submenu__title">Категория товара</div>
          <div class="submenu__desc">Описание категории</div>
          <a href="#" class="submenu__link">Все товары >></a>
          <div class="submenu__goods">
            <a href="#" class="good submenu__good">
              <img src="http://placehold.it/100x100" alt />
              <div class="good__title">Товар 1</div>
              <div class="good__price">500$</div>
            </a>
            <a href="#" class="good submenu__good">
              <img src="http://placehold.it/100x100" alt />
              <div class="good__title">Товар 1</div>
              <div class="good__price">500$</div>
            </a>
            <a href="#" class="good submenu__good">
              <img src="http://placehold.it/100x100" alt />
              <div class="good__title">Товар 1</div>
              <div class="good__price">500$</div>
            </a>
          </div>
        </header>
        <main class="submenu_main"></main>
      </div>
    </div>
  </li>
</template>

<style lang="less" scoped>
@import url("../style/variables.less");
.catalog__item {
  user-select: none;
  display: flex;
  align-items: center;
  padding: 10px 5px;
  transition: 0.2s;
  margin-right: -1px;
  &:hover {
    background-color: @blue;
    .catalog__title {
      cursor: pointer;
      color: white;
    }
    .catalog__submenu {
      display: flex;
    }
  }
  .catalog__icon {
    margin-right: 10px;
  }
  .catalog__title {
    font-weight: 200;
  }
}
.submenu {
  display: none;
  box-sizing: border-box;
  position: absolute;
  top: 0;
  left: @catalogW;
  width: 400px;
  min-height: 100%;
  padding-left: 15px;
}
.submenu__wrap {
  padding: 10px;
  width: 100%;
  border: 1px solid @bg;
  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.16);
}
.submenu__title {
  margin: 10px 0;
  font-weight: bold;
}
.submenu__desc {
  font-size: 0.9em;
  color: @grey;
  margin-bottom: 20px;
}
.submenu__link {
  display: block;
  text-align: right;
  margin-bottom: 20px;
  &:hover {
    text-decoration: underline;
  }
}
.submenu__goods {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  gap: 20px;
  flex-wrap: wrap;
}
.good {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 100px;
  &:hover {
    text-decoration: underline;
  }
}
</style>