<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import BreezeSection from "@/Components/Section.vue";
import BreezeNavLink from "@/Components/NavLink.vue";
import BreezeButton from "@/Components/Button.vue";
import { computed } from "@vue/runtime-core";
const props = defineProps({
    user: Object,
});
const title = computed(() => `User Details #${props.user.id}`);
</script>

<template>
    <Head title="Users" />

    <BreezeAuthenticatedLayout>
        <BreezeSection
            :title="title"
            subtitle="Detail of user using the application"
        >
            <template #action>
                <BreezeNavLink :href="route('user.create')">
                    <BreezeButton>Add User</BreezeButton>
                </BreezeNavLink>
                <BreezeNavLink :href="route('user.edit', 1)">
                    <BreezeButton>Edit User</BreezeButton>
                </BreezeNavLink>
                <BreezeNavLink :href="route('user.create')">
                    <BreezeButton>Delete User</BreezeButton>
                </BreezeNavLink>
            </template>
            <dl>
                <div
                    class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                >
                    <dt class="text-sm font-medium text-gray-500">ID</dt>
                    <dd
                        class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"
                    >
                        {{ user.id }}
                    </dd>
                </div>
                <div
                    class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                >
                    <dt class="text-sm font-medium text-gray-500">Full Name</dt>
                    <dd
                        class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"
                    >
                        {{ user.name }}
                    </dd>
                </div>
                <div
                    class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                >
                    <dt class="text-sm font-medium text-gray-500">Email</dt>
                    <dd
                        class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"
                    >
                        {{ user.email }}
                    </dd>
                </div>
                <div
                    class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                >
                    <dt class="text-sm font-medium text-gray-500">
                        Created At
                    </dt>
                    <dd
                        class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"
                    >
                        {{ user.created_at }}
                    </dd>
                </div>
                <div
                    class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                >
                    <dt class="text-sm font-medium text-gray-500">
                        Updated At
                    </dt>
                    <dd
                        class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"
                    >
                        {{ user.updated_at }}
                    </dd>
                </div>
            </dl>
        </BreezeSection>
    </BreezeAuthenticatedLayout>
</template>
