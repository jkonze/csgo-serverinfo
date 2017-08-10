/**
 * Created by braams on 01.08.2017.
 */
import React, {Component} from 'react';
import ServerItemDataField from './ServerItemDataField';
import ServerItemConnectFooter from './ServerItemConnectFooter';

export default class ServerItem extends Component{
    render(){
        return(
        <section className="server">
            <header className="server__header">
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