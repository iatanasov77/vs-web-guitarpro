import React from 'react';
import ReactDOM from 'react-dom/client';
import PlayerControls from './PlayerControls';

const logged    = ( $( '#alphaTab' ).attr( 'data-user' ) == 'true' );
const root      = ReactDOM.createRoot( document.getElementById( 'player-controls' ) );
root.render(
    <PlayerControls player={api} logged={logged} />
);
