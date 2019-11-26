<template>
    <div class="payment">
        <form method="post" v-if="loaded">
            <div id="dropin"></div>
            <button class="btn btn-outline-dark" v-if="showSubmitButton">Complete</button>
            <input type="hidden" name="_token" :value="csrfToken">
        </form>

        <div v-else>Loading payment form</div>
    </div>
</template>

<script>
    import braintree from 'braintree-web'

    export default {
        data() {
            return {
                loaded: false,
                showSubmitButton: false,
                csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },

        mounted() {
            axios.get('/braintree/token').then(response => {
                this.loaded = true

                braintree.setup(response.data.data.token, 'dropin', {
                    container: 'dropin',
                    onReady: () => {
                        this.showSubmitButton = true
                    }
                })
            })
        }
    }
</script>
