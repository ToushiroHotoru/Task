import React from "react";
import StyleNavigator from "./Navigator.module.css";
import { IoAccessibility } from "react-icons/io5";
import { AiOutlineUsergroupAdd } from "react-icons/ai";
import { VscBroadcast } from "react-icons/vsc";
import { BiGroup } from "react-icons/bi";
import { BiBookBookmark } from "react-icons/bi";
import StudentsTable from "./Tables/Students";
import StudentsCourses from "./Tables/Courses";
const buttonArray = [
  {
    text: "ФИО",
    icon: <IoAccessibility />,
    title: "Ефремов Михаил Андреевич",
  },
  {
    text: "Группа",
    icon: <AiOutlineUsergroupAdd />,
    title: "Ир1-17",
  },
  {
    text: "Возраст",
    icon: <VscBroadcast />,
    title: "19 лет",
  },
  {
    text: "Cтуденты",
    icon: <BiGroup />,
    title: <StudentsTable />,
  },
  {
    text: "Курсовые",
    icon: <BiBookBookmark />,
    title: <StudentsCourses />,
  },

];

class Navigator extends React.Component {
  render() {
    return (
      <div className={StyleNavigator.navigator}>
        {buttonArray.map((button) => (
          <div>
            {button.icon}
            <button
              onClick={() => {
                this.props.sendValue(button.title);
              }}
            >
              {button.text}
            </button>
          </div>
        ))}
      </div>
    );
  }
}

export default Navigator;
