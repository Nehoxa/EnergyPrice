
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

<template>

  <Head title="Edit Fuel Price" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Prix Carburant</h2>
    </template>


    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="max-w-md mx-auto bg-white m-2 p-6 rounded">

          <form @submit.prevent="submit">
            <div>
              <InputLabel for="pump" value="Pump" />
              <TextInput id="pump" type="text" class="mt-1 block w-full" v-model="form.pump" required autofocus
                autocomplete="pump" />
              <InputError class="mt-2" :message="form.errors.pump" />
            </div>

            <div class="mt-4">
              <InputLabel for="cp" value="Code Postal" />
              <TextInput id="cp" type="text" class="mt-1 block w-full " v-model="form.cp" required autocomplete="cp" />
              <InputError class="mt-2" :message="form.errors.cp" />
            </div>

            <div class="mt-4">
              <InputLabel for="pop" value="Population" />
              <select id="pop"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                v-model="form.pop" required>
                <option value="R">R</option>
                <option value="A">A</option>
              </select>
              <InputError class="mt-2" :message="form.errors.pop" />
            </div>

            <div class="mt-4">
              <InputLabel for="adresse" value="Adresse" />
              <TextInput id="adresse" type="text" class="mt-1 block w-full" v-model="form.adresse" required
                autocomplete="new-adresse" />
              <InputError class="mt-2" :message="form.errors.adresse" />
            </div>

            <div class="mt-4">
              <InputLabel for="ville" value="Ville" />
              <TextInput id="ville" type="text" class="mt-1 block w-full" v-model="form.ville" required />
              <InputError class="mt-2" :message="form.errors.ville" />
            </div>

            <div class="mt-4">
              <InputLabel for="horaires" value="Horaires" />
              <TextInput id="horaires" type="text" class="mt-1 block w-full" v-model="form.horaires" />
              <InputError class="mt-2" :message="form.errors.horaires" />
            </div>


            <div class="mt-4">
              <InputLabel for="geom" value="Geom" />
              <TextInput id="geom" type="text" class="mt-1 block w-full" v-model="form.geom" required />
              <InputError class="mt-2" :message="form.errors.geom" />
            </div>

            <div class="mt-4">
              <InputLabel for="prix_maj" value="Date de MAJ" />
              <TextInput id="prix_maj" type="datetime-local" class="mt-1 block w-full" v-model="form.prix_maj" required />
              <InputError class="mt-2" :message="form.errors.prix_maj" />
            </div>

            <div class="mt-4">
              <InputLabel for="prix_valeur" value="Prix" />
              <TextInput id="prix_valeur" type="text" class="mt-1 block w-full" v-model="form.prix_valeur" required />
              <InputError class="mt-2" :message="form.errors.prix_valeur" />
            </div>

            <div class="mt-4">
              <InputLabel for="fuel_type_id" value="Nom Carburant" />
              <select id="fuel_type_id"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                v-model="form.fuel_type_id" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
              </select>
              <InputError class="mt-2" :message="form.errors.fuel_type_id" />
            </div>

            <div class="mt-4">
              <InputLabel for="com_arm_code" value="com_arm_code" />
              <TextInput id="com_arm_code" type="text" class="mt-1 block w-full" v-model="form.com_arm_code" required />
              <InputError class="mt-2" :message="form.errors.com_arm_code" />
            </div>

            <div class="mt-4">
              <InputLabel for="com_arm_name" value="com_arm_name" />
              <TextInput id="com_arm_name" type="text" class="mt-1 block w-full" v-model="form.com_arm_name" required />
              <InputError class="mt-2" :message="form.errors.com_arm_name" />
            </div>

            <div class="mt-4">
              <InputLabel for="epci_code" value="epci_code" />
              <TextInput id="epci_code" type="text" class="mt-1 block w-full" v-model="form.epci_code" required />
              <InputError class="mt-2" :message="form.errors.epci_code" />
            </div>

            <div class="mt-4">
              <InputLabel for="epci_name" value="epci_name" />
              <TextInput id="epci_name" type="text" class="mt-1 block w-full" v-model="form.epci_name" required />
              <InputError class="mt-2" :message="form.errors.epci_name" />
            </div>

            <div class="mt-4">
              <InputLabel for="dep_code" value="dep_code" />
              <TextInput id="dep_code" type="text" class="mt-1 block w-full" v-model="form.dep_code" required />
              <InputError class="mt-2" :message="form.errors.dep_code" />
            </div>

            <div class="mt-4">
              <InputLabel for="dep_name" value="dep_name" />
              <TextInput id="dep_name" type="text" class="mt-1 block w-full" v-model="form.dep_name" required />
              <InputError class="mt-2" :message="form.errors.dep_name" />
            </div>

            <div class="mt-4">
              <InputLabel for="reg_code" value="reg_code" />
              <TextInput id="reg_code" type="text" class="mt-1 block w-full" v-model="form.reg_code" required />
              <InputError class="mt-2" :message="form.errors.reg_code" />
            </div>

            <div class="mt-4">
              <InputLabel for="reg_name" value="reg_name" />
              <TextInput id="reg_name" type="text" class="mt-1 block w-full" v-model="form.reg_name" required />
              <InputError class="mt-2" :message="form.errors.reg_name" />
            </div>

            <div class="mt-4">
              <InputLabel for="com_code" value="com_code" />
              <TextInput id="com_code" type="text" class="mt-1 block w-full" v-model="form.com_code" required />
              <InputError class="mt-2" :message="form.errors.com_code" />
            </div>

            <div class="mt-4">
              <InputLabel for="com_name" value="com_name" />
              <TextInput id="com_name" type="text" class="mt-1 block w-full" v-model="form.com_name" required />
              <InputError class="mt-2" :message="form.errors.com_name" />
            </div>

            <div class="mt-4">
              <InputLabel for="services_service" value="services_service" />
              <TextInput id="services_service" type="text" class="mt-1 block w-full" v-model="form.services_service" />
              <InputError class="mt-2" :message="form.errors.services_service" />
            </div>

            <div class="mt-4">
              <InputLabel for="horaires_automate_24_24" value="horaires_automate_24_24" />
              <select id="horaires_automate_24_24"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                v-model="form.horaires_automate_24_24" required>
                <option value="Oui">Oui</option>
                <option value="Non">Non</option>
              </select>
              <InputError class="mt-2" :message="form.errors.horaires_automate_24_24" />
            </div>

            <div class="flex items-center justify-end mt-4">
              <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Update
              </PrimaryButton>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm(props.fuelprice);

const props = defineProps({
  fuelprice: Object
});

const submit = () => {
  console.log('coucou');
  form.put(route('fuelprice.update', props.fuelprice.id));
};

</script>

<style lang="scss" scoped>

</style>