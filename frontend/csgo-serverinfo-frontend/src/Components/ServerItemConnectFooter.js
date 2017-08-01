/**
 * Created by braams on 01.08.2017.
 */
import React, {Component} from 'react';

export default class ServerItemConnectFooter extends Component{
    render(){
        return(
            <div className="server__detail">
                <p>{this.props.title}</p>
                <div className="server__detail-value"></div>
            </div>
        );
    }
}