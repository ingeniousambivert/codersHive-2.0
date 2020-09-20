import React from "react";
import { Layout, Typography } from "antd";

const { Footer } = Layout;

const { Link } = Typography;

const PageFooter = (props) => {
  return (
    <Footer
      style={{
        background: props.background,
      }}
    >
      <p
        style={{
          color: props.color,
          fontSize: "0.65rem",
          textAlign: "center",
        }}
      >
        {/* {" Ã‚Â© "} {new Date().getFullYear()}{" "} */}
        <Link strong href="/">
          theManagementProject
        </Link>
      </p>
    </Footer>
  );
};

export { PageFooter };
