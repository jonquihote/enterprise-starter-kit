<script setup lang="ts">
import AuthLayout from '@base/views/layouts/auth/layout-simple-auth.vue'

defineProps<{
    title?: string
    description?: string
}>()
</script>

<template>
    <AuthLayout :title="title" :description="description">
        <slot />
    </AuthLayout>
</template>
