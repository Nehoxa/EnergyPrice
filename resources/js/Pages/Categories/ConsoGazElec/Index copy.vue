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

    <div class="m-6 flex">
      <input id="searchId" type="text" placeholder="Id"
        class="px-6 w-20 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm rounded-l-md" />
      <input id="searchOperateur" type="text" placeholder="Operateur"
        class="px-6 w-3/12 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" />
      <input id="searchAnnee" type="text" placeholder="Année"
        class="px-6 w-36 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" />
      <select id="searchFilieres"
        class="w-36 px-6 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm">
        <option value="none" selected disabled hidden>Filières</option>
        <option value="Electricité">Electricité</option>
        <option value="Gaz">Gaz</option>
      </select>
      <select id="searchCategories"
        class="w-80 px-6 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm">
        <option value="none" selected disabled hidden>Catégories</option>
        <option value="Entreprises">Entreprises</option>
        <option value="Résidentiel + Petits Professionnels">Résidentiel + Petits Professionnels</option>
        <option value="0">0</option>
      </select>
      <select id="searchSecteur" class="w-44 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm">
        <option value="none" selected disabled hidden>Secteur</option>
        <option value="Industrie">Industrie</option>
        <option value="Agriculture">Agriculture</option>
        <option value="Résidentiel">Résidentiel</option>
        <option value="Tertiaire">Tertiaire</option>
        <option value="Secteur Inconnu">Secteur Inconnu</option>
      </select>
      <input id="searchConso" type="text" placeholder="Consomation"
        class="w-44 px-6 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" />
      <input id="searchPDL" type="text" placeholder="PDL"
        class=" w-32 px-6 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" />
      <input id="searchRegion" type="text" placeholder="Région"
        class="w-60 px-6 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" />
      <input id="searchCodeREgion" type="text" placeholder="Code Régional"
        class="w-40 px-6 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm rounded-r-md" />
    </div>


    <div class="overflow-x-auto relative rounded-md m-6">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 table-fixed">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="w-20 py-3 px-6">
              ID
            </th>
            <th scope="col" class="w-3/12 py-3 px-6">
              Operateur
            </th>
            <th scope="col" class="w-36 py-3 px-6">
              Année
            </th>
            <th scope="col" class=" w-36 py-3 px-6">
              Filière
            </th>
            <th scope="col" class="w-80 py-3 px-6">
              Catégories
            </th>
            <th scope="col" class="w-44 py-3 px-6">
              Secteur
            </th>
            <th scope="col" class="w-44 py-3 px-6">
              Consomation
            </th>
            <th scope="col" class="w-32 py-3 px-6">
              PDL
            </th>
            <th scope="col" class="w-60 py-3 px-6">
              Région
            </th>
            <th scope="col" class="w-40 py-3 px-6">
              Code Régional
            </th>
            <th>
            </th>
          </tr>
        </thead>
        <tbody v-for="consomation in consomations.data" :key="consomation.id">
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td scope="row" class="w-20 py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              {{ consomation.id }}
            </td>
            <td class="w-3/12 py-4 px-6">
              {{ consomation.operateur }}
            </td>
            <td class="w-36 py-4 px-6">
              {{ consomation.annee }}
            </td>
            <td class="w-36 py-4 px-6">
              {{ consomation.filiere }}
            </td>
            <td class="w-80 py-4 px-6">
              {{ consomation.libelleCategorieConsommation }}
            </td>
            <td class="w-44 py-4 px-6">
              {{ consomation.libelleGrandSecteur }}
            </td>
            <td class="w-44 py-4 px-6">
              {{ consomation.conso }}
            </td>
            <td class="w-32 py-4 px-6">
              {{ consomation.pdl }}
            </td>
            <td class="w-60 py-4 px-6">
              {{ consomation.libelleRegion }}
            </td>
            <td class="w-40 py-4 px-6">
              {{ consomation.codeRegion }}
            </td>
            <td class="py-4 px-6">
              <div class="flex justify-end">
                <Link :href="route('conso.edit', consomation.id)"
                  class="pr-2 hover:underline text-gray-900 whitespace-nowrap dark:text-white hover:text-blue-500">
                Modifier
                </Link>
                <span> | </span>
                <Link :href="route('conso.destroy', consomation.id)"
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
      <Pagination :links="consomations.meta.links" />
    </div>

  </AuthenticatedLayout>
</template>
<script setup>

import Pagination from '@/Components/Pagination.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
  consomations: Object,
});

</script>