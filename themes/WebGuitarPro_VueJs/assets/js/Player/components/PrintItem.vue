<template>    
    <div class="player-controls__item" @click="print">
        <svg class="icon">
            <use xlink:href="#icon-print-new"></use>
        </svg>
    </div>
</template>

<script>
export default {
    name: 'print-item',
    data () {
        return {
            
        }
    },
    methods: {
        print() {
            this.$parent.player.print();
        },
    },
}
</script>
