<template>
    <div class="player-controls__item">
        <svg class="icon dropdown-toggle" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
            <use xlink:href="#icon-layout"></use>
        </svg>
        <div class="dropdown-menu dropdown-menu-right dropright dropup dropdown-layers player-menu-right">
            <div class="dropdown-menu-background">
                <div style="font-weight:bold; padding-left: 10px;">Layout</div>
                <ul>
                    <li :class="{ active:layout.id == selectedLayout }"
                        v-for="(layout, index) in this.layouts"
                        v-on:click.stop="setLayout( layout, $event )"
                    >{{ layout.text }}</li>
                </ul>
                <div style="font-weight:bold; padding-left: 10px;">Stave Profile</div>
                <ul>
                    <li :class="{ active:staveprofile == selectedStaveprofile }"
                        v-for="(staveprofile, index) in this.staveprofiles"
                        v-on:click.stop="setStaveprofile( staveprofile, $event )"
                    >{{ staveprofile }}</li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'layout-item',
    data () {
        return {
            selectedLayout: 'page',
            selectedStaveprofile: 'default',
            
            layouts: [
                {
                    id: 'page',
                    text: 'Page',
                    layout: 'page',
                    scrollmode: 'vertical',
                },
                {
                    id: 'horizontalBarwise',
                    text: 'Horizontal (Barwise)',
                    layout: 'horizontal',
                    scrollmode: 'horizontal-bar',
                },
                {
                    id: 'horizontalOffscreen',
                    text: 'Horizontal (Offscreen)',
                    layout: 'horizontal',
                    scrollmode: 'horizontal-offscreen',
                },
            ],
            
            staveprofiles: ['default', 'scoretab', 'score', 'tab', 'tabmixed'],
        }
    },
    methods: {
        setLayout:  function( layout, event ) {
            this.selectedLayout = layout.id;
            
            // update renderer
            this.$parent.player.settings.display.layoutMode = layout.layout;
            
            // update player
            //this.$parent.player.alphaTab( 'autoScroll', scrollmode );
            
            this.$parent.player.updateSettings();
            this.$parent.player.render();
            
            $( event.target ).closest( ".dropdown-menu" ).toggleClass( 'show' );
        },
        
        setStaveprofile:  function( staveprofile, event ) {
            this.selectedStaveprofile = staveprofile;
            
            // update renderer
            this.$parent.player.settings.display.staveProfile = staveprofile;
            
            this.$parent.player.updateSettings();
            this.$parent.player.render();
            
            $( event.target ).closest( ".dropdown-menu" ).toggleClass( 'show' );
        },
    },
}
</script>
