import React from "react";
import { Layout } from "antd";

import { PageHeader, PageFooter } from "@layouts";
import HomeComponent from "@components/home";

const { Content } = Layout;

function HomeContainer() {
	return (
		<React.Fragment>
			<Layout>
				<PageHeader iconcolor="#202020" background="#fff" />
				<Content style={{ marginTop: "4%" }}>
					<HomeComponent />
				</Content>
				<PageFooter color="#202020" background="#fff" />
			</Layout>
		</React.Fragment>
	);
}

export default HomeContainer;
