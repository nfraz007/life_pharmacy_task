<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";
import BreezeSection from "@/Components/Section.vue";
import BreezeSectionBody from "@/Components/SectionBody.vue";
import BreezeNavLink from "@/Components/NavLink.vue";
import BreezeButton from "@/Components/Button.vue";
import { computed } from "@vue/runtime-core";
const props = defineProps({
    product: Object,
});
const title = computed(() => `Product Details #${props.product.id}`);

const form = useForm({});
const delete_product = () => {
    if (confirm("Are you sure you want to delete ?")) {
        form.delete(route("product.destroy", props.product.id));
    }
};
const data = {
    ID: props.product?.id,
    Name: props.product?.name,
    Price: props.product?.price,
    "In Stock": props.product?.in_stock_label,
    "Created At": props.product?.created_at_label,
    "Updated At": props.product?.updated_at_label,
};
</script>

<template>
    <Head title="Products" />

    <BreezeAuthenticatedLayout>
        <BreezeSection
            :title="title"
            subtitle="Detail of product in the application"
        >
            <template #action>
                <BreezeNavLink :href="route('product.create')">
                    <BreezeButton>Add Product</BreezeButton>
                </BreezeNavLink>
                <BreezeNavLink :href="route('product.edit', product.id)">
                    <BreezeButton>Edit Product</BreezeButton>
                </BreezeNavLink>
                <BreezeButton @click="delete_product"
                    >Delete Product</BreezeButton
                >
            </template>
            <BreezeSectionBody :data="data"></BreezeSectionBody>
        </BreezeSection>
    </BreezeAuthenticatedLayout>
</template>
