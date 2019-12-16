<template>
  <div class="modal" @click="close">
    <div class="bg"></div>
    <div class="form-wrap">
      <form class="form" @submit.prevent="onSubmit">
        <div class="form__close">&times;</div>
        <h3 class="form__header">Оформление заказа</h3>
        <div v-if="done" class="form__done">
          Заказ оформлен.
          <br />Мы с вами свяжемся!
        </div>
        <div v-else class="form__content">
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
        <input type="submit" class="form__button" name="order" value="Оформить заказ" />
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { mapActions } from 'vuex';
export default {
  props: ['id_prod'],
  data() {
    return {
      user: {
        name: "",
        email: "",
        phone: "",
        address: ""
      },
      done: false
    };
  },
  methods: {
    ...mapActions['quickBuy', 'sendCart'],
    onSubmit() {
      this.done = true;
      if (this.id_prod) {
        this.$emit('quickOrder', this.user)
      }
       else this.$emit('order', this.user)
    },
    close() {
      this.$emit("closeForm", event.target.className);
    }
  }
};
</script>

<style lang="less" scoped>
@import url("../style/variables.less");
.modal {
  position: fixed;
  width: 100vw;
  height: 100vh;
  top: 0;
  left: 0;
}
.form-wrap {
  position: absolute;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
}
.bg {
  position: absolute;
  background-color: black;
  opacity: 0.5;
  width: 100%;
  height: 100%;
}
.form {
  position: relative;
  margin: 0 auto;
  padding: 20px;
  width: 30%;
  background-color: #fff;
  &__close {
    cursor: pointer;
    font-size: 1.5em;
    position: absolute;
    padding: 15px;
    top: 0;
    right: 0;
  }
  &__header {
    margin: 20px 0;
  }
  &__done {
    width: 100%;
    height: 100px;
    display: flex;
    justify-content: center;
    align-items: center;
    text-transform: uppercase;
    text-align: center;
    color: @blue;
    font-size: 1.2em;
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