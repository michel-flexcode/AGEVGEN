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
    student: Object,
    sections: Array, // Passer les sections disponibles comme prop
    section: Object, // Passer les sections disponibles comme prop
    StudentSection: Object,
    StudentSection: Array,
});

const form = useForm({
    _method: "PUT",
    name: props.student.name,
    surname: props.student.surname,
    email: props.student.email,
    section: props.StudentSection.name,
    section2: props.StudentSection.email,
    section3: props.StudentSection.email,
});

const sendForm = () => {
    form.put(route("students.update", props.student), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
        },
    });
};
</script>

<template>

            <FormSection @submitted="sendForm">
                <template #title> Modification d'une student </template>

                <template #form>

                        <InputLabel for="name" value="Name" />
                        <TextInput
                            id="name"
                            type="text"
                            v-model="form.name"
                        />

                        <InputLabel for="surname" value="Surname" />
                        <TextInput
                            id="surname"
                            type="text"
                            v-model="form.surname"
                        />

                        <InputLabel for="email" value="Email" />
                        <TextInput
                            id="email"
                            type="email"
                            v-model="form.email"
                        />
                        <InputLabel for="section" value="Section" />
                        <TextInput
                            id="section"
                            type="text"
                            v-model="form.section"
                        />
                        <InputLabel for="section2" value="Section 2" />
                        <select
                            id="section2"
                            v-model="form.section2"
                        >
                            <option value="">Select a section</option>
                            <option
                                v-for="section in sections"
                                :key="section.id"
                                :value="section.id"
                            >
                                {{ section.id }}
                                {{ section.Name }}
                            </option>
                        </select>
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
