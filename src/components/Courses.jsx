import React from "react";
import { Table } from "antd";
import PeopleStyle from "./People.module.css";
import "antd/dist/antd.css";
let url = "https://jsonplaceholder.typicode.com/posts?userId=";
const columns = [
  {
    title: "UserId",
    dataIndex: "userId",
    key: "userId",
  },
  {
    title: "id-пользователя",
    dataIndex: "id",
    key: "id",
  },
  {
    title: "Название курсовой",
    dataIndex: "title",
    key: "title",
  },
];

class Courses extends React.Component {
  state = {
    users: [],
    error: "",
  };

  componentDidMount = async () => {
    let users = [];
    try {
      const result = await fetch(url + this.props.state.id);
      users = await result.json();
    } catch (err) {
      this.setState({
        error: "Ошибка получения данных",
      });
    }

    this.setState({
      users,
    });
  };

  render() {
    const { error, users } = this.state;
    return (
      <div className={PeopleStyle.mainDiv}>
        <h1>Список курсовых</h1>
        <h2>{error}</h2>
        <Table dataSource={users} columns={columns} />
      </div>
    );
  }
}

export default Courses;
