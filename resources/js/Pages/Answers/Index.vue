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
    questions: Object,
});
const form = useForm({
    _method: "POST",
    taukain: "",
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
    form.post(route("answers.store"), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
        },
    });
};
</script>

<template>
    <div>
        <h1>Répondre au formulaire</h1>
        <form @submit.prevent="submitForm">
            <div v-for="(question, index) in questions" :key="question.id">
                <label :for="'question_' + question.id">{{
                    question.label
                }}</label>
                <input
                    :id="'question_' + question.id"
                    :type="question.type === 'text' ? 'text' : 'number'"
                />
                v-model="answers[index]" >
            </div>
            <button type="submit">Envoyer</button>
        </form>
    </div>
</template>
