<script setup lang="ts">
import InputError from '@/views/components/InputError.vue'
import TextLink from '@/views/components/TextLink.vue'
import { Button } from '@/views/components/ui/button'
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/views/components/ui/card'
import { Input } from '@/views/components/ui/input'
import { Label } from '@/views/components/ui/label'
import AuthLayout from '@base/views/layouts/auth/layout-auth.vue'
import { Head, useForm } from '@inertiajs/vue3'

defineProps<{
    status?: string
}>()

const form = useForm({
    login: '',
    password: '',
    remember: false,
})

const onFormSubmit = () => {
    form.post(route('base::session.store'), {
        onFinish: () => form.reset('password'),
    })
}

defineOptions({
    layout: AuthLayout,
})
</script>

<template>
    <Head title="Log in" />

    <div class="flex flex-col gap-6">
        <div v-if="status" class="mb-4 text-center text-sm font-medium text-green-600">
            {{ status }}
        </div>

        <Card>
            <CardHeader>
                <CardTitle>Login to your account</CardTitle>
                <CardDescription>Enter your credentials to login to your account</CardDescription>
            </CardHeader>
            <CardContent>
                <form @submit.prevent="onFormSubmit">
                    <div class="flex flex-col gap-6">
                        <div class="grid gap-3">
                            <Label for="input-account-id">Account ID</Label>
                            <Input id="input-account-id" placeholder="Account ID" v-model="form.login" required autofocus />
                            <InputError :message="form.errors.login" />
                        </div>
                        <div class="grid gap-3">
                            <div class="flex items-center">
                                <Label for="input-password">Password</Label>
                                <TextLink :href="route('password.request')" class="ml-auto inline-block text-sm underline-offset-4 hover:underline">
                                    Forgot your password?
                                </TextLink>
                            </div>
                            <Input
                                id="input-password"
                                type="password"
                                required
                                autocomplete="current-password"
                                v-model="form.password"
                                placeholder="Password"
                            />
                            <InputError :message="form.errors.password" />
                        </div>
                        <div class="flex flex-col gap-3">
                            <Button type="submit" class="w-full" :disabled="form.processing">Login</Button>
                        </div>
                    </div>
                    <div class="mt-4 text-center text-sm">
                        <span>Don&apos;t have an account?</span>
                        <TextLink :href="route('register')" class="underline underline-offset-4"> Sign up</TextLink>
                    </div>
                </form>
            </CardContent>
        </Card>
    </div>
</template>

<style scoped></style>
