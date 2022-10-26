<script setup>
defineProps({
    title: {
        type: String,
    },
    subtitle: {
        type: String,
        default: "",
    },
});
</script>

<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <div class="md:grid md:grid-cols-2 md:gap-6">
                            <div class="md:col-span-1">
                                <h3
                                    class="text-lg font-medium leading-6 text-gray-900"
                                >
                                    {{ title }}
                                </h3>
                                <p
                                    class="mt-1 max-w-2xl text-sm text-gray-500"
                                    v-if="subtitle"
                                >
                                    {{ subtitle }}
                                </p>
                            </div>
                            <div class="md:col-span-1">
                                <div class="py-3 text-right">
                                    <div v-if="$slots.action">
                                        <slot name="action" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-t border-gray-200">
                        <slot></slot>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
