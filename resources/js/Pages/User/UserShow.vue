<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";
import BreezeSection from "@/Components/Section.vue";
import BreezeSectionBody from "@/Components/SectionBody.vue";
import BreezeNavLink from "@/Components/NavLink.vue";
import BreezeButton from "@/Components/Button.vue";
import { computed } from "@vue/runtime-core";
const props = defineProps({
    user: Object,
});
const title = computed(() => `User Details #${props.user.id}`);

const form = useForm({});
const delete_user = () => {
    if (confirm("Are you sure you want to delete ?")) {
        form.delete(route("user.destroy", props.user.id));
    }
};
const data = {
    ID: props.user?.id,
    Name: props.user?.name,
    Email: props.user?.email,
    "Created At": props.user?.created_at_label,
    "Updated At": props.user?.updated_at_label,
    "Email Verified At": props.user?.email_verified_at_label,
};
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
                <BreezeNavLink :href="route('user.edit', user.id)">
                    <BreezeButton>Edit User</BreezeButton>
                </BreezeNavLink>
                <BreezeButton @click="delete_user">Delete User</BreezeButton>
            </template>
            <BreezeSectionBody :data="data"></BreezeSectionBody>
        </BreezeSection>
    </BreezeAuthenticatedLayout>
</template>
