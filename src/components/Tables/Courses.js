import React from "react";
import { Table } from "antd";
import "antd/dist/antd.css";
let url = "https://jsonplaceholder.typicode.com/posts?userId=1";
const columns = [
  {
    title: "userId",
    dataIndex: "userId",
    key: "userId",
  },
  {
    title: "id",
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
    studentId: '',
  };

  componentDidMount = async () => {
    let users = [];
    try {
      const result = await fetch(url);
      users = await result.json();
    } catch (err) {
      this.setState({
        error: "Ошибка получения данных",
      });
    }
    console.log(users);
    this.setState({
      users,
    });
  };


  render() {
    const { error, users } = this.state;
    return (
      <div className="students">
        <h1>Список курсовых</h1>
        <h2>{error}</h2>
        <Table dataSource={users} columns={columns} />
      </div>
    );
  }
}

export default Courses;
