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
    teacher: Object,
    courses: Object,
    allCourses: Array,
    allCourses: Object,
});

const form = useForm({
    _method: "PUT",
    name: props.teacher.name,
    surname: props.teacher.surname,
    email: props.teacher.email,
    course1: props.teacher.course1,
    course2: props.teacher.course2,
    course3: props.teacher.course3,
    course4: props.teacher.course4,
    course5: props.teacher.course5,
    course6: props.teacher.course6,
    course7: props.teacher.course7,
    course8: props.teacher.course8,
    course9: props.teacher.course9,
    course10: props.teacher.course10,
    course11: props.teacher.course11,
    course12: props.teacher.course12,
});

const sendForm = () => {
    form.put(route("teachers.update", props.teacher), {
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
                Modifier une teacher
            </h2>
        </template>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <FormSection @submitted="sendForm">
                <template #title> Modification d'une teacher </template>

                <template #description>
                    Les teachers seront reprises sur le formulaire pour les
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

                    <template v-for="index in 12" :key="index">
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel
                                :for="`course${index}`"
                                :value="`Course ${index}`"
                            />
                            <select
                                :id="`course${index}`"
                                class="mt-1 block w-full"
                                v-model="form[`course${index}`]"
                            >
                                <option value="">Select a course</option>
                                <!-- Loop through all courses for selection -->
                                <option
                                    v-for="course in allCourses"
                                    :key="course.id"
                                    :value="course.id"
                                >
                                    {{ course.id }}
                                    {{ course.name }}
                                </option>
                            </select>
                            <InputError
                                :message="form.errors[`course${index}`]"
                                class="mt-2"
                            />
                        </div>
                    </template>
                </template>

                <template #actions>
                    <ActionMessage :on="form.recentlySuccessful" class="me-3">
                        Sauvegardé.
                    </ActionMessage>

                    <PrimaryButton
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Sauvegarder
                    </PrimaryButton>
                </template>
            </FormSection>
        </div>
    </AppLayout>
</template>
