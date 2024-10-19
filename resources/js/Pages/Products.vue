<script setup>
import {Link, useForm} from "@inertiajs/vue3";
import SvgIcon from "@jamescoyle/vue-icon";
import {mdiTrashCan} from "@mdi/js";

let props = defineProps({products: Array})

let form = useForm({
    products: props.products ?? [],
});

let submit = () => {
    form.patch(route('products.update'), {
        preserveScroll: true,
        onSuccess: () => form.products = props.products ?? [],
    });
}
</script>

<template>
    <div class="p-3 bg-gray-100 min-h-screen">
        <div class="border rounded bg-white overflow-hidden">
            <h1 class="p-2 bg-violet-700 text-white text-sm">Новая закупка</h1>
            <form @submit.prevent class="p-3">
                <div class="border rounded overflow-hidden">
                    <h2 class="p-2 bg-cyan-600 text-white text-xs">Товарные позиции</h2>
                    <div class="p-3">
                        <div v-if="Object.keys(form.errors).length" class="p-2 bg-red-600 text-white text-xs rounded">
                            {{ Object.values(form.errors)[0] }}
                        </div>
                        <div class="p-2 bg-green-600 text-white text-xs rounded" v-if="$page.props.flash.success">
                            {{ $page.props.flash.success }}
                        </div>
                        <table class="mt-3 w-full text-left text-xs">
                            <tbody>
                            <tr class="border-y">
                                <th>Наименование продукта</th>
                                <th>Количество шт</th>
                                <th>Стоимость продукта Руб</th>
                            </tr>
                            <tr class="border-y" v-for="(product, index) in form.products" :key="product.id">
                                <td v-if="form.products[index]"><input v-model="form.products[index].name" required/></td>
                                <td v-if="form.products[index]"><input v-model="form.products[index].stock" type="number" required></td>
                                <td v-if="form.products[index]"><input v-model="form.products[index].price" type="number" required></td>
                                <td>
                                    <svg-icon @click="form.products.splice(index, 1);" :path="mdiTrashCan" type="mdi"
                                              class="p-1 bg-red-600 text-white rounded cursor-pointer"/>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button @click="form.products.push({id: null, name: null, stock: null, price: null})" class="py-1 px-2 hover:bg-cyan-100 text-cyan-600 border rounded flex items-center gap-1">
                                        <span class="p-0.5 w-3 h-3 bg-cyan-400 text-white font-bold rounded-full flex items-center">+</span>
                                        Добавить
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mt-3 flex gap-1">
                    <Link :href="route('products.index')" class="py-1 px-2 bg-gray-600 text-white text-xs rounded">Отмена</Link>
                    <button @click="submit()" class="py-1 px-2 bg-green-600 text-white text-xs rounded">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</template>
<style scoped>
th, td {
    @apply p-2
}

td input {
    @apply py-1 rounded border-gray-300 w-full
}
</style>
