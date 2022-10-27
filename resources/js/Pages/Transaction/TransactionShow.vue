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
    transaction: Object,
});
const title = computed(() => `Transaction Details #${props.transaction.id}`);

const form = useForm({});
const delete_transaction = () => {
    if (confirm("Are you sure you want to delete ?")) {
        form.delete(
            route("transaction.destroy", [props.order.id, props.transaction.id])
        );
    }
};
const data = {
    ID: props.transaction?.id,
    Type: props.transaction?.type_label,
    Amount: props.transaction?.amount,
    "Created At": props.transaction?.created_at_label,
    "Updated At": props.transaction?.updated_at_label,
};
</script>

<template>
    <Head title="Transactions" />

    <BreezeAuthenticatedLayout>
        <BreezeSection
            :title="title"
            subtitle="Detail of transaction in the application"
        >
            <template #action>
                <BreezeNavLink :href="route('transaction.create', order.id)">
                    <BreezeButton>Add Transaction</BreezeButton>
                </BreezeNavLink>
                <BreezeNavLink
                    :href="
                        route('transaction.edit', [order.id, transaction.id])
                    "
                >
                    <BreezeButton>Edit Transaction</BreezeButton>
                </BreezeNavLink>
                <BreezeButton @click="delete_transaction"
                    >Delete Transaction</BreezeButton
                >
            </template>
            <BreezeSectionBody :data="data"></BreezeSectionBody>
        </BreezeSection>
    </BreezeAuthenticatedLayout>
</template>
