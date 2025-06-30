<script setup lang="ts">
import type { BreadcrumbItemType } from '@/types'
import Breadcrumbs from '@/views/components/Breadcrumbs.vue'
import { SidebarTrigger } from '@/views/components/ui/sidebar'

withDefaults(
    defineProps<{
        breadcrumbs?: BreadcrumbItemType[]
    }>(),
    {
        breadcrumbs: () => [],
    },
)
</script>

<template>
    <header
        class="border-sidebar-border/70 group-has-data-[collapsible=icon]/sidebar-wrapper:h-12 flex h-16 shrink-0 items-center gap-2 border-b px-6 transition-[width,height] ease-linear md:px-4"
    >
        <div class="flex items-center gap-2">
            <SidebarTrigger class="-ml-1" />
            <template v-if="breadcrumbs && breadcrumbs.length > 0">
                <Breadcrumbs :breadcrumbs="breadcrumbs" />
            </template>
        </div>
    </header>
</template>
