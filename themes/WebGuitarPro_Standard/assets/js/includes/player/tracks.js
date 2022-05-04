
export function createTrackItem( scoreTrack )
{
    return `
    <div class="track" data-track="${scoreTrack.Index}">
        <div class="title" v-on:click="onClickTrackTitle"><i class="fa fa-eye-slash showHide"></i>${scoreTrack.Name}</div>
        <div class="btn-group btn-group-xs">

            <button type="button" class="btn btn-default solo" v-on:click="onClickTrackSolo">Solo</button>
            <button type="button" class="btn btn-default mute" v-on:click="onClickTrackMute">Mute</button>

            <!--
            <button type="button" class="btn btn-default solo" v-on:click="onClickTrackSolo">
                <svg class="icon"><use xlink:href="#icon-solo"></use></svg>
            </button>
            <button type="button" class="btn btn-default mute" v-on:click="onClickTrackMute">
                <svg class="icon"><use xlink:href="#icon-mute"></use></svg>
            </button>
            -->
        </div>
        <input id="volume-${scoreTrack.Index}" type="text" />
    </div>
    <script>
        $( "#volume-${scoreTrack.Index}" ).slider({ min: 0, max: 16, step: 1, value: ${scoreTrack.playbackInfo.volume}, handle: "square" });
    </script>
    `;
}
