<template>

  <Head title="Prix Carburant" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Prix Carburant</h2>
    </template>

    <div v-if="$page.props.flash.message" class="flex rounded-lg p-4 mb-4 text-sm" :class="$page.props.flash.class"
      role="alert">
      <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
          clip-rule="evenodd"></path>
      </svg>
      <div>
        <span class="font-medium">{{ $page.props.flash.message }}</span>
      </div>
    </div>


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

import { reactive, ref } from 'vue'
import Pagination from '@/Components/Pagination.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router, useForm } from '@inertiajs/inertia-vue3';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Inertia } from '@inertiajs/inertia';

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