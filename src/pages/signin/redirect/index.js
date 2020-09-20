import React from "react";
import { Layout } from "antd";

import { PageHeader, PageFooter } from "@layouts";
import RedirectSignInComponent from "@components/signin/redirect";

const { Content } = Layout;

function SignInContainer() {
  return (
    <React.Fragment>
      <Layout>
        <PageHeader iconcolor="#202020" background="#fff" />
        <Content style={{ marginTop: "4%" }}>
          <RedirectSignInComponent />
        </Content>
        <PageFooter color="#202020" background="#fff" />
      </Layout>
    </React.Fragment>
  );
}

export default SignInContainer;
