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
});

const form = useForm({
    _method: "PUT",
    name: props.teacher.name,
    surname: props.teacher.surname,
    email: props.teacher.email,
    course: props.teacher.course,
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

                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="course" value="Course" />
                        <select
                            id="course"
                            class="mt-1 block w-full"
                            v-model="form.course"
                        >
                            <option value="">Select a course</option>
                            <!-- Loop through all courses for selection -->
                            <option
                                v-for="(courseName, courseId) in courses"
                                :key="courseId"
                                :value="courseId"
                                :selected="courseId === form.course"
                            >
                                {{ courseName }}
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
                                    props.courses[2] !== undefined &&
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

                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="course4" value="Course 4" />
                        <select
                            id="course4"
                            class="mt-1 block w-full"
                            v-model="form.course4"
                        >
                            <option value="">Select a course</option>
                            <!-- Boucle sur toutes les courses pour la sélection -->
                            <option
                                v-for="course in allCourses"
                                :key="course.id"
                                :value="course.id"
                                :selected="
                                    props.courses.length > 3 &&
                                    props.courses[3] !== undefined &&
                                    course.id === props.courses[3].course_id
                                "
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
                            <!-- Boucle sur toutes les courses pour la sélection -->
                            <option
                                v-for="course in allCourses"
                                :key="course.id"
                                :value="course.id"
                                :selected="
                                    props.courses.length > 4 &&
                                    props.courses[4] !== undefined &&
                                    course.id === props.courses[4].course_id
                                "
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
                            <!-- Boucle sur toutes les courses pour la sélection -->
                            <option
                                v-for="course in allCourses"
                                :key="course.id"
                                :value="course.id"
                                :selected="
                                    props.courses.length > 5 &&
                                    props.courses[5] !== undefined &&
                                    course.id === props.courses[5].course_id
                                "
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
                            <!-- Boucle sur toutes les courses pour la sélection -->
                            <option
                                v-for="course in allCourses"
                                :key="course.id"
                                :value="course.id"
                                :selected="
                                    props.courses.length > 6 &&
                                    props.courses[6] !== undefined &&
                                    course.id === props.courses[6].course_id
                                "
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
                            <!-- Boucle sur toutes les courses pour la sélection -->
                            <option
                                v-for="course in allCourses"
                                :key="course.id"
                                :value="course.id"
                                :selected="
                                    props.courses.length > 7 &&
                                    props.courses[7] !== undefined &&
                                    course.id === props.courses[7].course_id
                                "
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
                            <!-- Boucle sur toutes les courses pour la sélection -->
                            <option
                                v-for="course in allCourses"
                                :key="course.id"
                                :value="course.id"
                                :selected="
                                    props.courses.length > 8 &&
                                    props.courses[8] !== undefined &&
                                    course.id === props.courses[8].course_id
                                "
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
                            <!-- Boucle sur toutes les courses pour la sélection -->
                            <option
                                v-for="course in allCourses"
                                :key="course.id"
                                :value="course.id"
                                :selected="
                                    props.courses.length > 9 &&
                                    props.courses[9] !== undefined &&
                                    course.id === props.courses[9].course_id
                                "
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
                            <!-- Boucle sur toutes les courses pour la sélection -->
                            <option
                                v-for="course in allCourses"
                                :key="course.id"
                                :value="course.id"
                                :selected="
                                    props.courses.length > 10 &&
                                    props.courses[10] !== undefined &&
                                    course.id === props.courses[10].course_id
                                "
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
                            <!-- Boucle sur toutes les courses pour la sélection -->
                            <option
                                v-for="course in allCourses"
                                :key="course.id"
                                :value="course.id"
                                :selected="
                                    props.courses.length > 11 &&
                                    props.courses[11] !== undefined &&
                                    course.id === props.courses[11].course_id
                                "
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
