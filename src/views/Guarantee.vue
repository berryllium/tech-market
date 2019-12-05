<template>
  <div class="content">
    <h1>Гарантия</h1>
    <ul class="rools">
      <li class="rool">
        <i class="fa fa-file-text-o" aria-hidden="true"></i>
        <div
          class="rool__upper"
        >НА ВСЕ ТОВАРЫ В НАШЕМ МАГАЗИНЕ ПРЕДОСТАВЛЯЕТСЯ ГАРАНТИЯ, ПОДТВЕРЖДАЮЩАЯ ОБЯЗАТЕЛЬСТВА ПО ОТСУТСТВИЮ В ТОВАРЕ ЗАВОДСКИХ ДЕФЕКТОВ.</div>
        <div class="rool__text">
          Гарантия предоставляется на срок от
          <span class="color">4-х недель до 24 месяцев</span> в зависимости от сервисной политики производителя. Срок гарантии указан в описании каждого товара на нашем сайте. Подтверждением гарантийных обязательств служит гарантийный талон «Polker.ru».
        </div>
      </li>
      <li class="rool">
        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
        <span
          class="color"
        >Пожалуйста, проверьте комплектность и отсутствие дефектов в товаре при его ПОЛУЧЕНИИ (комплектность определяется описанием изделия или руководством по его эксплуатации).</span>
      </li>
      <li class="rool">
        <i class="fa fa-wrench" aria-hidden="true"></i>
        Право на
        <span class="upper">БЕСПЛАТНОЕ</span> гарантийное обслуживание дает гарантийный талон, в котором указываются:
        <ul class="rool__list">
          <li class="rool__li">модель</li>
          <li class="rool__li">гарантийный срок</li>
          <li class="rool__li">дата продажи товара</li>
        </ul>
      </li>
      <li class="rool">
        <i class="fa fa-undo" aria-hidden="true"></i>
        <div class="rool__upper">
          Также Вы можете обменять или вернуть товар в течение 14 дней после покупки.
          <br />Это право гарантирует вам «Закон о защите прав потребителя».
        </div>
        <div class="rool__text">Чтобы использовать эту возможность, пожалуйста, убедитесь, что:</div>
        <ul class="rool__list">
          <li
            class="rool__li"
          >товар не был в употреблении и не имеет следов использования (царапин, сколов, потёртостей и т.п.)</li>
          <li class="rool__li">товар полностью укомплектован и не нарушена целостность упаковки</li>
          <li class="rool__li">у Вас имеется гарантийный талон</li>
        </ul>
      </li>
    </ul>
  </div>
</template>
<style lang="less" scoped>
@import url("../style/variables.less");
.rools {
  list-style-type: none;
  padding: 0;
  margin: 0;
}
.rool {
  min-height: 60px;
  position: relative;
  color: @grey;
  text-align: justify;
  margin-bottom: 50px;
  padding-left: 80px;
  &__upper {
    text-transform: uppercase;
    font-weight: bold;
    margin-bottom: 15px;
  }
  .fa {
    color: @blue;
    position: absolute;
    width: 100px;
    left: 0;
    font-size: 4em;
    float: left;
  }
  .color {
    color: @blue;
  }
  .upper {
    text-transform: uppercase;
  }
  &__list {
    margin-top: 10px;
  }
  &__li {
    margin-bottom: 7px;
  }
}
</style>