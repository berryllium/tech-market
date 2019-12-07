<template>
  <div class="feedback">
    <header>
      <div class="name">{{feedback.name}}</div>
      <div class="date">{{feedback.date}}</div>
    </header>
    <div class="stars stars_four">
      <i class="fa fa-star" aria-hidden="true"></i>
      <i class="fa" :class="feedback.rating > 1 ? 'fa-star' : 'fa-star-o'" aria-hidden="true"></i>
      <i class="fa" :class="feedback.rating > 2 ? 'fa-star' : 'fa-star-o'" aria-hidden="true"></i>
      <i class="fa" :class="feedback.rating > 3 ? 'fa-star' : 'fa-star-o'" aria-hidden="true"></i>
      <i class="fa" :class="feedback.rating > 4 ? 'fa-star' : 'fa-star-o'" aria-hidden="true"></i>
    </div>
    <div class="text">{{feedback.text}}</div>
  </div>
</template>

<script>
export default {
  props: ["feedback"],
  mounted() {
    console.log(this.feedback)
  }
};
</script>

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