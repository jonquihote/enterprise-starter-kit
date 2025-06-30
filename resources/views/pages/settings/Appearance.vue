<script setup lang="ts">
import { Head } from '@inertiajs/vue3'

import { type BreadcrumbItem } from '@/types'
import AppearanceTabs from '@/views/components/AppearanceTabs.vue'
import HeadingSmall from '@/views/components/HeadingSmall.vue'

import AppLayout from '@/views/layouts/AppLayout.vue'
import SettingsLayout from '@/views/layouts/settings/Layout.vue'

const breadcrumbItems: BreadcrumbItem[] = [
    {
        title: 'Appearance settings',
        href: '/settings/appearance',
    },
]
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbItems">
        <Head title="Appearance settings" />

        <SettingsLayout>
            <div class="space-y-6">
                <HeadingSmall title="Appearance settings" description="Update your account's appearance settings" />
                <AppearanceTabs />
            </div>
        </SettingsLayout>
    </AppLayout>
</template>
