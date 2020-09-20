import React from 'react';
import { Route } from 'react-router-dom';
import { useStoreContext } from '@store';
import RedirectSignin from '@pages/signin/redirect';

const ProtectedRoute = (props) => {
	const { state } = useStoreContext();
	const { authenticated } = state;
	let isUserAuthenticated = authenticated;
	const { component: Component, ...rest } = props;

	return (
		<Route
			{...rest}
			render={(props) => {
				if (isUserAuthenticated) {
					return <Component {...props} />;
				}
				return <RedirectSignin />;
			}}
		/>
	);
};

export default ProtectedRoute;
