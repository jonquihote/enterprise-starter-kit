<script setup lang="ts">
import type { BreadcrumbItemType } from '@/types'
import AppContent from '@/views/components/AppContent.vue'
import AppHeader from '@/views/components/AppHeader.vue'
import AppShell from '@/views/components/AppShell.vue'

interface Props {
    breadcrumbs?: BreadcrumbItemType[]
}

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
})
</script>

<template>
    <AppShell class="flex-col">
        <AppHeader :breadcrumbs="breadcrumbs" />
        <AppContent>
            <slot />
        </AppContent>
    </AppShell>
</template>
