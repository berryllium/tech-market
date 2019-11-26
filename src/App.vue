<template>
  <div id="app">
    <Header />
    <div class="content container">
    <Catalog />
    <router-view />
    </div>
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
