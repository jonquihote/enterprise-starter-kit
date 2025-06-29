import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import { DefineComponent } from 'vue'

const resolveTitle = (title?: string): string => {
    const applicationName = import.meta.env.VITE_APP_NAME || 'E.N.T.E.R.P.R.I.S.E'

    return title ? `${title} - ${applicationName}` : applicationName
}

const resolvePage = (name: string) => {
    const isModulePage: boolean = name.includes('::')

    if (isModulePage) {
        const [module, page] = name.split('::')
        const path: string = page.split('.').join('/')

        return resolvePageComponent(
            `../../../modules/${module}/resources/views/pages/${path}.vue`,
            import.meta.glob<DefineComponent>(`../../../modules/**/resources/views/pages/**/*.vue`),
        )
    }

    return resolvePageComponent(`../pages/${name}.vue`, import.meta.glob<DefineComponent>('../pages/**/*.vue'))
}
export { resolvePage, resolveTitle }
