import React from "react";
import { Route, Switch } from "react-router-dom";

import Signin from "@pages/signin";
import Signup from "@pages/signup";

import ProtectedRoute from "./protectedRoute";
import PublicRoute from "./publicRoute";

import { NotFound } from "@layouts";

const Routes = (props) => {
	return (
		<section className="routeContainer">
			<Switch>
				<PublicRoute exact path="/signup" component={Signup} />
				<PublicRoute exact path="/signin" component={Signin} />

				<Route component={NotFound} />
			</Switch>
		</section>
	);
};

export default Routes;
