import React from 'react';
import { Switch, Route, BrowserRouter as Router } from 'react-router-dom';

import './assets/less/App.less';
import './assets/scss/style.scss';

import Routes from './routes';

const App = () => (
  <Router>
    <Switch>
      <Route component={Routes} />
    </Switch>
  </Router>
);

export default App;
