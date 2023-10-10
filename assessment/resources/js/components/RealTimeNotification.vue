<template>
    <div>
        <h1>Real-Time Message:</h1>
        <p>{{ message }}</p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            message: '',
        };
    },
    mounted() {
        // Listen to a channel and event
        this.$echo.channel('notification')
            .listen('/event', (data) => {
                this.message = data.message;
            });
    },
};
</script>
