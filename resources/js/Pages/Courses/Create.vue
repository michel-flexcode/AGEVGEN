<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, router, useForm } from "@inertiajs/vue3";
import ActionMessage from "@/Components/ActionMessage.vue";
import FormCourse from "@/Components/FormCourse.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { ref } from "vue";

const props = defineProps({
    courses: Array,
    course: Object,
});

const form = useForm({
    _method: "POST",
    name: "",
    surname: "",
    email: "",
    course: "",
    course2: "",
    course3: "",
});

const sendForm = () => {
    form.post(route("sections.store"), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
        },
    });
};
</script>

<template>
    <AppLayout title="Sections">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Ajouter une section
            </h2>
        </template>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <FormCourse @submitted="sendForm">
                <template #title> Création d'une section </template>

                <template #description>
                    Les sections seront reprises sur le formulaire pour les
                    étudiants
                </template>

                <template #form>
                    <!-- Champs de formulaire -->
                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="name" value="name" />
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
                        <InputLabel for="course" value="Course" />
                        <select
                            id="course"
                            class="mt-1 block w-full"
                            v-model="form.course"
                        >
                            <option value="">Select a course</option>
                            <!-- Boucle sur les courses disponibles pour la sélection -->
                            <option
                                v-for="course in courses"
                                :key="course.id"
                                :value="course.id"
                            >
                                {{ course.id }}
                                {{ course.Name }}
                            </option>
                        </select>
                        <InputError
                            :message="form.errors.course"
                            class="mt-2"
                        />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="course2" value="Course 2" />
                        <select
                            id="course2"
                            class="mt-1 block w-full"
                            v-model="form.course2"
                        >
                            <option value="">Select a course</option>
                            <!-- Boucle sur les courses disponibles pour la sélection -->
                            <option
                                v-for="course in courses"
                                :key="course.id"
                                :value="course.id"
                            >
                                {{ course.id }}
                                {{ course.Name }}
                            </option>
                        </select>
                        <InputError
                            :message="form.errors.course2"
                            class="mt-2"
                        />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="course3" value="Course 3" />
                        <select
                            id="course3"
                            class="mt-1 block w-full"
                            v-model="form.course3"
                        >
                            <option value="">Select a course</option>
                            <!-- Boucle sur les courses disponibles pour la sélection -->
                            <option
                                v-for="course in courses"
                                :key="course.id"
                                :value="course.id"
                            >
                                {{ course.id }}
                                {{ course.Name }}
                            </option>
                        </select>
                        <InputError
                            :message="form.errors.course3"
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
            </FormCourse>
        </div>
        <pre>{{ course }}</pre>
    </AppLayout>
</template>
