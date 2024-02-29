<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";
</script>

<template>
    <div>
        <h2>{{ formulaire.name }}</h2>
        <p>{{ formulaire.description }}</p>

        <form @submit.prevent="submitForm">
            <div v-for="(question, index) in questions" :key="question.id">
                <label :for="'question-' + index">{{ question.label }}</label>
                <input
                    :type="question.type"
                    :id="'question-' + index"
                    v-model="answers[index]"
                />
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>
</template>
