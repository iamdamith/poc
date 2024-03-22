<template>

<div aria-live="assertive" class="pointer-events-none fixed inset-0 flex items-end px-4 py-6 sm:items-start sm:p-6">
    <div class="flex w-full flex-col items-center space-y-4 sm:items-end">
      <!-- Notification panel, dynamically insert this into the live region when it needs to be displayed -->
      <transition enter-active-class="transform ease-out duration-300 transition" enter-from-class="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2" enter-to-class="translate-y-0 opacity-100 sm:translate-x-0" leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100" leave-to-class="opacity-0">
        <div v-if="show" class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
          <div class="p-4">
            <div class="flex items-start">
              <div class="flex-shrink-0">
                <CheckCircleIcon class="h-6 w-6 text-green-400" aria-hidden="true" />
              </div>
              <div class="ml-3 w-0 flex-1 pt-0.5">
                <p class="text-sm font-medium text-gray-900">Successfully saved!</p>
                <p class="mt-1 text-sm text-gray-500">You application sent to Finance Manager. You'll get the feedback shortly!</p>
              </div>
              <div class="ml-4 flex flex-shrink-0">
                <button type="button" @click="show = false" class="inline-flex rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                  <span class="sr-only">Close</span>
                  <XMarkIcon class="h-5 w-5" aria-hidden="true" />
                </button>
              </div>
            </div>
          </div>
        </div>
      </transition>
    </div>
  </div>



    <div class="pb-12">
        <div class="">
            <nav class="sm:hidden" aria-label="Back">
                <a
                    href="#"
                    class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700"
                >
                    <ChevronLeftIcon
                        class="-ml-1 mr-1 h-5 w-5 flex-shrink-0 text-gray-400"
                        aria-hidden="true"
                    />
                    Back
                </a>
            </nav>
            <nav class="hidden sm:flex py-2" aria-label="Breadcrumb">
                <ol role="list" class="flex items-center space-x-4">
                    <li>
                        <div class="flex">
                            <a
                                href="#"
                                class="text-sm font-medium text-gray-500 hover:text-gray-700"
                                >Finance</a
                            >
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <ChevronRightIcon
                                class="h-5 w-5 flex-shrink-0 text-gray-400"
                                aria-hidden="true"
                            />
                            <a
                                href="#"
                                class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"
                                >Corporate</a
                            >
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <ChevronRightIcon
                                class="h-5 w-5 flex-shrink-0 text-gray-400"
                                aria-hidden="true"
                            />
                            <a
                                href="#"
                                aria-current="page"
                                class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"
                                >Corporate Card Application Form</a
                            >
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="mt-2 md:flex md:items-center md:justify-between">
            <div class="min-w-0 flex-1">
                <h2
                    class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight"
                >
                    Corporate Card Application Form
                </h2>
            </div>
            <!-- <div class="mt-4 flex flex-shrink-0 md:ml-4 md:mt-0">
        <button type="button" class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Edit</button>
        <button type="button" class="ml-3 inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Publish</button>
      </div> -->
        </div>
    </div>

    <form @submit.prevent="submit">
        <div class="space-y-12">
            <div
                class="grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 pb-12 md:grid-cols-3"
            >
                <div>
                    <h2 class="text-base font-semibold leading-7 text-gray-900">
                        Applicant Details
                    </h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">
                        This information will not be displayed publicly.
                    </p>
                </div>

                <div
                    class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2"
                >
                    <div class="col-span-full">
                        <label
                            for="applicant_name"
                            class="block text-sm font-medium leading-6 text-gray-900"
                            >Applicant Name</label
                        >
                        <div class="mt-2">
                            <input
                                type="text"
                                v-model="form.applicant_name"
                                name="applicant_name"
                                id="applicant_name"
                                autocomplete="applicant_name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                        </div>
                        <div v-if="form.errors.applicant_name" class="text-red-600">{{ form.errors.applicant_name }}</div>
                    </div>

                    <div class="col-span-full">
                        <label
                            for="position"
                            class="block text-sm font-medium leading-6 text-gray-900"
                            >Position</label
                        >
                        <div class="mt-2">
                            <input
                                type="text"
                                v-model="form.position"
                                name="position"
                                id="position"
                                autocomplete="position"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                            <div v-if="form.errors.position" class="text-red-600">{{ form.errors.position }}</div>
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label
                            for="phone_work"
                            class="block text-sm font-medium leading-6 text-gray-900"
                            >Phone (Work)</label
                        >
                        <div class="mt-2">
                            <input
                                type="tel"
                                v-model="form.phone_work"
                                name="phone_work"
                                id="phone_work"
                                autocomplete="phone_work"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                            <div v-if="form.errors.phone_work" class="text-red-600">{{ form.errors.phone_work }}</div>
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label
                            for="phone_work_mobile"
                            class="block text-sm font-medium leading-6 text-gray-900"
                            >Phone (Work Mobile)</label
                        >
                        <div class="mt-2">
                            <input
                                type="tel"
                                v-model="form.phone_work_mobile"
                                name="phone_work_mobile"
                                id="phone_work_mobile"
                                autocomplete="phone_work_mobile"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                            <div v-if="form.errors.phone_work_mobile" class="text-red-600">{{ form.errors.phone_work_mobile }}</div>
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label
                            for="manager_id"
                            class="block text-sm font-medium leading-6 text-gray-900"
                            >Manager</label
                        >
                        <div class="mt-2">
                            <!-- <input
                                type="tel"
                                v-model="form.manager_id"
                                name="manager_id"
                                id="manager_id"
                                autocomplete="manager_id"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            /> -->

          
                            <select   v-model="form.manager_id" id="manager_id" name="manager_id" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                 <option v-for="manager in managers" :key="manager.email" :value="manager.id">{{ manager.name }}</option>
                            </select>

                            <div v-if="form.errors.manager_id" class="text-red-600">{{ form.errors.manager_id }}</div>
                            
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label
                            for="property_n_procurement_manmanager_id"
                            class="block text-sm font-medium leading-6 text-gray-900"
                            >Property and Procurement Manager</label
                        >
                        <div class="mt-2">
                            <!-- <input
                                type="tel"
                                v-model="form.property_n_procurement_manager_id"
                                name="property_n_procurement_manager_id"
                                id="property_n_procurement_manager_id"
                                autocomplete="phone_work_mobile"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            /> -->

                            <select   v-model="form.property_n_procurement_manager_id" id="manager_id" name="manager_id" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                 <option v-for="fmanager in financial_managers" :key="fmanager.email" :value="fmanager.id">{{ fmanager.name }}</option>
                            </select>
                            <div v-if="form.errors.property_n_procurement_manager_id" class="text-red-600">{{ form.errors.property_n_procurement_manager_id }}</div>
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label
                            for="about"
                            class="block text-sm font-medium leading-6 text-gray-900"
                            >Justification for Casey Corporaete CreditCard
                            Request</label
                        >
                        <div class="mt-2">
                            <textarea
                                id="justification"
                                v-model="form.justification"
                                name="justification"
                                rows="3"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                            <div v-if="form.errors.justification" class="text-red-600">{{ form.errors.justification }}</div>
                        </div>
                        <p class="mt-3 text-sm leading-6 text-gray-600"></p>
                    </div>

                    <div class="col-span-full">
                        <label
                            for="licence"
                            class="block text-sm font-medium leading-6 text-gray-900"
                            >Attach a full copy of applicant's driver's licence
                            / Passport</label
                        >
                        <div
                            class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10"
                        >
                            <div class="text-center">
                                <PhotoIcon
                                    class="mx-auto h-12 w-12 text-gray-300"
                                    aria-hidden="true"
                                />
                                <div
                                    class="mt-4 flex text-sm leading-6 text-gray-600"
                                >
                                    <label
                                        for="file-upload"
                                        class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500"
                                    >
                                        <span>Upload a file</span>
                                        <input id="file-upload" name="file-upload" type="file" class="sr-only"  @input="form.licence = $event.target.files[0]"/>
                                    </label>
                                    <progress
                                        v-if="form.progress"
                                        :value="form.progress.percentage"
                                        max="100"
                                    >
                                        {{ form.progress.percentage }}%
                                    </progress>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs leading-5 text-gray-600">
                                    PNG, JPG, GIF up to 10MB
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button
                type="button"
                class="text-sm font-semibold leading-6 text-gray-900"
            >
                Cancel
            </button>
            <button
                type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
            >
                Save
            </button>
        </div>
    </form>
</template>

<script setup>

import { ref } from 'vue'
import { CheckCircleIcon } from '@heroicons/vue/24/outline'
import { XMarkIcon } from '@heroicons/vue/20/solid'

import { Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions } from '@headlessui/vue'
import { CheckIcon, ChevronUpDownIcon } from '@heroicons/vue/20/solid'



import {
    PhotoIcon,
    UserCircleIcon,
    ChevronLeftIcon,
    ChevronRightIcon,
} from "@heroicons/vue/24/solid";

import RegisteredLayoutForm from "@/Layouts/RegisteredLayoutForm.vue";

import { useForm } from "@inertiajs/vue3";

// const props = defineProps({ show: Boolean, financial_managers:Object, managers:Object });
defineProps({ show: Boolean, financial_managers:Object, managers:Array })


const form = useForm({
    applicant_name: null,
    position: null,
    phone_work: null,
    phone_work_mobile: null,
    manager_id: null,
    property_n_procurement_manager_id: null,
    justification: null,
    licence: null,
});

function submit() {
    form.post("/finance/corporate-card-application");
   
}


</script>

<script>
export default {
    // Using shorthand syntax...
    layout: RegisteredLayoutForm,
};
</script>
