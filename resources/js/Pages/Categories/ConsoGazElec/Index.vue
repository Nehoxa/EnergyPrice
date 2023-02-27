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

      <div class="input-wrapper">
        <input @keyup="search" id="id" v-model="searchId" type="text" placeholder="Id"
          class="px-6 w-20 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm rounded-l-md" />
        <button @click="resetOption('searchId')" v-if="searchId" class="reset-input">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
            <path
              d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
          </svg>
        </button>
      </div>

      <div class="input-wrapper w-3/12">
        <input @keyup="search" id="op" v-model="searchOp" type="text" placeholder="Operateur"
          class="px-6 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm w-full" />
        <button @click="resetOption('searchOp')" v-if="searchOp" class="reset-input">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
            <path
              d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
          </svg>
        </button>
      </div>

      <div class="input-wrapper">
        <input @keyup="search" id="annee" v-model="searchAnnee" type="number" placeholder="Année"
          class="px-6 w-36 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" />
        <button @click="resetOption('searchAnnee')" v-if="searchAnnee" class="reset-input">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
            <path
              d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
          </svg>
        </button>
      </div>

      <div class="input-wrapper">
        <select @change="search" id="filiere" v-model="searchFiliere"
          class="w-36 px-6 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm">
          <option value="" selected disabled hidden>Filières</option>
          <option v-for="filiere in filieres" :key="filiere.id" :value="filiere">{{ filiere }}</option>
        </select>
        <button @click="resetOption('searchFiliere')" v-if="searchFiliere" class="reset-select">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
            <path
              d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
          </svg>
        </button>
      </div>

      <div class="input-wrapper">
        <select @change="search" id="category" v-model="searchCategory"
          class="w-80 px-6 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm">
          <option value="" selected disabled hidden>Catégories</option>
          <option v-for="categorie in categories" :key="categorie.id" :value="categorie">{{
            categorie
          }}</option>
        </select>
        <button @click="resetOption('searchCategory')" v-if="searchCategory" class="reset-select">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
            <path
              d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
          </svg>
        </button>
      </div>

      <div class="input-wrapper">
        <select @change="search" id="secteurs" v-model="searchSecteurs"
          class="w-44 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm">
          <option value="" selected disabled hidden>Secteurs</option>
          <option v-for="secteur in secteurs" :key="secteur.id" :value="secteur">{{ secteur }}</option>
        </select>
        <button @click="resetOption('searchSecteurs')" v-if="searchSecteurs" class="reset-select">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
            <path
              d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
          </svg>
        </button>
      </div>

      <div class="input-wrapper">
        <input @keyup="search" id="conso" v-model="searchConso" type="text" placeholder="Consomation"
          class="w-44 px-6 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" />
        <button @click="resetOption('searchConso')" v-if="searchConso" class="reset-input">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
            <path
              d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
          </svg>
        </button>
      </div>

      <div class="input-wrapper">
        <input @keyup="search" id="searchPDL" v-model="searchPDL" type="text" placeholder="PDL"
          class=" w-32 px-6 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" />
        <button @click="resetOption('searchPDL')" v-if="searchPDL" class="reset-input">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
            <path
              d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
          </svg>
        </button>
      </div>


      <div class="input-wrapper">
        <input @keyup="search" id="region" v-model="searchRegion" type="text" placeholder="Région"
          class="w-60 px-6 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" />
        <button @click="resetOption('searchRegion')" v-if="searchRegion" class="reset-input">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
            <path
              d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
          </svg>
        </button>
      </div>


      <div class="input-wrapper">
        <input @keyup="search" id="codeRegion" v-model="searchCodeRegion" type="text" placeholder="Code Régional"
          class="w-40 px-6 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm rounded-r-md" />
        <button @click="resetOption('searchCodeRegion')" v-if="searchCodeRegion" class="reset-input">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
            <path
              d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
          </svg>
        </button>
      </div>
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
import { ref } from 'vue'
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
  consomations: Object,
  categories: Array,
  filieres: Array,
  secteurs: Array,
  filters: Object,
});

const searchId = ref(props.filters.searchId ?? "");
const searchOp = ref(props.filters.searchOp ?? "");
const searchAnnee = ref(props.filters.searchAnnee ?? "");
const searchFiliere = ref(props.filters.searchFiliere ?? "");
const searchCategory = ref(props.filters.searchCategory ?? "");
const searchSecteurs = ref(props.filters.searchSecteurs ?? "");
const searchConso = ref(props.filters.searchConso ?? "");
const searchPDL = ref(props.filters.searchPDL ?? "");
const searchRegion = ref(props.filters.searchRegion ?? "");
const searchCodeRegion = ref(props.filters.searchCodeRegion ?? "");

function debounce(func, timeout = 300) {
  let timer;
  return (...args) => {
    clearTimeout(timer);
    timer = setTimeout(() => { func.apply(this, args); }, timeout);
  };
}

function resetOption(option) {
  this[option] = ""
  search()
}

const search = debounce(() => {
  let searchParams = {
    searchId: searchId.value,
    searchOp: searchOp.value,
    searchAnnee: searchAnnee.value,
    searchfiliere: searchFiliere.value,
    searchCategory: searchCategory.value,
    searchSecteurs: searchSecteurs.value,
    searchConso: searchConso.value,
    searchPDL: searchPDL.value,
    searchRegion: searchRegion.value,
    searchCodeRegion: searchCodeRegion.value
  };
  for (let key in searchParams) {
    if (!searchParams[key]) {
      delete searchParams[key];
    }
  }
  Inertia.get(route('conso.index', searchParams), {}, {
    replace: true,
    preserveState: true
  });
});

</script>

<style scoped>
.input-wrapper {
  position: relative;
  display: inline-block;
}

.reset-select {
  position: absolute;
  top: 10px;
  right: 30px;
  width: 20px;
  /* Définissez la largeur de l'icône */
  height: 20px;
  /* Définissez la hauteur de l'icône */
  padding: 0;
  border: none;
  background: transparent;
  cursor: pointer;
}

.reset-input {
  position: absolute;
  top: 10px;
  right: 5px;
  width: 20px;
  /* Définissez la largeur de l'icône */
  height: 20px;
  /* Définissez la hauteur de l'icône */
  padding: 0;
  border: none;
  background: transparent;
  cursor: pointer;

}

.reset-button svg {
  display: block;
  width: 100%;
  height: 100%;
}
</style>