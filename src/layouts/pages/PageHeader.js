import React from "react";
import { Layout, Row, Col } from "antd";
import Logo from "../partials/Logo";

const { Header } = Layout;

const PageHeader = (props) => {
  const headerStyle = {
    background: props.background,
    color: props.iconcolor,
    padding: "1% 2.5%",
    boxShadow: props.elevate ? "0px 1px 10px #999" : null,
  };

  return (
    <div>
      <Header style={headerStyle} className="header">
        <Row justify="start" align="middle">
          <Col span={4}>
            {props.showlogo === false ? null : (
              <Logo iconcolor={props.iconcolor} />
            )}
          </Col>
          <Col span={4}>
            <h3>{props.heading}</h3>
          </Col>
        </Row>
        {props.children}
      </Header>
    </div>
  );
};

export { PageHeader };
