import {createApp, h} from "vue";
import Layout from "@/Shared/Layout.vue";
import route from 'ziggy-js'
import {createInertiaApp, Head, Link} from "@inertiajs/vue3";
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers'

const appName = document.getElementsByTagName("title")[0]?.innerText || "Laravel"

createInertiaApp({
  progress: {
    color: "red",
    showSpinner: true,
  },
  title: (title) => `${title} - ${appName}`,
  // resolve: name => {
  //   let page = require(`./Pages/${name}`).default;
  //   page.layout ??= Layout;
  //   return page;
  // },
  resolve: (name) => {
    let page = resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue'))
    page.then((module) => module.default.layout ??= Layout);
    return page;
  },
  setup({el, App, props, plugin}) {
    createApp({render: () => h(App, props)})
      .use(plugin)
      .mixin({methods: {route}})
      .component("Link", Link)
      .component("Head", Head)
      .mount(el);
  },
});
