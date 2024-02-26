<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, router, useForm } from "@inertiajs/vue3";
import ActionMessage from "@/Components/ActionMessage.vue";
import FormSection from "@/Components/FormSection.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import axios from "axios";

const props = defineProps({
    formulaire: Object,
    questions: Object,
});

const form = useForm({
    _method: "PUT",
    name: props.formulaire.name,
    description: props.formulaire.description,
    formulaire_questions: (() => {
        const formulaireQuestions = {};
        const numberOfQuestions = Math.min(props.questions.length, 50); // Limite à 50 questions
        for (let i = 0; i < numberOfQuestions; i++) {
            formulaireQuestions[`question${i + 1}`] = props.questions[i].id;
        }
        return formulaireQuestions;
    })(),
});

const sendForm = async () => {
    try {
        const response = await axios.post(
            "/envoyer-formulaire", // Utilisez l'URL de votre route Laravel ici
            form.data()
        );
        // Gérer la réponse si nécessaire
        console.log(response.data);
    } catch (error) {
        // Gérer les erreurs d'envoi
        console.error(error);
    }
};
</script>

<template>
    <AppLayout title="Formulaires">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Modifier une formulaire
            </h2>
        </template>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <FormSection @submitted="sendForm">
                <template #title> Modification d'une formulaire </template>

                <template #description>
                    Les formulaires seront reprises sur le formulaire pour les
                    étudiants
                </template>

                <template #form>
                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="name" value="Name" />
                        <p class="mt-1 block w-full">{{ form.name }}</p>
                        <InputError :message="form.errors.name" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="description" value="Description" />
                        <p class="mt-1 block w-full">{{ form.description }}</p>
                        <InputError
                            :message="form.errors.description"
                            class="mt-2"
                        />
                    </div>

                    <template
                        v-for="(question, index) in props.questions"
                        :key="question.id"
                    >
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel
                                :for="`question${index + 1}`"
                                :value="`Question ${index + 1}`"
                            />
                            <div class="mt-1 block w-full">
                                <span>{{ question.id }} -</span>
                                <span>{{ question.label }}</span>
                            </div>
                            <InputError
                                :message="form.errors[`question${index + 1}`]"
                                class="mt-2"
                            />
                        </div>
                    </template>
                </template>

                <template #actions>
                    <ActionMessage :on="form.recentlySuccessful" class="me-3">
                        Envoyé.
                    </ActionMessage>

                    <PrimaryButton
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Envoyer
                    </PrimaryButton>
                </template>
            </FormSection>
        </div>
    </AppLayout>
</template>
