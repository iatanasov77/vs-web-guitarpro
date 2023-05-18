<template>
    <nav id="sidebar" class="sidebar active">
    
        <!-- Display Song Position -->
        <song-position-item></song-position-item>
            
        <div class="player-controls displayPanel" style="padding: 5px 10px;">
            <!-- PlayPause Button -->
            <div id="btnPlayPause" class="player-controls__item" @click="playPause">
                <svg class="icon">
                    <use xlink:href="#icon-pause-litle" v-if="playerState==1"></use>
                    <use xlink:href="#icon-play-litle" v-else></use>
                </svg>
            </div>
  
            <!-- Stop Button -->
            <div id="btnStop" class="player-controls__item" @click="stop">
                <svg class="icon"><use xlink:href="#icon-stop-new"></use></svg>
            </div>
            
            <!-- Loop Button -->
            <div id="btnLooping" class="player-controls__item" @click="looping">
                <svg class="icon">
                    <use xlink:href="#icon-looping"></use>
                </svg>
            </div>
            
            <!-- Metronome Button -->
            <div id="btnMetronome" class="player-controls__item" @click="metronome">
                <svg class="icon">
                    <use xlink:href="#icon-metronome"></use>
                </svg>
            </div>
             
            <div id="btnCountIn" class="player-controls__item" @click="countIn">
                <svg class="icon">
                    <use xlink:href="#icon-countin"></use>
                </svg>
            </div>
            
            <!-- Tracks Button -->
            <tracks-item v-if="this.PlayerScoreLoaded" v-bind:tracks="this.player.score.tracks"></tracks-item>
            
            <!-- Speed Button -->
            <speed-item></speed-item>
             
            <!-- Layout Button -->
            <layout-item v-if="this.PlayerScoreLoaded"></layout-item>
            
            <!-- Print Button -->
            <print-item v-if="this.PlayerScoreLoaded"></print-item>
            
            <!-- Add to Favorites Button -->
            <div v-if="this.user != 0" id="add-favorite-url" class="player-controls__item favorite" data-url="url_add_to_favorite" @click="favorite">
                <svg class="icon">
                    <use xlink:href="#icon-heart"></use>
                </svg>
            </div>
            
            <!-- Tablature Information Button -->
            <information-item v-if="this.PlayerScoreLoaded"></information-item>
            
        </div>
    </nav>
</template>

<script src="./PlayerControlsScript.js"></script>
