/**
 * Created by braams on 01.08.2017.
 */
import React, {Component} from 'react';

export default class ServerItemConnectFooter extends Component{
    render(){
        return(
            <div className="server__main">
                <a className="server__connect button" href="ts3server://komm-ts.de:27015"><p>Connect</p></a>
                <pre>connect komm-ts.de:27015</pre>{/*#todo server infos need to be passed to this component*/}
            </div>
        );
    }
}