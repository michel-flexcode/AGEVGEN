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
    formulaire: Object,
    questions: Object,
    allQuestions: Array,
    allQuestions: Object,
});
//console.log("Questions:", props.questions);

// const obj1 = props.questions[1];
// const objtest = props.questions[1].id;
// console.log("hey");
// console.log(obj1);
// console.log("hooo");
// console.log(obj1.id); // Affiche l'id de l'objet obj1
// console.log(obj1.label); // Affiche le label de l'objet obj1
// console.log("Owowohhh");
// console.log(obj1["id"]); // Affiche l'id de l'objet obj1
// console.log(obj1["label"]); // Affiche le label de l'objet obj1
// console.log("aginnn");
// const logQuestionLabel = (index) => {
//     console.log(`Question ${index}`);
// };

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

// question1: props.formulaire.question1,
//  question1: props.questions[0].id, // Valeur initiale pour question1

const sendForm = () => {
    form.put(route("formulaires.update", props.formulaire), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
        },
    });
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
                        <TextInput
                            id="name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.name"
                        />
                        <InputError :message="form.errors.name" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="description" value="Description" />
                        <TextInput
                            id="description"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.description"
                        />
                        <InputError
                            :message="form.errors.description"
                            class="mt-2"
                        />
                    </div>

                    <template v-for="index in 50" :key="index">
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel
                                :for="`question${index}`"
                                :value="`Question ${index}`"
                            />
                            <select
                                :id="`question${index}`"
                                class="mt-1 block w-full"
                                v-model="
                                    form.formulaire_questions[
                                        `question${index}`
                                    ]
                                "
                            >
                                <option value="">Select a question</option>
                                <!-- Loop through all questions for selection -->
                                <option
                                    v-for="question in allQuestions"
                                    :key="question.id"
                                    :value="question.id"
                                >
                                    <!-- const AideChatGpt = props.questions[$index].id; -->
                                    <!-- const AideChatGpt2 = props.questions[$index].label; -->

                                    {{ question.id }}
                                    {{ question.label }}
                                </option>
                            </select>
                            <InputError
                                :message="form.errors[`question${index}`]"
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
