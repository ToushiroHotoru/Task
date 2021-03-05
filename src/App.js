import React from "react";
import "./App.css";
import LoginForm from "./components/LoginForm/LoginForm";
import Navigator from "./components/Navigator/Navigator";


class App extends React.Component {
  state = {
    isLoggedIn: false,
  };



  handleLoginClick = (param) => {
    this.setState({ isLoggedIn: param });
  };

  

  render() {
    return (
      <div className="App">
        {this.state.isLoggedIn ? (
          <div className="MainScreen">
            <Navigator handleLoginClick={this.handleLoginClick} />
          </div>
        ) : (
          <div className="SubScreen">
          <LoginForm handleLoginClick={this.handleLoginClick} />
          </div>
        )}
      </div>
    );
  }
}

export default App;
