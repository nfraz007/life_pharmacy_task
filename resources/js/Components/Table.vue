<script setup>
import BreezeButton from "@/Components/Button.vue";
import BreezeNavLink from "@/Components/NavLink.vue";

defineProps(["headers", "items"]);
</script>
<template>
    <div class="overflow-x-auto relative">
        <table
            class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
        >
            <thead
                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
            >
                <tr v-if="headers">
                    <th
                        scope="col"
                        class="py-3 px-6"
                        v-for="header in headers"
                        :key="header"
                    >
                        {{ header }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                    v-for="item in items.data"
                    :key="item"
                >
                    <td
                        class="py-4 px-6"
                        v-for="(itemInner, itemIndex) in item"
                        :key="itemInner"
                    >
                        <BreezeNavLink
                            :href="itemInner"
                            v-if="itemIndex == 'action_show'"
                            >View</BreezeNavLink
                        >
                        <span v-else> {{ itemInner }} </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
