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
    courses: Array,
    course: Object,
});

const form = useForm({
    _method: "POST",
    name: "",
    surname: "",
    email: "",
    course1: "",
    course2: "",
    course3: "",
    course4: "",
    course5: "",
    course6: "",
    course7: "",
    course8: "",
    course9: "",
    course10: "",
    course11: "",
    course12: "",
});

const sendForm = () => {
    form.post(route("teachers.store"), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
        },
    });
};
</script>

<template>
    <AppLayout title="Teachers">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Ajouter un enseignant
            </h2>
        </template>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <FormSection @submitted="sendForm">
                <template #title> Création d'un enseignant </template>

                <template #description>
                    Les enseignants seront reprises sur le formulaire pour les
                    étudiants
                </template>

                <template #form>
                    <!-- Champs de formulaire -->
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
                        <InputLabel for="course1" value="Course 1" />
                        <select
                            id="course1"
                            class="mt-1 block w-full"
                            v-model="form.course1"
                        >
                            <option value="">Select a course</option>
                            <!-- Boucle sur les courses disponibles pour la sélection -->
                            <option
                                v-for="course in courses"
                                :key="course.id"
                                :value="course.id"
                            >
                                {{ course.id }}
                                {{ course.name }}
                            </option>
                        </select>
                        <InputError
                            :message="form.errors.course1"
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
                                {{ course.name }}
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
                                {{ course.name }}
                            </option>
                        </select>
                        <InputError
                            :message="form.errors.course3"
                            class="mt-2"
                        />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="course4" value="Course 4" />
                        <select
                            id="course4"
                            class="mt-1 block w-full"
                            v-model="form.course4"
                        >
                            <option value="">Select a course</option>
                            <!-- Boucle sur les courses disponibles pour la sélection -->
                            <option
                                v-for="course in courses"
                                :key="course.id"
                                :value="course.id"
                            >
                                {{ course.id }}
                                {{ course.name }}
                            </option>
                        </select>
                        <InputError
                            :message="form.errors.course4"
                            class="mt-2"
                        />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="course5" value="Course 5" />
                        <select
                            id="course5"
                            class="mt-1 block w-full"
                            v-model="form.course5"
                        >
                            <option value="">Select a course</option>
                            <!-- Boucle sur les courses disponibles pour la sélection -->
                            <option
                                v-for="course in courses"
                                :key="course.id"
                                :value="course.id"
                            >
                                {{ course.id }}
                                {{ course.name }}
                            </option>
                        </select>
                        <InputError
                            :message="form.errors.course5"
                            class="mt-2"
                        />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="course6" value="Course 6" />
                        <select
                            id="course6"
                            class="mt-1 block w-full"
                            v-model="form.course6"
                        >
                            <option value="">Select a course</option>
                            <!-- Boucle sur les courses disponibles pour la sélection -->
                            <option
                                v-for="course in courses"
                                :key="course.id"
                                :value="course.id"
                            >
                                {{ course.id }}
                                {{ course.name }}
                            </option>
                        </select>
                        <InputError
                            :message="form.errors.course6"
                            class="mt-2"
                        />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="course7" value="Course 7" />
                        <select
                            id="course7"
                            class="mt-1 block w-full"
                            v-model="form.course7"
                        >
                            <option value="">Select a course</option>
                            <!-- Boucle sur les courses disponibles pour la sélection -->
                            <option
                                v-for="course in courses"
                                :key="course.id"
                                :value="course.id"
                            >
                                {{ course.id }}
                                {{ course.name }}
                            </option>
                        </select>
                        <InputError
                            :message="form.errors.course7"
                            class="mt-2"
                        />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="course8" value="Course 8" />
                        <select
                            id="course8"
                            class="mt-1 block w-full"
                            v-model="form.course8"
                        >
                            <option value="">Select a course</option>
                            <!-- Boucle sur les courses disponibles pour la sélection -->
                            <option
                                v-for="course in courses"
                                :key="course.id"
                                :value="course.id"
                            >
                                {{ course.id }}
                                {{ course.name }}
                            </option>
                        </select>
                        <InputError
                            :message="form.errors.course8"
                            class="mt-2"
                        />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="course9" value="Course 9" />
                        <select
                            id="course9"
                            class="mt-1 block w-full"
                            v-model="form.course9"
                        >
                            <option value="">Select a course</option>
                            <!-- Boucle sur les courses disponibles pour la sélection -->
                            <option
                                v-for="course in courses"
                                :key="course.id"
                                :value="course.id"
                            >
                                {{ course.id }}
                                {{ course.name }}
                            </option>
                        </select>
                        <InputError
                            :message="form.errors.course9"
                            class="mt-2"
                        />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="course10" value="Course 10" />
                        <select
                            id="course10"
                            class="mt-1 block w-full"
                            v-model="form.course10"
                        >
                            <option value="">Select a course</option>
                            <!-- Boucle sur les courses disponibles pour la sélection -->
                            <option
                                v-for="course in courses"
                                :key="course.id"
                                :value="course.id"
                            >
                                {{ course.id }}
                                {{ course.name }}
                            </option>
                        </select>
                        <InputError
                            :message="form.errors.course10"
                            class="mt-2"
                        />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="course11" value="Course 11" />
                        <select
                            id="course11"
                            class="mt-1 block w-full"
                            v-model="form.course11"
                        >
                            <option value="">Select a course</option>
                            <!-- Boucle sur les courses disponibles pour la sélection -->
                            <option
                                v-for="course in courses"
                                :key="course.id"
                                :value="course.id"
                            >
                                {{ course.id }}
                                {{ course.name }}
                            </option>
                        </select>
                        <InputError
                            :message="form.errors.course11"
                            class="mt-2"
                        />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="course12" value="Course 12" />
                        <select
                            id="course12"
                            class="mt-1 block w-full"
                            v-model="form.course12"
                        >
                            <option value="">Select a course</option>
                            <!-- Boucle sur les courses disponibles pour la sélection -->
                            <option
                                v-for="course in courses"
                                :key="course.id"
                                :value="course.id"
                            >
                                {{ course.id }}
                                {{ course.name }}
                            </option>
                        </select>
                        <InputError
                            :message="form.errors.course12"
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
