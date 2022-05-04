<template>    
    <div class="player-controls__item">
        <svg class="icon" data-toggle="modal" data-target="#tab-information-modal">
            <use xlink:href="#icon-about"></use>
        </svg>
    </div>
</template>

<script>
export default {
    name: 'information-item',
    created: function () {
        /* 
         * https://docs.alphatab.net/master/api/AlphaTab.Model/Score/
         */
        $( '#tabInfo' ).find( '.title' ).text( this.$parent.player.score.title );
        $( '#tabInfo' ).find( '.subTitle' ).text( this.$parent.player.score.subTitle );
        $( '#tabInfo' ).find( '.artist' ).text( this.$parent.player.score.artist );
        
        $( '#tabInfo' ).find( '.album' ).text( this.$parent.player.score.album );
        $( '#tabInfo' ).find( '.copyright' ).text( this.$parent.player.score.copyright );
        $( '#tabInfo' ).find( '.notices' ).text( this.$parent.player.score.notices );
        $( '#tabInfo' ).find( '.words' ).text( this.$parent.player.score.words );
        $( '#tabInfo' ).find( '.music' ).text( this.$parent.player.score.music );
    },
}
</script>
