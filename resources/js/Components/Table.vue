<script setup>
import BreezeButton from "@/Components/Button.vue";
import BreezeNavLink from "@/Components/NavLink.vue";

defineProps(["headers", "items"]);
</script>
<template>
    <div class="overflow-x-auto relative">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
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
                <tr class="bg-white border-b" v-for="item in items" :key="item">
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
