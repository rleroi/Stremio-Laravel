<template>
    <Head title="Configuration" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-semibold mb-4">
                        {{ config.name ? `Configuration: ${config.name}` : 'Default Configuration' }}
                    </h1>
                    
                    <form @submit.prevent="saveConfig" class="space-y-4">
                        <div>
                            <label for="apiKey" class="block text-sm font-medium text-gray-700">API Key</label>
                            <input
                                type="text"
                                id="apiKey"
                                v-model="form.apiKey"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            />
                            <p class="mt-1 text-sm text-gray-500">Your API key for accessing the content provider</p>
                        </div>

                        <div>
                            <label for="region" class="block text-sm font-medium text-gray-700">Region</label>
                            <select
                                id="region"
                                v-model="form.region"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            >
                                <option value="US">United States</option>
                                <option value="UK">United Kingdom</option>
                                <option value="EU">European Union</option>
                                <option value="ASIA">Asia</option>
                            </select>
                            <p class="mt-1 text-sm text-gray-500">Content region for availability</p>
                        </div>

                        <div>
                            <label for="language" class="block text-sm font-medium text-gray-700">Language</label>
                            <select
                                id="language"
                                v-model="form.language"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            >
                                <option value="en">English</option>
                                <option value="es">Spanish</option>
                                <option value="fr">French</option>
                                <option value="de">German</option>
                            </select>
                            <p class="mt-1 text-sm text-gray-500">Content language preference</p>
                        </div>

                        <div class="flex justify-end">
                            <PrimaryButton type="submit" :disabled="form.processing">
                                Save Configuration
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    config: {
        type: Object,
        required: true,
    },
});

const form = useForm({
    apiKey: props.config.apiKey,
    region: props.config.region,
    language: props.config.language,
});

const saveConfig = () => {
    form.post(route('config.update', { config: props.config.name }));
};
</script> 