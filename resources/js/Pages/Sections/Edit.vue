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
    section: Object,
    courses: Array, // Passer les courses disponibles comme prop
    course: Object, // Passer les courses disponibles comme prop
    allCourses: Array,
    allCourses: Object,
});

const form = useForm({
    _method: "PUT",
    Name: props.section ? props.section.Name : "",
    course: props.courses.length > 0 ? props.courses[0]?.id : null,
    course2: props.courses.length > 0 ? props.courses[1]?.id : null,
    course3: props.courses.length > 0 ? props.courses[2]?.id : null,
});

console.log("Valeur de la propriété 'name' dans le formulaire:", form.Name);

console.log("Nombre de courses:", props.courses.length);
if (props.courses.length > 0) {
    console.log("IDs des courses associées à l'étudiant:");
    props.courses.forEach((course) => {
        console.log(course.course_id);
    });
} else {
    console.log("Aucune course associée à l'étudiant.");
}

const sendForm = () => {
    form.put(route("sections.update", props.section), {
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
                Modifier une section
            </h2>
        </template>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <formSection @submitted="sendForm">
                <template #title> Modification d'une section </template>

                <template #description>
                    Les sections seront reprises sur le formulaire pour les
                    étudiants
                </template>

                <template #form>
                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="name" value="name" />
                        <TextInput
                            id="name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.Name"
                        />
                        <InputError :message="form.errors.name" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="course" value="Course" />
                        <select
                            id="course"
                            class="mt-1 block w-full"
                            v-model="form.course"
                        >
                            <option value="">Select a course</option>
                            <!-- Boucle sur toutes les courses pour la sélection -->
                            <option
                                v-for="course in allCourses"
                                :key="course.id"
                                :value="course.id"
                                :selected="
                                    props.courses.length > 0 &&
                                    course.id === props.courses[0].course_id
                                "
                            >
                                {{ course.id }}
                                {{ course.name }}
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
                            <!-- Boucle sur toutes les courses pour la sélection -->
                            <option
                                v-for="course in allCourses"
                                :key="course.id"
                                :value="course.id"
                                :selected="
                                    props.courses.length > 1 &&
                                    props.courses[1] !== undefined &&
                                    course.id === props.courses[1].course_id
                                "
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
                            <!-- Boucle sur toutes les courses pour la sélection -->
                            <option
                                v-for="course in allCourses"
                                :key="course.id"
                                :value="course.id"
                                :selected="
                                    props.courses.length > 2 &&
                                    course.id === props.courses[2].course_id
                                "
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
            </formSection>
        </div>
    </AppLayout>
</template>
