<template>
  <div class="content">
    <h1>Отзывы</h1>
    <div
      class="page-text"
    >Уважаемые покупатели, Ваши отзывы очень важны для нас! Пожалуйста, пишите нам любые пожелания, отзывы о работе нашего магазина и товарах, мы будем Вам очень благодарны и наградим Вас скидкой!</div>
    <button class="send-feedback" v-if="!formVisible" @click="formVisible = !formVisible">Оставить отзыв</button>
    <FeedbackForm v-if="formVisible" :id="-1"/>
    <div class="feedbacks">
      <Feedback v-for="feedback in globalFeedbacks" :key="feedback.date" :feedback="feedback"/>
    </div>
  </div>
</template>
<script>
import Feedback from "@/components/Feedback";
import FeedbackForm from "@/components/FeedbackForm";
import { mapGetters } from 'vuex';
export default {
  data() {
    return {
      formVisible: false
    }
  },
  computed: {
    ...mapGetters(['globalFeedbacks'])
  },
  components: {
    Feedback,
    FeedbackForm
  }
};
</script>
<style lang="less" scoped>
@import url("../style/variables.less");
.page-text {
  text-align: justify;
  text-indent: 20px;
  font-size: 1.1em;
  line-height: 1.5em;
  margin-bottom: 10px;
}
button {
  transition-duration: 0.3s;
  border: none;
  outline: none;
  display: block;
  width: 100%;
  padding: 10px 0;
  margin-bottom: 20px;
  color: white;
  background-color: @blue;
  &:hover {
    background-color: darken(@blue, 15%);
  }
  &:hover {
    cursor: pointer;
  }
  &:active {
    transform: scale(0.99);
  }
}
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
      "feedback feedback";
    textarea,
    input[type="text"],
    input[type="name"],
    input[type="email"] {
      box-sizing: border-box;
      width: 100%;
      padding: 5px;
    }
    .form__button {
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
    .fa-star,
    .fa-star-o {
      font-size: 1.3em;
      color: @gold;
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