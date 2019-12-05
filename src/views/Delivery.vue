<template>
  <div class="content">
    <h1>Доставка и оплата</h1>

    <div class="delivery">
      <div class="delivery-item">
        <i class="fa fa-truck delivery-item__img" aria-hidden="true"></i>
        <div class="delivery-item__header">Пункт выдачи</div>
        <div class="delivery-item__content">
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia et modi ullam obcaecati eius unde nam eum deleniti consequatur repudiandae voluptate atque quasi excepturi dolorum temporibus nostrum distinctio, quisquam mollitia impedit nihil. Ratione recusandae laborum quidem maiores, modi commodi quasi sequi numquam dicta vel quos illum eos neque itaque enim.</p>
        </div>
      </div>
      <div class="delivery-item">
        <i class="fa fa-car delivery-item__img" aria-hidden="true"></i>
        <div class="delivery-item__header">Самовывоз</div>
        <div class="delivery-item__content">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi harum consequuntur saepe consequatur rerum officiis quos quam asperiores autem cumque nesciunt accusamus repudiandae natus, voluptates magnam incidunt, adipisci animi dolores dolorem aperiam soluta dolore tempore perspiciatis veniam. Distinctio consequatur minus nulla excepturi veniam tempora odio.</p>
        </div>
      </div>
      <div class="delivery-item">
        <i class="fa fa-clock-o delivery-item__img" aria-hidden="true"></i>
        <div class="delivery-item__header">Доставка курьером</div>
        <div class="delivery-item__content">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui voluptas provident hic beatae esse asperiores est doloremque, ipsum maxime. In perspiciatis numquam, rem qui, asperiores ratione possimus magni hic sint, deserunt voluptas inventore debitis facere. Vitae, quos. Soluta sint doloribus iste officiis cumque adipisci nihil, nisi libero eveniet. Ratione, in?</p>
        </div>
      </div>
      <div class="delivery-item">
        <i class="fa fa-money delivery-item__img" aria-hidden="true"></i>
        <div class="delivery-item__header">Оплата</div>
        <div class="delivery-item__content">
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Velit similique animi tempora rerum ipsa accusamus eius alias quae suscipit sed quisquam, quia autem nemo eos esse non officiis expedita, sunt earum consequuntur aliquid delectus omnis. Ratione quasi cumque consequuntur exercitationem, at qui expedita quod soluta.</p>
        </div>
      </div>
    </div>
  </div>
</template>

<style lang="less" scoped>
@import url('../style/variables.less');
.delivery {
  display: grid;
  gap: 30px;
  grid-template-columns: repeat(4, 1fr);
}
.delivery-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-bottom: 10px;
  &__img {
    font-size: 6em;
    margin: 0 auto;
    color: @blue;
  }
  &__content {
    text-align: justify;
      color: @grey;
  }
  &__header {
    color: @blue;
    font-size: 1.1em;
    text-transform: uppercase;
    margin: 10px 0;
  }
}
</style>