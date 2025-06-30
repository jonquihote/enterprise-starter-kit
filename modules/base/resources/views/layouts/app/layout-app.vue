<script setup lang="ts">
import type { BreadcrumbItemType } from '@/types'
import AppLayout from '@base/views/layouts/app/layout-sidebar-app.vue'

interface Props {
    breadcrumbs?: BreadcrumbItemType[]
}

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
})
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <slot />
    </AppLayout>
</template>
