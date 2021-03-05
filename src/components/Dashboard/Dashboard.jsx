import React from "react";
import s from "./Dashboard.module.css";

class Dashboard extends React.Component {
  handleClick = () => {
    const { handleLoginClick } = this.props;
    handleLoginClick(false);
  };



  render() {
    return (
      <div className={s.dashboard}>
        Dashboard{this.props.state}
        <button onClick={this.handleClick}>Выйти</button>
      </div>
    );
  }
}
export default Dashboard;