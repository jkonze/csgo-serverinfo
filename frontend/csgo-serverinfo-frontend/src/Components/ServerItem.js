/**
 * Created by braams on 01.08.2017.
 */
import React, {Component} from 'react';
import ServerItemDataField from './ServerItemDataField';

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
                    <ServerItemDataField title="Time"/>
                    <ServerItemDataField title="Password"/>
                    <ServerItemDataField title="Map"/>
                    <ServerItemDataField title="Frags"/>
                </div>
            </header>

            <div className="server__main">
                <button className="server__connect">Connect</button>
                <pre>connect komm-ts.de:27015</pre>
            </div>
        </section>
        );
    }
}