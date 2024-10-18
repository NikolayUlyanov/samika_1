<script setup>
import {useForm} from "@inertiajs/vue3";

let props = defineProps({products: Array})

let form = useForm({
    products: props.products ?? [],
});
</script>

<template>
    <div>
        <h1 class="p-2 bg-violet-700 text-white text-sm">Новая закупка</h1>
        <div class="p-3">
            <h2 class="p-2 bg-cyan-600 text-white text-xs rounded-t">товарные позиции</h2>

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
                        <td><input v-model="form.products[index].stock"></td>
                        <td><input v-model="form.products[index].price"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<style scoped>
th, td{
    @apply p-2
}

td input{
    @apply rounded border-gray-300
}
</style>
