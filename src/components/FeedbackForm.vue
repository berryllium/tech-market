<template>
  <div class="form">
    <div v-if="done" class="form__thanks">Спасибо за отзыв!</div>
    <div v-else class="form-wrap">
      <h3 class="form__header">Оставьте свой отзыв</h3>
      <form action="#" @submit.prevent="onSubmit">
        <div class="form__name">
          <label for="name">Ваше имя</label>
          <br />
          <input v-model="feedback.name" type="name" id="name" name="name" required/>
        </div>
        <div class="form__email">
          <label for="email">Ваша электронная почта</label>
          <br />
          <input v-model="feedback.email" type="email" id="email" name="email" />
        </div>
        <div class="form__header">
          <label for="header">Заголовок отзыва</label>
          <br />
          <input v-model="feedback.header" type="text" id="header" name="header" required/>
        </div>
        <div class="form__rating">
          <label>Ваша оценка</label>
          <br />
          <div class="stars stars_four">
            <star-rating v-model="feedback.rating" text-class="custom-text" required/>
          </div>
        </div>
        <div class="form__feedback">
          <label for="feedback">Ваш отзыв</label>
          <br />
          <textarea v-model="feedback.text" id="feedback" name="feedback" rows="10" required></textarea>
        </div>
        <input type="submit" class="form__button" value="Отправить" />
      </form>
    </div>
  </div>
</template>

<script>
import StarRating from "vue-star-rating";
export default {
  data() {
    return {
      feedback: {
        name: "",
        email: "",
        header: "",
        rating: 5,
        text: ""
      },
      done: false
    };
  },
  methods: {
    onSubmit() {
      console.log(this.feedback);
      this.done = true;
      console.log(this.done);
    },
    close() {
      this.$emit("closeForm", event.target.className);
    }
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
.form__thanks {
  font-size: 1.5em;
  text-align: center;
  padding: 20px 0;
  color: @blue;
}
</style>