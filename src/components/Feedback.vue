<template>
  <div class="feedback">
    <header>
      <div class="name">Андрей</div>
      <div class="date">29.12.2019</div>
    </header>
    <div class="stars stars_four">
      <i class="fa fa-star" aria-hidden="true"></i>
      <i class="fa fa-star" aria-hidden="true"></i>
      <i class="fa fa-star" aria-hidden="true"></i>
      <i class="fa fa-star" aria-hidden="true"></i>
      <i class="fa fa-star-o" aria-hidden="true"></i>
    </div>
    <div
      class="text"
    >Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, possimus aliquid vel quaerat tempore officia ullam pariatur quo tempora. Officia laboriosam atque suscipit itaque, aut magni cumque explicabo deserunt exercitationem.</div>
  </div>
</template>

<style lang="less" scoped>
@import url("../style/variables.less");
.feedback {
  margin: 10px;
  background-color: darken(@bg, 5%);
  padding: 10px;
  border-radius: 10px;
  header {
    display: flex;
    margin-bottom: 5px;
    align-items: center;
  }
  .name {
    font-size: 1.2em;
    margin-right: 10px;
    font-weight: bold;
  }
  .date {
    color: @grey;
  }
  .fa-star,
  .fa-star-o {
    font-size: 1.3em;
    color: gold;
  }
  .text {
    margin-top: 10px;
  }
}
</style>