import React from "react";
import s from "./LoginForm.module.css";


class LoginForm extends React.Component {

  handleClick = () => {
    const { handleLoginClick } = this.props;
    handleLoginClick(true);
  };

  render() {
    // const { onButtonClick } = this.props;

    return (
      <div className={s.enter}>
          <input type="text" placeholder="Введите имя"></input>
          <button onClick={this.handleClick}>Войти</button>
      </div>
    );
  }
}

export default LoginForm;