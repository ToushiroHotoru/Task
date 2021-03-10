import React from "react";
import { Table } from "antd";
import "antd/dist/antd.css";
const url = "https://jsonplaceholder.typicode.com/users";

// const dataSource = [
//   {
//     key: "1",
//     name: "Mike",
//     age: 32,
//     address: "10 Downing Street",
//   },
//   {
//     key: "2",
//     name: "John",
//     age: 42,
//     address: "10 Downing Street",
//   },
// ];

const columns = [
  {
    title: "Name",
    dataIndex: "name",
    key: "name",
  },
  {
    title: "Email",
    dataIndex: "email",
    key: "email",
  },
  {
    title: "Username",
    dataIndex: "username",
    key: "username",
  },
];

class Students extends React.Component {
  state = {
    users: [],
    error: "",
    studentId: "",
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
    this.setState({
      users,
    });
  };

  putId = (id) => {
    this.setState({studentId: id});
    console.log(id);
  };



  render() {
    const { error, users } = this.state;
    return (
      <div className="students">
        <h1>Список студентов</h1>
        <h2>{error}</h2>

        <Table
          onRow={(record) => {
            return {
              onClick: (event) => {
                this.putId(record.id);
              }, // check click row
            };
          }}
          dataSource={users}
          columns={columns}
        />
      </div>
    );
  }
}

export default Students;
