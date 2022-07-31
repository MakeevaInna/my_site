import { createApp } from "vue";
import ProductsList from "./components/ProductsList";

const app = createApp({});

app.component("products-list", ProductsList);
app.mount("#app");
