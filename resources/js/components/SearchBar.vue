<template>
    <div class="container">
        <label for="search">Search for stuff</label>
        <input type="search" name="richiesta" placeholder="Cerca tra i locali per nome o indirizzo..." autofocus required />
        <button type="submit">Go</button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
