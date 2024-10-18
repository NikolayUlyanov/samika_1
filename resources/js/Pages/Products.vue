<script setup>
import {useForm} from "@inertiajs/vue3";

let props = defineProps({products: Array})

let form = useForm({
    products: props.products ?? [],
});
</script>

<template>
    <div class="p-3 bg-gray-100 min-h-screen">
        <div class="border rounded bg-white overflow-hidden">
            <h1 class="p-2 bg-violet-700 text-white text-sm">Новая закупка</h1>
            <div class="p-3">
                <div class="border rounded overflow-hidden">
                    <h2 class="p-2 bg-cyan-600 text-white text-xs">товарные позиции</h2>

                    <div class="p-3">
                        <div class="p-2 bg-red-600 text-white text-xs rounded">flash</div>

                        <table class="mt-3 w-full text-left text-xs">
                            <tbody>
                            <tr class="border-y">
                                <th>Наименование продукта</th>
                                <th>Количество шт</th>
                                <th>Стоимость продукта Руб</th>
                            </tr>
                            <tr class="border-y" v-for="(product, index) in products" :key="product.id">
                                <td><input v-model="form.products[index].name"></td>
                                <td><input v-model="form.products[index].stock" type="number"></td>
                                <td><input v-model="form.products[index].price" type="number"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mt-3 flex gap-1">
                    <button class="py-1 px-2 bg-gray-600 text-white text-xs rounded">Отмена</button>
                    <button class="py-1 px-2 bg-green-600 text-white text-xs rounded">Отмена</button>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
th, td {
    @apply p-2
}

td input {
    @apply py-1 rounded border-gray-300
}
</style>
