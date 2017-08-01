/**
 * Created by braams on 01.08.2017.
 */
import React, {Component} from 'react';
import ServerItemDataField from './ServerItemDataField';
import ServerItemConnectFooter from './ServerItemConnectFooter';

const divStyle = {
    backgroundImage: 'url(' + " vignette3.wikia.nocookie.net/cswikia/images/6/6e/Csgo-de-overpass.png/revision/latest?cb=20140820130544" + ')',
};

export default class ServerItem extends Component{
    render(){
        return(
        <section className="server">
            <header className="server__header" style={divStyle}>
                <h2 className="server__title">komm-ts.de Competetive Map Rotation</h2>
                <div className="server__main-details">
                    <ServerItemDataField title="Time"/> {/*#todo server infos need to be passed to this component and following*/}
                    <ServerItemDataField title="Password"/>
                    <ServerItemDataField title="Map"/>
                    <ServerItemDataField title="Frags"/>
                </div>
            </header>
            <ServerItemConnectFooter/> {/*#todo server infos need to be passed to this component*/}
        </section>
        );
    }
}