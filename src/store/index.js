import React, { createContext, useReducer, useContext } from 'react';
import { storage } from '@utils';
import produce from 'immer';

const initialState = {
	loading: true,
	error: null,
	info: null,
	authenticated: false,
	userID: null,
	user: null,
	projectID: null,
	project: null,
	projects: [],
};

export const storeContext = createContext(initialState);

const reducer = (state, action) => {
	const handlers = {

		load: (state) => {
			state.loading = false;
		},

		authenticate: (state) => {
			state.authenticated = true;
			//return Promise.resolve(true);
		},

		logout: (state) => {
			state.authenticated = false;
			state.projects = null;
			state.projectID = null;
			state.project = null;
			state.user = null;
			storage.clear();
		},

		user: (state, { user }) => {
			state.user = user;
			//return Promise.resolve(user);
		},

		projects: (state, { projects }) => {
			state.projects = projects;

			if (projects) {
				storage.set('projects', projects);
				//return Promise.resolve(projects);
			} else {
				storage.set('projects', null);
			}
		},

		project: (state, { project }) => {
			state.project = project;

			if (project) {
				state.projectID = project._id;
				storage.set('project', project._id);
				//	return Promise.resolve(project);
			} else {
				storage.set('project', null);
			}
		},

		error: (state, { error }) => {
			state.error = error;
		},
		info: (state, { info }) => {
			state.info = info;
		},
	};

	const handler = handlers[action.type];
	return handler ? handler(state, action) : state;
};

export const StoreProvider = ({ children }) => {
	const [state, dispatch] = useReducer(produce(reducer), initialState);

	return (
		<storeContext.Provider
			displayName="Initial State"
			value={{
				state,
				dispatch,
			}}
		>
			{children}
		</storeContext.Provider>
	);
};

export const useStoreContext = () => useContext(storeContext);
