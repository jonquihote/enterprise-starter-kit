<script setup lang="ts">
import { cn } from '@/scripts/lib/utils'
import { Button } from '@/views/components/ui/button'
import { PanelLeft } from 'lucide-vue-next'
import type { HTMLAttributes } from 'vue'
import { useSidebar } from './utils'

const props = defineProps<{
    class?: HTMLAttributes['class']
}>()

const { toggleSidebar } = useSidebar()
</script>

<template>
    <Button data-sidebar="trigger" data-slot="sidebar-trigger" variant="ghost" size="icon" :class="cn('h-7 w-7', props.class)" @click="toggleSidebar">
        <PanelLeft />
        <span class="sr-only">Toggle Sidebar</span>
    </Button>
</template>
