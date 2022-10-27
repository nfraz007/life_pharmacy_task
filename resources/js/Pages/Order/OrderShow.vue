<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";
import BreezeSection from "@/Components/Section.vue";
import BreezeSectionBody from "@/Components/SectionBody.vue";
import BreezeNavLink from "@/Components/NavLink.vue";
import BreezeButton from "@/Components/Button.vue";
import { computed } from "@vue/runtime-core";
const props = defineProps({
    order: Object,
});
const title = computed(() => `Order Details #${props.order.id}`);

const form = useForm({});
const delete_order = () => {
    if (confirm("Are you sure you want to delete ?")) {
        form.delete(route("order.destroy", props.order.id));
    }
};
const data = {
    ID: props.order?.id,
    User: props.order?.user_name,
    Product: props.order?.product_name,
    Price: props.order?.product_price,
    Qty: props.order?.qty,
    Total: props.order?.total,
    Status: props.order?.status_label,
    "Transaction Status": props.order?.transaction_status_label,
    "Created At": props.order?.created_at_label,
    "Updated At": props.order?.updated_at_label,
};
</script>

<template>
    <Head title="Orders" />

    <BreezeAuthenticatedLayout>
        <BreezeSection
            :title="title"
            subtitle="Detail of order in the application"
        >
            <template #action>
                <BreezeNavLink :href="route('order.create')">
                    <BreezeButton>Add Order</BreezeButton>
                </BreezeNavLink>
                <BreezeNavLink :href="route('order.edit', order.id)">
                    <BreezeButton>Edit Order</BreezeButton>
                </BreezeNavLink>
                <BreezeButton @click="delete_order">Delete Order</BreezeButton>
            </template>
            <BreezeSectionBody :data="data"></BreezeSectionBody>
        </BreezeSection>
    </BreezeAuthenticatedLayout>
</template>
