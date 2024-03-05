<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, router, useForm } from "@inertiajs/vue3";
import ActionMessage from "@/Components/ActionMessage.vue";
// import FormSpeciality from "@/Components/FormSpeciality.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
    speciality: Object,
});

const form = useForm({
    _method: "PUT",
    name: props.speciality.name,
});

const sendForm = () => {
    form.put(route("specialities.update", props.speciality), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
        },
    });
};
</script>

<template>
    <AppLayout title="Specialities">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Modifier une speciality
            </h2>
        </template>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <FormSpeciality @submitted="sendForm">
                <template #title> Modification d'une speciality </template>

                <template #description>
                    Les specialities seront reprises sur le formulaire pour les
                    étudiants
                </template>

                <template #form>
                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="name" value="Name" />
                        <TextInput
                            id="name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.name"
                        />
                        <InputError :message="form.errors.name" class="mt-2" />
                    </div>
                </template>

                <template #actions>
                    <ActionMessage :on="form.recentlySuccessful" class="me-3">
                        Saved.
                    </ActionMessage>

                    <PrimaryButton
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Save
                    </PrimaryButton>
                </template>
            </FormSpeciality>
        </div>
    </AppLayout>
</template>
