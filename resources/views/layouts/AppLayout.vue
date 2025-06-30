<script setup lang="ts">
import type { BreadcrumbItemType } from '@/types'
import AppLayout from '@/views/layouts/app/AppSidebarLayout.vue'

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
