import React from "react";
import NavBar from "./Components/Navbar/Navbar";
import "bootstrap/dist/css/bootstrap.min.css";
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Redirect,
} from "react-router-dom";
import Home from "./Components/Home/Home";
function App() {
  return (
    <React.Fragment>
      <Router>
        <NavBar />
        <Redirect exact from="/" to="/home" />
        <Switch>
          <Route path="/home">
            <Home></Home>
          </Route>
        </Switch>
      </Router>
    </React.Fragment>
  );
}

export default App;
