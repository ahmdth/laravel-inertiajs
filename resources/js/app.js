import {createApp, h} from "vue";
import {createInertiaApp, Link, Head} from "@inertiajs/inertia-vue3";
import {InertiaProgress} from "@inertiajs/progress";
import Layout from "@/Shared/Layout";

const appName = document.getElementsByTagName("title")[0]?.innerText || "Laravel"

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: name => {
    let page = require(`./Pages/${name}`).default;
    page.layout ??= Layout;
    return page;
  },

  setup({el, App, props, plugin}) {
    createApp({render: () => h(App, props)})
      .use(plugin)
      // .mixin({methods: {route}})
      .component("Link", Link)
      .component("Head", Head)
      .mount(el);
  },
});

InertiaProgress.init({
  color: "red",
  showSpinner: true,
});
