<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, router, useForm } from "@inertiajs/vue3";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import DialogModal from "@/Components/DialogModal.vue";
import Pagination from "@/Components/Pagination.vue";
import { ref } from "vue";

const props = defineProps({
    formulaires: Object,
});

//ajout bloc delete
const confirmingFormulaireDeletion = ref(false);
const evaluationIdToDelete = ref(null);
const formDeleteFormulaire = useForm("delete", {});

const confirmFormulaireDeletion = (id) => {
    evaluationIdToDelete.value = id;
    confirmingFormulaireDeletion.value = true;
};

const deleteFormulaire = () => {
    formDeleteFormulaire.delete(
        route("formulaires.destroy", evaluationIdToDelete.value),
        {
            preserveScroll: true,
            onSuccess: () => {
                confirmingFormulaireDeletion.value = false;
            },
        }
    );
};

//systéme de show
// const redirectToshow = (formulaireId) => {
//     const routeName = "show"; // Nom de la route vers la page show.vue
//     const routeParams = { formulaireId: formulaireId }; // Paramètres de route, formulaireId est l'ID du formulaire
//     route(routeName, routeParams);
// };

// const redirectToshow = () => {
//     route("show");
// };
const redirectToShow = () => {
    route("formulaires.show", { formulaire: props.formulaire });
};

const closeModal = () => {
    confirmingFormulaireDeletion.value = false;
};
</script>

<template>
    <AppLayout>
        <div class="bg-gray-100 py-6">
            <header class="text-center mb-8">
                <h2 class="text-2xl font-semibold text-gray-800">
                    Formulaires
                </h2>
            </header>

            <div class="max-w-4xl mx-auto">
                <ul
                    class="bg-white rounded-lg shadow overflow-hidden divide-y divide-gray-200"
                >
                    <li
                        v-for="formulaire in formulaires.data"
                        :key="formulaire.id"
                    >
                        <div class="px-4 py-4 sm:px-6">
                            <div class="flex items-center justify-between">
                                <Link
                                    :href="
                                        route('formulaires.edit', formulaire)
                                    "
                                >
                                    {{ formulaire.id }} {{ formulaire.name }}
                                </Link>
                                <div class="space-x-4">
                                    <button
                                        @click.prevent="
                                            confirmFormulaireDeletion(
                                                formulaire.id
                                            )
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
                                                route(
                                                    'formulaires.edit',
                                                    formulaire
                                                )
                                            "
                                        >
                                            Edit
                                        </Link>
                                    </button>

                                    <!-- Tentative de création de logique analogue à show de formulaire -->
                                    <button
                                        class="px-4 py-2 bg-yellow-500 text-white font-semibold rounded-lg shadow-md hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-800 focus:ring-opacity-50 transition ease-in-out duration-150"
                                    >
                                        <Link
                                            :href="
                                                route(
                                                    'formulaires.show',
                                                    formulaire
                                                )
                                            "
                                        >
                                            Check&Envoyer
                                        </Link>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <pagination class="mt-6" :links="formulaires.links" />

                <div class="mt-6 text-center">
                    <Link
                        class="text-white bg-blue-800 px-4 py-2 font-semibold rounded-lg hover:bg-blue-700 hover:text-white transition duration-300 ease-in-out"
                        :href="route('formulaires.create')"
                    >
                        Créer un nouveau formulaire
                    </Link>
                </div>
            </div>
        </div>

        <DialogModal :show="confirmingFormulaireDeletion" @close="closeModal">
            <template #title> Supprimer le formulaire </template>

            <template #content>
                Êtes-vous sûr de vouloir supprimer ce formulaire ? Cette action
                est irréversible.
            </template>

            <template #footer>
                <SecondaryButton @click="closeModal"> Annuler </SecondaryButton>

                <DangerButton
                    class="ms-3"
                    :class="{
                        'opacity-25': confirmingFormulaireDeletion.processing,
                    }"
                    :disabled="confirmingFormulaireDeletion.processing"
                    @click="deleteFormulaire"
                >
                    Supprimer
                </DangerButton>
            </template>
        </DialogModal>
    </AppLayout>
</template>
