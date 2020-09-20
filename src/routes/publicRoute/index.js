import React from "react";
import { Route, Redirect } from "react-router-dom";


const PublicRoute = (props) => {
	const { component: Component, ...rest } = props;
	let isUserAuthenticated;
	const location = {
		pathname: "/home",
	};
	return (
		<Route
			{...rest}
			render={(props) => {
				if (isUserAuthenticated) {
					return <Redirect to={location} />;
				} else {
					return <Component {...props} />;
				}
			}}
		/>
	);
};

export default PublicRoute;
