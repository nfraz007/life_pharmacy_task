<script setup>
defineProps(["data"]);
</script>

<template>
    <dl>
        <div v-for="(value, key, index) in data" :key="key">
            <div
                class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                :class="[index % 2 ? 'bg-gray-50' : 'bg-white']"
            >
                <dt class="text-sm font-medium text-gray-500">{{ key }}</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                    {{ value }}
                </dd>
            </div>
        </div>
    </dl>
</template>
