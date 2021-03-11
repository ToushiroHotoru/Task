import React from "react";
import s from "./Navigator.module.css";
import { BrowserRouter, Route } from "react-router-dom";
import Name from "./Files/Name";
import Group from "./Files/Group";
import Age from "./Files/Age";
import People from "./People/People.jsx";
import { NavLink } from "react-router-dom";
import Courses from "./Courses/Courses.jsx";

class Navigator extends React.Component {
  state = {
    name: "Алексеев Аркадий Валерьевич",
    group: "Ир1-17",
    age: "19 лет",
    studId: "",
  };

  handleClick = () => {
    const { handleLoginClick } = this.props;
    handleLoginClick(false);
  };

  parentFunc = (id) => {
    this.setState({
      studId: id,
    });
  };

  render() {
    return (
      <BrowserRouter>
        <div className={s.navigator}>
          <nav>
            <NavLink to="/name">ФИО</NavLink>
            <NavLink to="/group">Группа</NavLink>
            <NavLink to="/age">Возраст</NavLink>
            <NavLink to="/people">Студенты</NavLink>
            <NavLink to="/courses">Курсовые</NavLink>
          </nav>
          <div className={s.dashboard}>
            <Route
              path="/name"
              render={() => <Name state={this.state.name} />}
            />
            <Route
              path="/group"
              render={() => <Group state={this.state.group} />}
            />
            <Route path="/age" render={() => <Age state={this.state.age} />} />
            <Route
              path="/people"
              render={() => <People parentFunc={this.parentFunc} />}
            />
            <Route
              path="/courses"
              render={() => <Courses state={this.state.studId} />}
            />
            <div className={s.btn}>
              <button onClick={this.handleClick}>Выйти</button>
            </div>
          </div>

          {/* {buttonArray.map((button) => (
          <div>
            <button>{button.icon}{button.text}</button>
          </div>
        ))} */}
        </div>
      </BrowserRouter>
    );
  }
}

export default Navigator;
