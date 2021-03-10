import React from "react";
import { Table } from "antd";
import PeopleStyle from "./People.module.css";
import "antd/dist/antd.css";
let url = "https://jsonplaceholder.typicode.com/users";

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

class People extends React.Component {
  state = {
    users: [],
    error: "",
    studId: "",
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


  render() {
    const { error, users } = this.state;

    return (
      <div className={PeopleStyle.mainDiv}>
        <h1>Список студентов</h1>
        <h2>{error}</h2>
        <Table
          onRow={(record) => {
            return {
              onClick: (event) => {
                let id = record.id;
                this.setState({ studId: id });
                this.props.parentFunc({ id });
              },
            };
          }}
          dataSource={users}
          columns={columns}
        />
      </div>
    );
  }
}

export default People;
