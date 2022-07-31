<template>
  <div class="products-category-1">
    <a :href="'/' + code"><img :src="'/' + img" :alt="title"></a>
    <a :href="'/' + code"><h5> {{ title }} </h5></a>
    <p>{{ price }} грн.</p>
    <a :href="'/cart/add/' + code">Купити</a>
  </div>
</template>

<script>
export default {
  name: "Product",
  props: {
    code: {
      type: Number,
      isRequired: true,
    },
    title: {
      type: String,
      isRequired: true,
    },
    price: {
      type: Number,
    },
    img: {
      type: String,
    },
  },
}
</script>