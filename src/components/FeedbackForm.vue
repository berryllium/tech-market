<template>
  <div class="form">
    <h3 class="form__header">Оставьте свой отзыв</h3>
    <form action="#">
      <div class="form__name">
        <label for="name">Ваше имя</label>
        <br />
        <input type="name" id="name" name="name" />
      </div>
      <div class="form__email">
        <label for="email">Ваша электронная почта</label>
        <br />
        <input type="email" id="email" name="email" />
      </div>
      <div class="form__header">
        <label for="header">Заголовок отзыва</label>
        <br />
        <input type="text" id="header" name="header" />
      </div>
      <div class="form__rating">
        <label>Ваша оценка</label>
        <br />
        <div class="stars stars_four">
          <star-rating v-model="rating" text-class="custom-text" />
        </div>
      </div>
      <div class="form__feedback">
        <label for="feedback">Ваш отзыв</label>
        <br />
        <textarea id="feedback" name="feedback" rows="10"></textarea>
      </div>
      <input type="submit" class="form__button" value="Отправить" />
    </form>
  </div>
</template>

<script>
import StarRating from "vue-star-rating";
export default {
  data() {
    return {
      rating: 5
    };
  },
  components: {
    "star-rating": StarRating
  }
};
</script>

<style lang="less" scoped>
@import url("../style/variables.less");
.form {
  h3 {
    margin: 10px 0;
  }
  form {
    display: grid;
    gap: 20px;
    grid-template-areas:
      "name email"
      "header header"
      "rating rating"
      "feedback feedback"
      "button button";
    textarea,
    input[type="text"],
    input[type="name"],
    input[type="email"] {
      box-sizing: border-box;
      width: 100%;
      padding: 5px;
    }
    .form__button {
      grid-area: button;
      text-align: center;
      border: none;
      outline: none;
      padding: 10px;
      background-color: @blue;
      color: white;
      &:hover {
        cursor: pointer;
        background-color: darken(@blue, 10%);
      }
      &:active {
        transform: scale(0.95);
      }
    }
  }
  &__name {
    grid-area: name;
  }
  &__email {
    grid-area: email;
  }
  &__header {
    grid-area: header;
  }
  &__rating {
    grid-area: rating;
  }
  &__feedback {
    grid-area: feedback;
  }
}
</style>