<script setup lang="ts">
import { cn } from '@/scripts/lib/utils'
import { Label, type LabelProps } from 'reka-ui'
import { computed, type HTMLAttributes } from 'vue'

const props = defineProps<LabelProps & { class?: HTMLAttributes['class'] }>()

const delegatedProps = computed(() => {
    const { class: _, ...delegated } = props

    return delegated
})
</script>

<template>
    <Label
        data-slot="label"
        v-bind="delegatedProps"
        :class="
            cn(
                'flex select-none items-center gap-2 text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-50 group-data-[disabled=true]:pointer-events-none group-data-[disabled=true]:opacity-50',
                props.class,
            )
        "
    >
        <slot />
    </Label>
</template>
