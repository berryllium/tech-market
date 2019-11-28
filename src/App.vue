<template>
  <div id="app">
    <Header />
    <main class="container">
    <Catalog />
    <router-view class="content"/>
    </main>
    <Footer />
  </div>
</template>

<script>
import Header from "@/components/Header";
import Catalog from "@/components/Catalog";
import Footer from "@/components/Footer";
export default {
  components: {
    Header,
    Footer,
    Catalog
  }
};
</script>

<style lang="less">
@import url("style/font-awesome.min.css");
@import url("style/jquery.fancybox.css");
@import url("style/normalize.css");
@import url("style/variables.less");
@import url("style/main.less");
</style>
