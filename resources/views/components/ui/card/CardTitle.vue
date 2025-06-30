<script setup lang="ts">
import { cn } from '@/scripts/lib/utils'
import type { HTMLAttributes } from 'vue'

const props = defineProps<{
    class?: HTMLAttributes['class']
}>()
</script>

<template>
    <h3 data-slot="card-title" :class="cn('font-semibold leading-none', props.class)">
        <slot />
    </h3>
</template>
