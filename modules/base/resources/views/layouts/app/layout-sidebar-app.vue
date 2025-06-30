<script setup lang="ts">
import type { BreadcrumbItemType } from '@/types'
import AppContent from '@/views/components/AppContent.vue'
import AppShell from '@/views/components/AppShell.vue'
import AppSidebar from '@/views/components/AppSidebar.vue'
import AppSidebarHeader from '@/views/components/AppSidebarHeader.vue'

interface Props {
    breadcrumbs?: BreadcrumbItemType[]
}

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
})
</script>

<template>
    <AppShell variant="sidebar">
        <AppSidebar />
        <AppContent variant="sidebar">
            <AppSidebarHeader :breadcrumbs="breadcrumbs" />
            <slot />
        </AppContent>
    </AppShell>
</template>
