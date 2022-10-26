<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import BreezeTable from "@/Components/Table.vue";
import BreezeSection from "@/Components/Section.vue";
import BreezeButton from "@/Components/Button.vue";
import BreezeNavLink from "@/Components/NavLink.vue";
defineProps({
    headers: Array,
    items: Array,
});
</script>

<template>
    <Head title="Users" />

    <BreezeAuthenticatedLayout>
        <BreezeSection
            title="Users List"
            subtitle="List of all user using the application"
        >
            <template #action>
                <BreezeNavLink :href="route('user.create')">
                    <BreezeButton>Add User</BreezeButton>
                </BreezeNavLink>
            </template>
            <BreezeTable :headers="headers" :items="items"></BreezeTable>
        </BreezeSection>
    </BreezeAuthenticatedLayout>
</template>
