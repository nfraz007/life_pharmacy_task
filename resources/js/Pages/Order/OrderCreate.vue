<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";
import BreezeSection from "@/Components/Section.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeSelect from "@/Components/Select.vue";
import BreezeButton from "@/Components/Button.vue";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";
import { computed, watch } from "@vue/runtime-core";

const props = defineProps(["user_data", "product_data", "product_price_data"]);
const form = useForm({
    user_id: "",
    product_id: "",
    product_price: "",
    qty: "",
    total: "",
});

const product_price = computed(() =>
    form.product_id ? props.product_price_data[form.product_id] : ""
);

watch(form, () => {
    form.product_price = form.product_id
        ? props.product_price_data[form.product_id]
        : "";
    form.total =
        form.product_price && form.qty ? form.product_price * form.qty : 0;
});

const submit = () => {
    form.post(route("order.store"));
};
</script>

<template>
    <Head title="Order" />

    <BreezeAuthenticatedLayout>
        <BreezeSection title="Add Order">
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 py-5 sm:px-6">
                            <h3
                                class="text-lg font-medium leading-6 text-gray-900"
                            >
                                Order Information
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
                                        <div class="col-span-6 sm:col-span-6">
                                            <BreezeLabel
                                                for="user_id"
                                                value="User"
                                            />
                                            <BreezeSelect
                                                id="user_id"
                                                class="mt-1 block w-full"
                                                v-model="form.user_id"
                                                required
                                                :data="user_data"
                                            />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <BreezeLabel
                                                for="product_id"
                                                value="Product"
                                            />
                                            <BreezeSelect
                                                id="product_id"
                                                class="mt-1 block w-full"
                                                v-model="form.product_id"
                                                required
                                                :data="product_data"
                                            />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <BreezeLabel
                                                for="product_price"
                                                value="Product Price"
                                            />
                                            <BreezeInput
                                                id="product_price"
                                                type="number"
                                                class="mt-1 block w-full"
                                                v-model="form.product_price"
                                                required
                                                disabled
                                            />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <BreezeLabel
                                                for="qty"
                                                value="Qty"
                                            />
                                            <BreezeInput
                                                id="qty"
                                                type="number"
                                                class="mt-1 block w-full"
                                                v-model="form.qty"
                                                required
                                            />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <BreezeLabel
                                                for="total"
                                                value="Total"
                                            />
                                            <BreezeInput
                                                id="total"
                                                type="number"
                                                class="mt-1 block w-full"
                                                v-model="form.total"
                                                required
                                                disabled
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
