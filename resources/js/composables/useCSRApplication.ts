import { resolvePage, resolveTitle } from '@/composables/useResolver'
import { createInertiaApp } from '@inertiajs/vue3'
import { createApp, h } from 'vue'
import { ZiggyVue } from 'ziggy-js'

const bootstrapApplication = (el: any, App: any, props: any, plugin: any): void => {
    createApp({ render: () => h(App, props) })
        .use(plugin)
        .use(ZiggyVue)
        .mount(el)
}

const initializeApplication = (): void => {
    void createInertiaApp({
        title: resolveTitle,
        resolve: resolvePage,
        setup({ el, App, props, plugin }): void {
            bootstrapApplication(el, App, props, plugin)
        },
        progress: {
            color: '#4B5563',
        },
    })
}

export { initializeApplication }
