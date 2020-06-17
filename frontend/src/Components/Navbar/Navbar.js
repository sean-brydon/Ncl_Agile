import React, { useState } from "react";
import {
  Collapse,
  Navbar,
  NavbarToggler,
  NavbarBrand,
  Nav,
  NavItem,
  NavLink,
  NavbarText,
} from "reactstrap";

function NavBar() {
  const [isOpen, setIsOpen] = useState(false);
  //Toggles if the navbar is open or not (used with in xs-sm-md resolutions)
  const toggle = () => setIsOpen(!isOpen);
  return (
    <Navbar color="light" light expand="md">
      <NavbarBrand href="/">Filmtastic</NavbarBrand>
      <NavbarToggler onClick={toggle} />
      <Collapse isOpen={isOpen} navbar>
        <Nav className="mr-auto" navbar>
          <NavItem>
            <NavLink href="/Home/">Home</NavLink>
          </NavItem>
          <NavItem>
            <NavLink href="https://github.com/sean-brydon/Ncl_Agile">
              GitHub
            </NavLink>
          </NavItem>
        </Nav>
        <NavbarText>Agile Project</NavbarText>
      </Collapse>
    </Navbar>
  );
}

export default NavBar;
