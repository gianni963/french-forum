<template>
    <Head title="Créer votre communauté" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Créer un article pour {{ community.name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="max-w-md bg-white m-2 p-6 mx-auto">
                    <form @submit.prevent="submit">
                        <div>
                            <InputLabel for="title" value="Titre" />
                            <TextInput id="title" type="text" class="mt-1 block w-full" v-model="form.title"  autofocus autocomplete="title" />
                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>

                        <div class="mt-4">
                            <InputLabel for="url" value="Url" />
                            <TextInput id="url" type="url" class="mt-1 block w-full" v-model="form.url" autocomplete="url" />
                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>

                        <div class="mt-4">
                            <InputLabel for="description" value="Description" />
                            <TextInput id="description" type="text" class="mt-1 block w-full" v-model="form.description"  autocomplete="username" />
                            <InputError class="mt-2" :message="form.errors.description" />
                        </div>

                        <PrimaryButton class="mt-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Soumettre
                        </PrimaryButton>

                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>


<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head,useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    community: Object,
    errors: Object,
});

const form = useForm({
    title: '',
    description: '',
    url: '',
});

const submit = () => {
    form.post(route('communities.posts.store', props.community.slug));       
};

</script>


