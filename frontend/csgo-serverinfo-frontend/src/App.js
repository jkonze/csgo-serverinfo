import React, { Component } from 'react';
import logo from './logo.svg';
import './App.css';
import ServerItem from './Components/ServerItem';

class App extends Component {
  render() {
    return (
      <div className="page-contents">
         <div className="servers">
            <ServerItem />
            <ServerItem />
            <ServerItem />
            <ServerItem />
         </div>
     </div>
    );
  }
}

export default App;
