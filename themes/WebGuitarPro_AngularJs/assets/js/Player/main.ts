import { enableProdMode } from '@angular/core';
import { platformBrowserDynamic } from '@angular/platform-browser-dynamic';

import { PlayerModule } from './tablature-player/player.module';

platformBrowserDynamic().bootstrapModule(PlayerModule)
  .catch( ( err: any ) => console.error(err));
