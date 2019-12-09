<template>
  <form class="form" @submit.prevent="onSubmit">
    <h3 class="form__header">Оформление заказа</h3>
    <div class="form__content">
      <div class="form__user">
        <label for="name">Ваше имя</label>
        <input v-model="user.name" type="name" class="form__name" name="name" placeholder="Имя" />
        <label for="email">Ваш email</label>
        <input
          v-model="user.email"
          type="email"
          class="form__email"
          name="email"
          placeholder="Адрес электронной почты"
        />
        <label for="phone">Ваш телефон</label>
        <input
          v-model="user.phone"
          type="phone"
          class="form__phone"
          name="phone"
          placeholder="Номер телефона"
        />
        <label for="address">Ваш адрес</label>
        <textarea
          v-model="user.address"
          rows="4"
          class="form__address"
          name="address"
          placeholder="Адрес доставки"
        ></textarea>
      </div>
    </div>
    <input
      type="submit"
      class="form__button"
      name="order"
      value="Оформить заказ"
    />
  </form>
</template>

<script>
export default {
  data() {
    return {
      user: {
        name: "",
        email: "",
        phone: "",
        address: ""
      }
    };
  },
  methods: {
    onSubmit() {
      console.log(this.user)
    }
  }
};
</script>

<style lang="less" scoped>
@import url("../style/variables.less");
.form {
  margin: 0 auto;
  width: 50%;
  &__header {
    margin: 20px 0;
  }
  input,
  textarea {
    box-sizing: border-box;
    width: 100%;
    padding: 5px;
    margin: 5px 0 10px 0;
  }
  &__button {
    display: block;
    margin-top: 20px;
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
</style>