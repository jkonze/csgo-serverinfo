import React, { Component } from 'react';
import './App.css';
import ServerItem from './Components/ServerItem';
import Header from './Components/Header';
class App extends Component {
  render() {
    return (
      <div className="page-contents">
          <Header />
         <div className="servers">
            <ServerItem />
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
