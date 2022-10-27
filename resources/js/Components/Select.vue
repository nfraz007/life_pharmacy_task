<script setup>
defineProps(["modelValue", "data"]);
defineEmits(["update:modelValue"]);
</script>

<template>
    <select
        @input="$emit('update:modelValue', $event.target.value)"
        class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
    >
        <option>Select an option</option>
        <option
            v-for="(value, key) in data"
            :key="key"
            :value="key"
            :selected="key == modelValue ? true : false"
        >
            {{ value }}
        </option>
    </select>
</template>
