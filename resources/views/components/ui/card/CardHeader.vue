<script setup lang="ts">
import { cn } from '@/scripts/lib/utils'
import type { HTMLAttributes } from 'vue'

const props = defineProps<{
    class?: HTMLAttributes['class']
}>()
</script>

<template>
    <div
        data-slot="card-header"
        :class="
            cn(
                '@container/card-header has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6 grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6',
                props.class,
            )
        "
    >
        <slot />
    </div>
</template>
