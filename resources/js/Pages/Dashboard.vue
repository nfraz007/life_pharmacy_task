<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeSection from "@/Components/Section.vue";
import { Head } from "@inertiajs/inertia-vue3";
defineProps([
    "total_user",
    "total_product",
    "total_order",
    "total_transaction",
]);
</script>

<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <div class="max-w-7xl mx-auto">
            <div class="md:grid md:grid-cols-4">
                <BreezeSection
                    :title="total_user"
                    subtitle="User"
                    class="md:col-span-1"
                >
                </BreezeSection>
                <BreezeSection
                    :title="total_product"
                    subtitle="Product"
                    class="md:col-span-1"
                >
                </BreezeSection>
                <BreezeSection
                    :title="total_order"
                    subtitle="Order"
                    class="md:col-span-1"
                >
                </BreezeSection>
                <BreezeSection
                    :title="total_transaction"
                    subtitle="Transaction"
                    class="md:col-span-1"
                >
                </BreezeSection>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
