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

const form = useForm({
    _method: "PUT",
    name: props.formulaire.name,
    description: props.formulaire.description,
    question1: props.formulaire.question1,
    question2: props.formulaire.question2,
    question3: props.formulaire.question3,
    question4: props.formulaire.question4,
    question5: props.formulaire.question5,
    question6: props.formulaire.question6,
    question7: props.formulaire.question7,
    question8: props.formulaire.question8,
    question9: props.formulaire.question9,
    question10: props.formulaire.question10,
    question11: props.formulaire.question11,
    question12: props.formulaire.question12,
    question13: props.formulaire.question13,
    question14: props.formulaire.question14,
    question15: props.formulaire.question15,
    question16: props.formulaire.question16,
    question17: props.formulaire.question17,
    question18: props.formulaire.question18,
    question19: props.formulaire.question19,
    question20: props.formulaire.question20,
    question21: props.formulaire.question21,
    question22: props.formulaire.question22,
    question23: props.formulaire.question23,
    question24: props.formulaire.question24,
    question25: props.formulaire.question25,
    question26: props.formulaire.question26,
    question27: props.formulaire.question27,
    question28: props.formulaire.question28,
    question29: props.formulaire.question29,
    question30: props.formulaire.question30,
    question31: props.formulaire.question31,
    question32: props.formulaire.question32,
    question33: props.formulaire.question33,
    question34: props.formulaire.question34,
    question35: props.formulaire.question35,
    question36: props.formulaire.question36,
    question37: props.formulaire.question37,
    question38: props.formulaire.question38,
    question39: props.formulaire.question39,
    question40: props.formulaire.question40,
    question41: props.formulaire.question41,
    question42: props.formulaire.question42,
    question43: props.formulaire.question43,
    question44: props.formulaire.question44,
    question45: props.formulaire.question45,
    question46: props.formulaire.question46,
    question47: props.formulaire.question47,
    question48: props.formulaire.question48,
    question49: props.formulaire.question49,
    question50: props.formulaire.question50,
});

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
                                v-model="form[`question${index}`]"
                            >
                                <option value="">Select a question</option>
                                <!-- Loop through all questions for selection -->
                                <option
                                    v-for="question in allQuestions"
                                    :key="question.id"
                                    :value="question.id"
                                >
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
