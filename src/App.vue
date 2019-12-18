<template>
  <div id="app">
    <Header />
    <main v-if="!loadingState" class="container">
      <Catalog />
      <router-view />
    </main>
    <Footer />
  </div>
</template>

<script>
import Header from "@/components/Header";
import Catalog from "@/components/Catalog";
import Footer from "@/components/Footer";
import { mapGetters, mapActions, mapMutations } from "vuex";
export default {
  computed: {
    ...mapGetters(["loadingState"]),
  },
  components: {
    Header,
    Footer,
    Catalog
  },
  methods: {
    ...mapActions(["fetchCatalog", "fetchFeedbacks"])
  },
  created() {
    this.fetchCatalog();
    this.fetchFeedbacks();
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
