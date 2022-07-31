<template>
  <div class="products-category">
          <product
              v-for="product in products"
              :key="product.code"
              :code="product.code"
              :title="product.title"
              :price="product.price"
              :img="product.img"
          />
  </div>
</template>

<script>
import Product from "./Product";
export default {
  name: "ProductsList",
  components: {
    Product,
  },
  data: () => ({
    products: [],
  }),
  mounted() {
    this.fetchProducts();
  },
  methods: {
    async fetchProducts() {
      try {
        const response = await fetch('http://mysite.loc:8080/api/products');
        this.products = await response.json();
      } catch (e) {
        console.error("Fetching error");
      }
    },
  },
}
</script>