<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";
import BreezeSection from "@/Components/Section.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeSelect from "@/Components/Select.vue";
import BreezeButton from "@/Components/Button.vue";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";
import { computed } from "@vue/runtime-core";

const props = defineProps(["order", "type_data"]);
const form = useForm({
    type: "",
    amount: "",
});
const title = computed(() => `Add Transaction For Order #${props.order.id}`);

const submit = () => {
    form.post(route("transaction.store", props.order.id));
};
</script>

<template>
    <Head title="Transaction" />

    <BreezeAuthenticatedLayout>
        <BreezeSection :title="title">
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 py-5 sm:px-6">
                            <h3
                                class="text-lg font-medium leading-6 text-gray-900"
                            >
                                Transaction Information
                            </h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Use a permanent address where you can receive
                                mail.
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:col-span-2 md:mt-0">
                        <form @submit.prevent="submit">
                            <div class="overflow-hidden shadow sm:rounded-md">
                                <div class="bg-white px-4 py-5 sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <BreezeLabel
                                                for="type"
                                                value="Type"
                                            />
                                            <BreezeSelect
                                                id="type"
                                                class="mt-1 block w-full"
                                                v-model="form.type"
                                                required
                                                :data="type_data"
                                            />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <BreezeLabel
                                                for="amount"
                                                value="Amount"
                                            />
                                            <BreezeInput
                                                id="amount"
                                                type="number"
                                                class="mt-1 block w-full"
                                                v-model="form.amount"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <BreezeValidationErrors class="mt-4" />
                                </div>
                                <div class="px-4 py-3 text-right sm:px-6">
                                    <BreezeButton>Save</BreezeButton>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </BreezeSection>
    </BreezeAuthenticatedLayout>
</template>
