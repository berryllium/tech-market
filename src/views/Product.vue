<template>
  <div class="content">
    <section class="section-buy">
      <div class="slider-wrap">
        <h1>Название товара в две строки</h1>
        <div class="slider">
          <img src="images/slider.png" alt />
        </div>
      </div>
      <div class="block-buy">
        <div class="card__feedback">
          <div class="stars stars_four">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
          </div>
          <div class="counter">Рейтинг: 18 голосов</div>
        </div>
        <div class="block-price">
          <div class="price-line price-line_rec">
            <span class="price-name">Рыночная цена</span>
            <span class="price-value">16800 руб.</span>
          </div>
          <div class="price-line price-line_your">
            <span class="price-name">Ваша цена</span>
            <span class="price-value">12900 руб.</span>
          </div>
          <div class="price-line price-line_econ">
            <span class="price-name">Вы экономите</span>
            <span class="price-value">3900 руб.</span>
          </div>
        </div>
        <div class="block-btn">
          <button class="buy-btn">Купить в 1 клик</button>
          <button class="cart-btn">В корзину</button>
        </div>
        <div class="properties">
          <header class="properties__header">Особенности товара</header>
          <div class="properties__content">Тут перечисляются особенности товара, если они имеются</div>
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
          <div
            class="tabs__item"
            v-if="this.tab=='desc'"
          >Описания Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut hic, dicta molestias asperiores in ea sequi? Natus laboriosam voluptatem explicabo.</div>
          <div class="tabs__item" v-if="this.tab=='prop'">
            <table class="tabs__table">
              <tr>
                <td>Поле</td>
                <td>Значение</td>
              </tr>
              <tr>
                <td>Поле</td>
                <td>Значение</td>
              </tr>
              <tr>
                <td>Поле</td>
                <td>Значение</td>
              </tr>
              <tr>
                <td>Поле</td>
                <td>Значение</td>
              </tr>
              <tr>
                <td>Поле</td>
                <td>Значение</td>
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
              <div class="feedback">
                <header>
                  <div class="name">Андрей</div>
                  <div class="date">29.12.2019</div>
                  <div class="stars stars_four">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                  </div>
                  <div
                    class="text"
                  >Долго держит заряд акб, если еще комплект ручки с сиденьем купить, получается практически картинг)</div>
                </header>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  data() {
    return {
      tab: "desc"
    };
  },
  methods: {
    changeTab(tab) {
      this.tab = tab;
    }
  }
};
</script>

<style lang="less" scoped>
@import url("../style/variables.less");
h1 {
  text-align: left;
}
.section-buy {
  padding-left: 10px;
  display: flex;
  flex-wrap: wrap;
}
.slider-wrap,
.block-buy {
  width: 50%;
}
.slider > img {
  width: 100%;
}
.card__feedback {
  margin-bottom: 20px;
  .fa-star,
  .fa-star-o {
    font-size: 1.5em;
    color: gold;
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
  border: 1px solid @blue;

  .tabs__header {
    display: flex;
    list-style-type: none;
    padding: 0;
    margin: 0;
    border-bottom: 1px solid @blue;
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
  .fa-star,
  .fa-star-o {
    color: gold;
  }
}
</style>