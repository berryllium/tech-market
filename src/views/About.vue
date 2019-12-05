<template>
  <div class="content">
    <h1>О нас</h1>
    <div class="about">
      <div class="about__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit numquam sunt asperiores veritatis. Eveniet accusantium dolorem repellendus dolore architecto incidunt quasi magni, iure ab, aliquam vero laborum animi eius id itaque quidem numquam explicabo, eligendi amet cumque cupiditate. Dolor facilis numquam quae totam velit aut error itaque non nemo rerum exercitationem vero natus saepe, dignissimos quod labore amet libero nihil sint molestiae aliquid laborum magnam dolores ea. Quod voluptates tempora placeat saepe id voluptatem, ratione expedita ab reiciendis nulla mollitia. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum repellendus mollitia, error aspernatur fugit suscipit eos expedita autem cumque inventore!</div>
      <div class="about__img-wrap"><img class="about__img" src="images/image-phone.jpg" alt=""></div>
      <div class="about__mark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae cum maiores earum consequuntur, eius vitae quod excepturi laudantium facere ut, aliquam tenetur neque voluptatum, corrupti doloremque eaque. Inventore, molestias! Vel debitis nam tempora in ipsa laborum impedit! Ut, sit? Eos ratione eveniet nam rem atque similique omnis corporis eum itaque.</div>
    </div>
  </div>
</template>

<style lang="less" scoped>
@import url('../style/variables.less');
  .about {
    color: @grey;
    text-align: justify;
    font-size: 1.1em;
    line-height: 1.5em;
    display: grid;
    gap: 40px;
    grid-template-areas: 
    "text img"
    "mark mark";
    &__text {
      text-indent: 20px;
      grid-area: text;
    }
    &__img-wrap {
      grid-area: img;
    }
    &__img {
      max-width: 100%;
      height: auto;
    }
    &__mark {
      text-indent: 20px;
      padding: 20px;
      grid-area: mark;
      background: @blue;
      color: white;
    }
  }
</style>