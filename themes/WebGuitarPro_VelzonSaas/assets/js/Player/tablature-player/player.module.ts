import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { CommonModule } from '@angular/common';
import { MatTooltipModule } from '@angular/material/tooltip';

import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { NgxBootstrapSliderModule } from 'ngx-bootstrap-slider';
import { TranslatePipe, provideTranslateService, provideTranslateLoader } from '@ngx-translate/core';
import { TranslateHttpLoader, provideTranslateHttpLoader } from '@ngx-translate/http-loader';
import { HttpClientModule, HttpClient, provideHttpClient } from '@angular/common/http';

import { PlayerComponent } from './player.component';
import { PlayerControlsComponent } from './player-controls/player-controls.component';

import { SongPositionItemComponent } from './player-controls/song-position-item/song-position-item.component';
import { PlayPauseButtonItemComponent } from './player-controls/play-pause-button-item/play-pause-button-item.component';
import { StopButtonItemComponent } from './player-controls/stop-button-item/stop-button-item.component';
import { LoopingButtonItemComponent } from './player-controls/looping-button-item/looping-button-item.component';
import { MetronomeButtonItemComponent } from './player-controls/metronome-button-item/metronome-button-item.component';
import { CountInButtonItemComponent } from './player-controls/count-in-button-item/count-in-button-item.component';
import { FavoritesButtonItemComponent } from './player-controls/favorites-button-item/favorites-button-item.component';
import { InformationButtonItemComponent } from './player-controls/information-button-item/information-button-item.component';
import { PrintItemComponent } from './player-controls/print-item/print-item.component';
import { LayoutItemComponent } from './player-controls/layout-item/layout-item.component';
import { SpeedItemComponent } from './player-controls/speed-item/speed-item.component';

import { TracksItemComponent } from './player-controls/tracks-item/tracks-item.component';
import { DownloadButtonItemComponent } from './player-controls/download-button-item/download-button-item.component';

@NgModule({
    declarations: [
        PlayerComponent,
        PlayerControlsComponent,
        
        SongPositionItemComponent,
        PlayPauseButtonItemComponent,
        StopButtonItemComponent,
        LoopingButtonItemComponent,
        MetronomeButtonItemComponent,
        CountInButtonItemComponent,
        FavoritesButtonItemComponent,
        InformationButtonItemComponent,
        PrintItemComponent,
        LayoutItemComponent,
        SpeedItemComponent,
        TracksItemComponent,
        DownloadButtonItemComponent,
    ],
    imports: [
        BrowserModule,
        
        CommonModule,
        MatTooltipModule,
        NgbModule,
        NgxBootstrapSliderModule,
        //NgSlimScrollModule
        
        TranslatePipe,

    ],
    providers: [
        provideHttpClient(),
        provideTranslateService({
            loader: provideTranslateHttpLoader({prefix:'/build/web-guitar-pro-velzon-saas/i18n/', suffix:'.json'}),
            fallbackLang: 'en'
        })
    ],
    bootstrap: [PlayerComponent]
})
export class PlayerModule { }
