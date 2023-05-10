import React from 'react';

import InformationModal from './InformationModal';

const InformationItem = ( {player} ) => {

    function handleClick( e )
    {
        e.preventDefault();
        
        $( '#tabInfo' ).find( '.title' ).text( player.score.title );
        $( '#tabInfo' ).find( '.subTitle' ).text( player.score.subTitle );
        $( '#tabInfo' ).find( '.artist' ).text( player.score.artist );
        
        $( '#tabInfo' ).find( '.album' ).text( player.score.album );
        $( '#tabInfo' ).find( '.copyright' ).text( player.score.copyright );
        $( '#tabInfo' ).find( '.notices' ).text( player.score.notices );
        $( '#tabInfo' ).find( '.words' ).text( player.score.words );
        $( '#tabInfo' ).find( '.music' ).text( player.score.music );
    }
  
    return (
        <div className="player-controls__item">
            <svg className="icon" data-bs-toggle="modal" data-bs-target="#tab-information-modal" onClick={handleClick}>
                <use xlinkHref="#icon-about"></use>
            </svg>
            
            <InformationModal />
        </div>
    );
    
}

export default InformationItem;
