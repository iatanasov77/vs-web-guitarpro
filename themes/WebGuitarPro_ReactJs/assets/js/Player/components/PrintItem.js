import React from 'react';

const PrintItem = ( {player} ) => {

    function print()
    {
        player.print();
    }
    
    return (
        <div className="player-controls__item" onClick={ print }>
            <svg className="icon">
                <use xlinkHref="#icon-print-new"></use>
            </svg>
        </div>
    );
}

export default PrintItem;
