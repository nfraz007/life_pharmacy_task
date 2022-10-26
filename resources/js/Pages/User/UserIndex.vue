<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import BreezeTable from "@/Components/Table.vue";
defineProps({
    headers: Array,
    items: Array,
});
</script>

<template>
    <Head title="Users" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <BreezeTable
                        :headers="headers"
                        :items="items"
                    ></BreezeTable>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
