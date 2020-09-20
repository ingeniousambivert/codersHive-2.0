import React from "react";
import { Route } from "react-router-dom";

import RedirectSignin from "@pages/signin/redirect";

const ProtectedRoute = (props) => {
	const { component: Component, ...rest } = props;
	let isUserAuthenticated;

	return (
		<Route
			{...rest}
			render={(props) => {
				if (isUserAuthenticated) {
					return <Component {...props} />;
				} else {
					return <RedirectSignin />;
				}
			}}
		/>
	);
};

export default ProtectedRoute;
