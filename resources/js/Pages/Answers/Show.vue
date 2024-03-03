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
import { ref } from "vue";

const props = defineProps({
    formulaire: Object,
    questions: Object,
    intermediaireQF: Object,
    // answers: Objet,
});

const form = useForm({
    _method: "POST",
    id: props.formulaire.id,
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

// Récupérer l'URL actuelle depuis le navigateur
const currentUrl = window.location.href;
const formAnswers = ref([]);

// Utilisez la méthode split() pour diviser l'URL en segments
const segments = currentUrl.split("/");

// Le dernier segment (segments[segments.length - 1]) contient le nombre
var numero = segments[segments.length - 1];
var numero = numero - 1;

console.log("Numéro extrait :", numero); // Affiche 65 (dans votre exemple)

console.log("Questions:", props.questions);
console.log("Formulaire:", props.formulaire);
console.log("intermediaireQF:", props.intermediaireQF);

const obj1 = props.questions[1];
const formID = props.formulaire[numero]?.id;
const formName = props.formulaire[numero]?.name;
const formDescription = props.formulaire[numero]?.description;

//Il faut trouver TOUTES les questions liées au formulaire DONC importé la table intermédiaire ?

const formQuestions = props.intermediaireQF
    .filter((entry) => entry.formulaire_id === formID)
    .map((entry) => {
        // Récupérer les détails de la question à partir de props.questions
        const questionID = entry.question_id;
        const questionDetails = props.questions.find(
            (question) => question.id === questionID
        );
        return questionDetails;
    });

console.log("Questions liées au formulaire:", formQuestions);

console.log("hey");
// console.log(obj1);
console.log(formID);
console.log(formName);
console.log(formDescription);

// Logique de recherche du formulaire et de ses questions grace à objtest
</script>

<template>
    <div>
        <p>L'URL actuelle est : {{ currentUrl }}</p>
        <p>La valeur de objtest est : {{ formID }}</p>
    </div>
    <AppLayout title="Sondages">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Apportez vos réponses au sondage. Merci pour votre
                participation!
            </h2>
        </template>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <FormSection @submitted="sendForm">
                <template #title> Réponses au sondage </template>

                <template #description>
                    Les formulaires seront reprises sur le formulaire pour les
                    étudiants
                </template>

                <template #form>
                    <div
                        v-for="(question, index) in formQuestions"
                        :key="question.id"
                        class="col-span-6 sm:col-span-4"
                    >
                        <InputLabel
                            :for="`${index + 1}`"
                            :value="`${index + 1}. ${question.label}`"
                        />
                        <div class="mt-1 block w-full">
                            <template v-if="question.type === 'libre'">
                                <input
                                    type="text"
                                    v-model="formAnswers[index]"
                                />
                            </template>
                            <template v-else-if="question.type === 'choix'">
                                <select v-model="formAnswers[index]">
                                    <option
                                        v-for="(
                                            choice, choiceIndex
                                        ) in question.choices"
                                        :key="choiceIndex"
                                        :value="choice"
                                    >
                                        {{ choice }}
                                    </option>
                                </select>
                            </template>
                        </div>
                        <InputError
                            :message="form.errors[index]"
                            class="mt-2"
                        />
                    </div>
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
