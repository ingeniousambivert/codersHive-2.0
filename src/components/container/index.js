import React from 'react';
import { Row, Col } from 'antd';

function Container(props) {
  const style = {
    padding: props.padding ? props.padding : '2%',
    margin: props.margin ? props.margin : '2%',
    alignContent: 'center',
  };

  return (
    <div style={style}>
      <Row align="midddle" justify="center">
        <Col flex="auto">{props.children}</Col>
      </Row>
    </div>
  );
}

export default Container;
