<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, router, useForm } from "@inertiajs/vue3";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import DialogModal from "@/Components/DialogModal.vue";
import { ref } from "vue";

const props = defineProps({
    courses: Array,
    course: Object,
});

//ajout bloc delete
const confirmingCourseDeletion = ref(false);
const courseIdToDelete = ref(null);
const formDeleteCourse = useForm("delete", {});

const confirmCourseDeletion = (id) => {
    courseIdToDelete.value = id;
    confirmingCourseDeletion.value = true;
};

const deleteCourse = () => {
    formDeleteCourse.delete(route("courses.destroy", courseIdToDelete.value), {
        preserveScroll: true,
        onSuccess: () => {
            confirmingCourseDeletion.value = false;
        },
    });
};

const closeModal = () => {
    confirmingCourseDeletion.value = false;
};
</script>

<template>
    <AppLayout>
        <div class="bg-gray-100 py-6">
            <header class="text-center mb-8">
                <h2 class="text-2xl font-semibold text-gray-800">Cours</h2>
            </header>

            <div class="max-w-4xl mx-auto">
                <ul
                    class="bg-white rounded-lg shadow overflow-hidden divide-y divide-gray-200"
                >
                    <li v-for="course in courses" :key="course.id">
                        <div class="px-4 py-4 sm:px-6">
                            <div class="flex items-center justify-between">
                                <Link :href="route('courses.edit', course)">
                                    {{ course.id }} -
                                    {{ course.name }}
                                </Link>
                                <div class="space-x-4">
                                    <button
                                        @click.prevent="
                                            confirmCourseDeletion(course.id)
                                        "
                                        class="px-4 py-2 bg-red-600 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-800 focus:ring-opacity-50 transition ease-in-out duration-150"
                                    >
                                        Supprimer
                                    </button>
                                    <button
                                        class="px-4 py-2 bg-blue-950 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-red-800 focus:ring-opacity-50 transition ease-in-out duration-150"
                                    >
                                        <Link
                                            :href="
                                                route('courses.edit', course)
                                            "
                                        >
                                            Edit
                                        </Link>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>

                <div class="mt-6 text-center">
                    <Link
                        class="text-white bg-blue-800 px-4 py-2 font-semibold rounded-lg hover:bg-blue-700 hover:text-white transition duration-300 ease-in-out"
                        :href="route('courses.create')"
                    >
                        Créer un nouveau cours
                    </Link>
                </div>
            </div>
        </div>
    </AppLayout>

    <DialogModal :show="confirmingCourseDeletion" @close="closeModal">
        <template #title> Supprimer le cours </template>

        <template #content>
            Êtes-vous sûr de vouloir supprimer ce cours ? Cette action est
            irréversible.
        </template>

        <template #footer>
            <SecondaryButton @click="closeModal"> Annuler </SecondaryButton>

            <DangerButton
                class="ms-3"
                :class="{ 'opacity-25': confirmingCourseDeletion.processing }"
                :disabled="confirmingCourseDeletion.processing"
                @click="deleteCourse"
            >
                Supprimer
            </DangerButton>
        </template>
    </DialogModal>
</template>
