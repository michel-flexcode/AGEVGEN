<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, router, useForm } from "@inertiajs/vue3";
import ActionMessage from "@/Components/ActionMessage.vue";
import FormSection from "@/Components/FormSection.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
    student: Object,
    sections: Array, // Passer les sections disponibles comme prop
    section: Object, // Passer les sections disponibles comme prop
    allSections: Array,
    allSections: Object,
});

const form = useForm({
    _method: "PUT",
    name: props.student.name,
    surname: props.student.surname,
    email: props.student.email,
    section: props.sections.length > 0 ? props.sections[0].id : null,
    section2: props.sections.length > 0 ? props.sections[1].id : null,
    section3: props.sections.length > 0 ? props.sections[2].id : null,
});

console.log("Nombre de sections:", props.sections.length);
if (props.sections.length > 0) {
    console.log("IDs des sections associées à l'étudiant:");
    props.sections.forEach((section) => {
        console.log(section.section_id);
    });
} else {
    console.log("Aucune section associée à l'étudiant.");
}

const sendForm = () => {
    form.put(route("students.update", props.student), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
        },
    });
};
</script>

<template>
    <AppLayout title="Students">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Modifier une student
            </h2>
        </template>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <FormSection @submitted="sendForm">
                <template #title> Modification d'une student </template>

                <template #description>
                    Les students seront reprises sur le formulaire pour les
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

                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="surname" value="Surname" />
                        <TextInput
                            id="surname"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.surname"
                        />
                        <InputError
                            :message="form.errors.surname"
                            class="mt-2"
                        />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="email" value="Email" />
                        <TextInput
                            id="email"
                            type="email"
                            class="mt-1 block w-full"
                            v-model="form.email"
                        />
                        <InputError :message="form.errors.email" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="section" value="Section" />
                        <select
                            id="section"
                            class="mt-1 block w-full"
                            v-model="form.section"
                        >
                            <option value="">Select a section</option>
                            <!-- Boucle sur toutes les sections pour la sélection -->
                            <option
                                v-for="section in allSections"
                                :key="section.id"
                                :value="section.id"
                                :selected="
                                    props.sections.length > 0 &&
                                    section.id === props.sections[0].section_id
                                "
                            >
                                {{ section.id }}
                                {{ section.Name }}
                            </option>
                        </select>
                        <InputError
                            :message="form.errors.section"
                            class="mt-2"
                        />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="section2" value="Section 2" />
                        <select
                            id="section2"
                            class="mt-1 block w-full"
                            v-model="form.section2"
                        >
                            <option value="">Select a section</option>
                            <!-- Boucle sur toutes les sections pour la sélection -->
                            <option
                                v-for="section in allSections"
                                :key="section.id"
                                :value="section.id"
                                :selected="
                                    props.sections.length > 1 &&
                                    section.id === props.sections[1].section_id
                                "
                            >
                                {{ section.id }}
                                {{ section.Name }}
                            </option>
                        </select>
                        <InputError
                            :message="form.errors.section2"
                            class="mt-2"
                        />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="section3" value="Section 3" />
                        <select
                            id="section3"
                            class="mt-1 block w-full"
                            v-model="form.section3"
                        >
                            <option value="">Select a section</option>
                            <!-- Boucle sur toutes les sections pour la sélection -->
                            <option
                                v-for="section in allSections"
                                :key="section.id"
                                :value="section.id"
                                :selected="
                                    props.sections.length > 2 &&
                                    section.id === props.sections[2].section_id
                                "
                            >
                                {{ section.id }}
                                {{ section.Name }}
                            </option>
                        </select>
                        <InputError
                            :message="form.errors.section3"
                            class="mt-2"
                        />
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
            </FormSection>
        </div>
    </AppLayout>
</template>
