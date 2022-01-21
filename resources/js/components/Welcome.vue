<template>

    <form @submit.prevent>
        <alerts v-if="success" :massage="massage"></alerts>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" v-model="name" id="name" aria-describedby="emailHelp"
                   placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="phone">Password</label>
            <input type="number" class="form-control" v-model="phone" id="phone" placeholder="Phone number">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" placeholder="Enter your text" v-model="description" class="form-control"
                      id="description" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" @click="saveFeedback">Submit</button>
    </form>
</template>
<script>
import Alerts from "./Alerts";

export default {
    components: {
        Alerts
    },
    data() {
        return {
            massage: '',
            success: false,
            name: '',
            phone: '',
            description: ''
        }
    },
    methods: {
        saveFeedback() {
            this.axios.post('/api/v1/create_feedback', {
                name: this.name,
                phone: this.phone,
                description: this.description
            }).then((response) => {
                this.massage = response.data;
                this.success = true;
                this.name = '';
                this.phone = '';
                this.description = '';
            })
        }
    }
}
</script>
