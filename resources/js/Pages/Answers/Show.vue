<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, router, useForm } from "@inertiajs/vue3";
import ActionMessage from "@/Components/ActionMessage.vue";
import FormSection from "@/Components/FormSection.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { onMounted, ref } from "vue";

const props = defineProps({
    formulaire: Object,
});

const form = useForm({
    _method: "POST",
    formulaire_id: props.formulaire.id,
    answers:[],
});

onMounted(() => {
for (let index = 0; index < props.formulaire.questions.length; index++) {
    const question = props.formulaire.questions[index];
    form.answers.push({
        question_id:question.id,
        value:null,
        type:question.type,
    })
}
// console.log(form.answers);
})

const sendForm = ()=>{
form.post(route('answers.store'))
}

</script>

<template>
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
                        v-for="(question, index) in formulaire.questions"
                        :key="question.id"
                        class="col-span-6 sm:col-span-4"
                    >
                        <InputLabel
                            :for="`${index + 1}`"
                            :value="`${index + 1}. ${question.label}`"
                        />
                        <div class="mt-1 block w-full">
                            <template v-if="question.type === 'libre'">
                                <input v-if="form.answers[index]"
                                    type="text"
                                    v-model="form.answers[index].value"
                                />
                            </template>
                            <template v-else-if="question.type === 'choix'">
    <select v-if="form.answers[index]" v-model="form.answers[index].value">
        <option
            v-for="(
                choice, choiceIndex
            ) in 10" 
            :key="choiceIndex"
            :value="choice"
        >
            {{ choice }}
        </option>
    </select>
</template>
                        </div>
                        <InputError
                            :message="form.errors['answers.'+(index)+'.value']"
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
