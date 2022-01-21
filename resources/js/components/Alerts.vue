<template>
    <div v-if="massage.status" class="alert alert-success" role="alert">
        Your feedback request has been successfully saved
    </div>
    <div v-else class="alert alert-danger" role="alert">
        Fill out the form validly!
    </div>
</template>

<script>
export default {
    name: "Alerts",
    props: {
        massage: {
            type:Object,
            required: true
        }
    }
}
</script>

<style scoped>

</style>
