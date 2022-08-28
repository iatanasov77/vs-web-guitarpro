import React from 'react';

const InformationModal = () => {

    return (
        <div id="tab-information-modal" className="modal" tabIndex="-1" role="dialog" aria-hidden="true">
            <div className="modal-dialog" role="document" style={{maxWidth: "800px"}}>
                <div className="modal-content">
                    <div className="modal-header">
                        <h5 className="modal-title">Tablature Info</h5>
                        <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div className="modal-body">
                        <div id="tabInfo">
                            <h1 className="artist" style={{textAlign: "center"}}></h1>
                            <h2 className="title" style={{textAlign: "center"}}></h2>
                            <h2 className="subTitle" style={{textAlign: "center"}}></h2>
                            
                            <div className="row"><div className="col-sm">&nbsp;</div></div>
                            
                            <div className="row">
                                <div className="col-sm-2" style={{fontWeight: "bold", fontSize: "1rem", textAlign: "left"}}>Album:</div>
                                <div className="col-sm album" style={{fontSize: "1rem", textAlign: "left"}}></div>
                            </div>
                            <div className="row">
                                <div className="col-sm-2" style={{fontWeight: "bold", fontSize: "1rem", textAlign: "left"}}>Copyright:</div>
                                <div className="col-sm copyright" style={{fontSize: "1rem", textAlign: "left"}}></div>
                            </div>
                            <div className="row">
                                <div className="col-sm-2" style={{fontWeight: "bold", fontSize: "1rem", textAlign: "left"}}>Notices:</div>
                                <div className="col-sm notices" style={{fontSize: "1rem", textAlign: "left"}}></div>
                            </div>
                            <div className="row">
                                <div className="col-sm-2" style={{fontWeight: "bold", fontSize: "1rem", textAlign: "left"}}>Words:</div>
                                <div className="col-sm words" style={{fontSize: "1rem", textAlign: "left"}}></div>
                            </div>
                            <div className="row">
                                <div className="col-sm-2" style={{fontWeight: "bold", fontSize: "1rem", textAlign: "left"}}>Music:</div>
                                <div className="col-sm music" style={{fontSize: "1rem", textAlign: "left"}}></div>
                            </div>
                        </div>
                    </div>
                    <div className="modal-footer">
                        <button type="button" className="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    );
    
}

export default InformationModal;