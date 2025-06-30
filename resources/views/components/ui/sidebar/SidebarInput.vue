<script setup lang="ts">
import { cn } from '@/scripts/lib/utils'
import { Input } from '@/views/components/ui/input'
import type { HTMLAttributes } from 'vue'

const props = defineProps<{
    class?: HTMLAttributes['class']
}>()
</script>

<template>
    <Input data-slot="sidebar-input" data-sidebar="input" :class="cn('bg-background h-8 w-full shadow-none', props.class)">
        <slot />
    </Input>
</template>
