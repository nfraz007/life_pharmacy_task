<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";
import BreezeSection from "@/Components/Section.vue";
import BreezeSectionBody from "@/Components/SectionBody.vue";
import BreezeNavLink from "@/Components/NavLink.vue";
import BreezeButton from "@/Components/Button.vue";
import BreezeTable from "@/Components/Table.vue";
import { computed } from "@vue/runtime-core";
const props = defineProps({
    order: Object,
    headers: Array,
    items: Array,
});
const title = computed(() => `Order Details #${props.order.id}`);

const form = useForm({});
const delete_order = () => {
    if (confirm("Are you sure you want to delete ?")) {
        form.delete(route("order.destroy", props.order.id));
    }
};
const mark_inprocess = () => {
    if (confirm("Are you sure you want to mark as inprocess ?")) {
        form.post(route("order.mark_inprocess", props.order.id));
    }
};
const mark_completed = () => {
    if (confirm("Are you sure you want to mark as completed ?")) {
        form.post(route("order.mark_completed", props.order.id));
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
                <BreezeButton
                    @click="mark_inprocess"
                    class="mr-1"
                    v-if="order.status == 0"
                    >Mark Inprocess</BreezeButton
                >
                <BreezeButton
                    @click="mark_completed"
                    class="mr-1"
                    v-else-if="order.status == 1"
                    >Mark Completed</BreezeButton
                >
                <BreezeButton @click="delete_order">Delete Order</BreezeButton>
            </template>
            <BreezeSectionBody :data="data"></BreezeSectionBody>
        </BreezeSection>
        <BreezeSection
            title="Transaction List"
            subtitle="List of all transaction in the application"
        >
            <template #action>
                <BreezeNavLink :href="route('transaction.create', order.id)">
                    <BreezeButton>Add Order</BreezeButton>
                </BreezeNavLink>
            </template>
            <BreezeTable :headers="headers" :items="items"></BreezeTable>
        </BreezeSection>
    </BreezeAuthenticatedLayout>
</template>
