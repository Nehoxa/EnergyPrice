<template>

  <Head title="Prix Carburant" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Prix Carburant</h2>
    </template>

    <Message :message="$page.props.flash.message" />

    <div class="flex m-3">
      <TextInput @keyup="search" id="searchFuel" v-model="searchFuel" type="text" class="mx-3 mt-6" placeholder="Search..." />
    </div>
    <div class="overflow-x-auto relative rounded-md m-6">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="py-3 px-6">
              Pump
            </th>
            <th scope="col" class="py-3 px-6">
              Code Postal
            </th>
            <th scope="col" class="py-3 px-6">
              Ville
            </th>
            <th scope="col" class="py-3 px-6">
              Carburant
            </th>
            <th scope="col" class="py-3 px-6">
              Prix
            </th>
            <th scope="col" class="py-3 px-6">
              Departement
            </th>
            <th scope="col" class="py-3 px-6">
              Code Dep
            </th>
            <th scope="col" class="py-3 px-6">
              Region
            </th>
            <th scope="col" class="py-3 px-6">
              Date
            </th>
            <th>

            </th>
          </tr>
        </thead>
        <tbody v-for="fuelprice in fuelprices.data" :key="fuelprice.id">
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              {{ fuelprice.pumpId }}
            </td>
            <td class="py-4 px-6">
              {{ fuelprice.cp }}
            </td>
            <td class="py-4 px-6">
              {{ fuelprice.ville }}
            </td>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              <div v-for="fueltype in fueltypes" :key="fueltype.id">
                <div v-if="fueltype.id === fuelprice.FuelType">
                  {{ fueltype.name }}
                </div>
              </div>
            </td>
            <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              {{ fuelprice.prixValeur }} €
            </td>
            <td class="py-4 px-6">
              {{ fuelprice.depName }}
            </td>
            <td class="py-4 px-6">
              {{ fuelprice.depCode }}
            </td>
            <td class="py-4 px-6">
              {{ fuelprice.regName }}
            </td>
            <td class="py-4 px-6">
              {{ fuelprice.prixMaj }}
            </td>
            <td class="py-4 px-6">
              <div class="flex justify-end">
                <Link :href="route('fuelprice.edit', fuelprice.id)"
                  class="pr-2 hover:underline text-gray-900 whitespace-nowrap dark:text-white hover:text-blue-500">
                Modifier
                </Link>
                <span> | </span>
                <Link :href="route('fuelprice.destroy', fuelprice.id)"
                  class="pl-2 hover:underline text-gray-900 whitespace-nowrap dark:text-white hover:text-red-500"
                  method="delete" as="button" type="button">
                Supprimer
                </Link>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="m-2 p-2 flex justify-center">
      <Pagination :links="fuelprices.meta.links" />
    </div>

  </AuthenticatedLayout>
</template>
<script setup>

import { ref } from 'vue'
import Pagination from '@/Components/Pagination.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import TextInput from '@/Components/TextInput.vue';
import { Inertia } from '@inertiajs/inertia';
import Message from '@/Components/Message.vue';

const props = defineProps({
  fuelprices: Object,
  fueltypes: Object,
  filters: Object,
});

const searchFuel = ref(props.filters.query ?? "")

const search = function() {
  Inertia.get(route('fuelprice.index', { query: searchFuel.value }), {}, {
    replace: true,
    preserveState: true
  });
}

</script>