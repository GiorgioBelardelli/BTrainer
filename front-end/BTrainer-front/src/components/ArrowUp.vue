<template>
  <div v-if="showArrow" @click="scrollToTop" class="arrow-button">
    <i class="fa-solid fa-chevron-up" style="color: #ffcc00; font-size: 1.5rem;"></i>
  </div>
</template>

<script>
export default {
  data() {
    return {
      showArrow: false
    };
  },
  methods: {
    handleScroll() {
      this.showArrow = window.scrollY > 0;
    },
    scrollToTop() {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }
  },
  mounted() {
    window.addEventListener('scroll', this.handleScroll);
  },
  beforeDestroy() {
    window.removeEventListener('scroll', this.handleScroll);
  }
};
</script>


<style scoped>
.arrow-button {
  position: fixed;
  bottom: 2rem;
  right: 2rem;
  cursor: pointer;
  border: 5px solid #696969;
  border-radius: 50%;
  padding: .5rem .3rem;
  z-index: 200;
}

@media all and (max-width: 720px) {
  .arrow-button {
    display: none;
  }
}
</style>
