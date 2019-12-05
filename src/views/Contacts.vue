<template>
  <div class="content">
    <h1>Контакты</h1>
    <div class="contacts">
      <div class="address">
        <div class="info__item">
          <i class="fa fa-map-marker left-icon" aria-hidden="true"></i>
          <p>Москва, ул. Лермонтова</p>
        </div>
        <div class="info__item">
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
        <div class="info__item">
          <i class="fa fa-envelope-o left-icon" aria-hidden="true"></i>
          <p><a href="mailto: email@yandex.ru">email@yandex.ru</a></p>
        </div>
        <div class="info__item">
          <i class="fa fa-clock-o left-icon" aria-hidden="true"></i>
          <p>
            Прием заказов и доставка
            <b>8.00&#8209;24.00</b>
          </p>
          <p>
            Самовывоз
            <b>10.00&#8209;19.00</b>
          </p>
          <p>Работаем без выходных</p>
        </div>
      </div>
      <div class="map">
        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Af1ee48f526c937a08a9f4716c0d01103b6a37a027f1f39c5f92f73c0b9a84252&amp;source=constructor" width="550" height="350" frameborder="0"></iframe>
      </div>
    </div>
  </div>
</template>

<style lang="less" scoped>
@import url("../style/variables.less");
.contacts {
  display: flex;
  justify-content: space-between;
}
.info__item {
  color: @grey;
  margin-bottom: 30px;
  display: flex;
  flex-direction: column;
  position: relative;
  padding-left: 50px;
  font-size: 1.1em;
  p {
    margin: 4px 0;
  }
  .left-icon {
    position: absolute;
    font-size: 1.5em;
    top: 0;
    left: 0;
    color: @blue;
  }
  .soc-icons {
    margin-top: 15px;
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
</style>