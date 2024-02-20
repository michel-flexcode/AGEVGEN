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
    formulaires: Object,
    formulaires: Array,
    //Question important pour liste déroulante
    questions: Object,

    courses: Array,
    course: Object,
});

const form = useForm({
    _method: "POST",
    name: "",
    description: "",
    question1: "",
    question2: "",
    question3: "",
    question4: "",
    question5: "",
    question6: "",
    question7: "",
    question8: "",
    question9: "",
    question10: "",
    question11: "",
    question12: "",
    question13: "",
    question14: "",
    question15: "",
    question16: "",
    question17: "",
    question18: "",
    question19: "",
    question20: "",
    question21: "",
    question22: "",
    question23: "",
    question24: "",
    question25: "",
    question26: "",
    question27: "",
    question28: "",
    question29: "",
    question30: "",
    question31: "",
    question32: "",
    question33: "",
    question34: "",
    question35: "",
    question36: "",
    question37: "",
    question38: "",
    question39: "",
    question40: "",
    question41: "",
    question42: "",
    question43: "",
    question44: "",
    question45: "",
    question46: "",
    question47: "",
    question48: "",
    question49: "",
    question50: "",
});

const sendForm = () => {
    form.post(route("formulaires.store"), {
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
                Ajouter un formulaire
            </h2>
        </template>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <FormSection @submitted="sendForm">
                <template #title> Création d'un formulaire </template>

                <template #description>
                    les formulaires peuvent être remplis de questions
                    préalablement crées.
                </template>

                <template #form>
                    <!-- Champs de formulaire -->
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
                                <option value="">
                                    Sélectionner une question
                                </option>
                                <!-- Boucle sur les questions disponibles pour la sélection -->
                                <option
                                    v-for="question in questions"
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
                        Saved.
                    </ActionMessage>

                    <PrimaryButton
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Save
                    </PrimaryButton>
                </template>
            </FormSection>
        </div>
    </AppLayout>
</template>
