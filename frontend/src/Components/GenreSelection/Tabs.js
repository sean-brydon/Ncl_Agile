import React, { useState } from "react";
import { TabContent, TabPane, Nav, NavItem, NavLink } from "reactstrap";
import classnames from "classnames";
import "../MovieCards/movieCard.css";

import MovieCard from "../MovieCards/MovieCard";

const Tabs = (props) => {
  const [activeTab, setActiveTab] = useState("1");

  const toggle = (tab) => {
    if (activeTab !== tab) setActiveTab(tab);
  };

  return (
    <div>
      <Nav tabs>
        <NavItem>
          <NavLink
            className={classnames({ active: activeTab === "1" })}
            onClick={() => {
              toggle("1");
            }}
          >
            All
          </NavLink>
        </NavItem>
        <NavItem>
          <NavLink
            className={classnames({ active: activeTab === "2" })}
            onClick={() => {
              toggle("2");
            }}
          >
            Action
          </NavLink>
        </NavItem>
        <NavItem>
          <NavLink
            className={classnames({ active: activeTab === "3" })}
            onClick={() => {
              toggle("3");
            }}
          >
            Aventure
          </NavLink>
        </NavItem>
        <NavItem>
          <NavLink
            className={classnames({ active: activeTab === "4" })}
            onClick={() => {
              toggle("4");
            }}
          >
            Crime
          </NavLink>
        </NavItem>
        <NavItem>
          <NavLink
            className={classnames({ active: activeTab === "5" })}
            onClick={() => {
              toggle("5");
            }}
          >
            Drama
          </NavLink>
        </NavItem>
        <NavItem>
          <NavLink
            className={classnames({ active: activeTab === "6" })}
            onClick={() => {
              toggle("6");
            }}
          >
            Fantasy
          </NavLink>
        </NavItem>
        <NavItem>
          <NavLink
            className={classnames({ active: activeTab === "7" })}
            onClick={() => {
              toggle("7");
            }}
          >
            Horror
          </NavLink>
        </NavItem>
      </Nav>
      <TabContent activeTab={activeTab} className="mt-3 container">
        <TabPane tabId="1">
          <div className="cards">
            <MovieCard data={props.data} />
          </div>
        </TabPane>
        <TabPane tabId="2">
          <div className="cards">
            <MovieCard data={props.data} filter="action" />
          </div>
        </TabPane>
        <TabPane tabId="3">
          <div className="cards">
            <MovieCard data={props.data} filter="adventure" />
          </div>
        </TabPane>
        <TabPane tabId="4">
          <div className="cards">
            <MovieCard data={props.data} filter="crime" />
          </div>
        </TabPane>
        <TabPane tabId="5">
          <div className="cards">
            <MovieCard data={props.data} filter="drama" />
          </div>
        </TabPane>
        <TabPane tabId="6">
          <div className="cards">
            <MovieCard data={props.data} filter="fantasy" />
          </div>
        </TabPane>
        <TabPane tabId="7">
          <div className="cards">
            <MovieCard data={props.data} filter="horror" />
          </div>
        </TabPane>
      </TabContent>
    </div>
  );
};

export default Tabs;
