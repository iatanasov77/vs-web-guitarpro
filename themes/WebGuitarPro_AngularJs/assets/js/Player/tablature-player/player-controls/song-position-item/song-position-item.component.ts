import { Component, Input, OnInit } from '@angular/core';
import { AlphaTabApi } from '@coderline/alphatab';

@Component({
    selector: 'song-position-item',
    templateUrl: './song-position-item.component.html',
    styleUrls: []
    //styleUrls: ['../player-controls.component.scss']
})
export class SongPositionItemComponent implements OnInit
{
    strCurrentTime: string  = '00:00';
    strEndTime: string      = '00:00';
    
    @Input() player?: AlphaTabApi;
    
    constructor()
    {
        
    }
    
    ngOnInit(): void
    {
        if ( this.player ) {
            this.player.playerPositionChanged.on( ( e: any ) => {
                this.strCurrentTime = this.formatDuration( e.currentTime );
                this.strEndTime     = this.formatDuration( e.endTime );
            });
        }
    }
    
    formatDuration( milliseconds: number )
    {
        let seconds     = milliseconds / 1000;
        const minutes   = ( seconds / 60 ) | 0;
        seconds         = ( seconds - minutes * 60 ) | 0;
        return (
            String( minutes ).padStart( 2, "0" ) +
            ":" +
            String( seconds ).padStart( 2, "0" )
        );
    }

    
}
