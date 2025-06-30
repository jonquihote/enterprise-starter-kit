<script lang="ts" setup>
import { cn } from '@/scripts/lib/utils'
import type { HTMLAttributes } from 'vue'

const props = defineProps<{
    class?: HTMLAttributes['class']
}>()
</script>

<template>
    <ol
        data-slot="breadcrumb-list"
        :class="cn('text-muted-foreground flex flex-wrap items-center gap-1.5 break-words text-sm sm:gap-2.5', props.class)"
    >
        <slot />
    </ol>
</template>
