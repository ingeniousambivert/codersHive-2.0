import React from "react";
import { Spin, Layout, Row, Col } from "antd";

const { Content } = Layout;

const Spinner = (props) => {
  return (
    <React.Fragment>
      <Layout>
        <Content style={{ marginTop: "20%" }}>
          <Row justify="center" align="middle">
            <Col>
              <Spin
                size="large"
                tip={props.loadingtext ? props.loadingtext : "Loading..."}
              />
            </Col>
          </Row>
        </Content>
      </Layout>
    </React.Fragment>
  );
};

export { Spinner };
