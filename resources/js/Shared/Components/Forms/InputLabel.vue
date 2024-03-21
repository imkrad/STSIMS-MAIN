<script setup>
defineProps({
    value: String,
    required: Boolean,
    message: String
});
</script>

<template>
    <label class="form-label" v-if="value">
        {{ value }} <span v-if="required" class="text-danger">*</span> <span v-if="message" class="text-danger" style="font-size: 9px;">({{message}})</span> 
    </label>
</template>
