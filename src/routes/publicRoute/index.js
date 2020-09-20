import React from 'react';
import { Route, Redirect } from 'react-router-dom';
import { useStoreContext } from "@store"

const PublicRoute = (props) => {
	const { state } = useStoreContext();
	const { authenticated } = state;
	let isUserAuthenticated = authenticated;
	const { component: Component, ...rest } = props;
	const location = {
		pathname: '/home',
	};
	return (
		<Route
			{...rest}
			render={(props) => {
				if (isUserAuthenticated) {
					return <Redirect to={location} />;
				}
				return <Component {...props} />;
			}}
		/>
	);
};

export default PublicRoute;
