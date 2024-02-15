<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, router, useForm } from "@inertiajs/vue3";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import DialogModal from "@/Components/DialogModal.vue";
import { ref } from "vue";

const props = defineProps({
    teachers: Array,
    teacher: Object,
});

//ajout bloc delete
const confirmingTeacherDeletion = ref(false);
const teacherIdToDelete = ref(null);
const formDeleteTeacher = useForm("delete", {});

const confirmTeacherDeletion = (id) => {
    teacherIdToDelete.value = id;
    confirmingTeacherDeletion.value = true;
};

const deleteTeacher = () => {
    formDeleteTeacher.delete(
        route("teachers.destroy", teacherIdToDelete.value),
        {
            preserveScroll: true,
            onSuccess: () => {
                confirmingTeacherDeletion.value = false;
            },
        }
    );
};

const closeModal = () => {
    confirmingTeacherDeletion.value = false;
};
</script>

<template>
    <AppLayout>
        <div class="bg-gray-100 py-6">
            <header class="text-center mb-8">
                <h2 class="text-2xl font-semibold text-gray-800">Teachers</h2>
            </header>

            <div class="max-w-4xl mx-auto">
                <ul
                    class="bg-white rounded-lg shadow overflow-hidden divide-y divide-gray-200"
                >
                    <li v-for="teacher in teachers" :key="teacher.id">
                        <div class="px-4 py-4 sm:px-6">
                            <div class="flex items-center justify-between">
                                <Link :href="route('teachers.edit', teacher)">
                                    {{ teacher.name }}
                                    {{ teacher.surname }}
                                    {{ teacher.email }}
                                </Link>
                                <div class="space-x-4">
                                    <button
                                        @click.prevent="
                                            confirmTeacherDeletion(teacher.id)
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
                                                route('teachers.edit', teacher)
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
                        :href="route('teachers.create')"
                    >
                        Créer un nouvel enseignant
                    </Link>
                </div>
            </div>
        </div>
    </AppLayout>

    <DialogModal :show="confirmingTeacherDeletion" @close="closeModal">
        <template #title> Supprimer l'enseignant </template>

        <template #content>
            Êtes-vous sûr de vouloir supprimer cet enseignant ? Cette action est
            irréversible.
        </template>

        <template #footer>
            <SecondaryButton @click="closeModal"> Annuler </SecondaryButton>

            <DangerButton
                class="ms-3"
                :class="{ 'opacity-25': confirmingTeacherDeletion.processing }"
                :disabled="confirmingTeacherDeletion.processing"
                @click="deleteTeacher"
            >
                Supprimer
            </DangerButton>
        </template>
    </DialogModal>
</template>
