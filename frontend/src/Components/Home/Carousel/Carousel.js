import React, { useState, useEffect } from "react";
import { UncontrolledCarousel } from "reactstrap";
import "./Carousel.css";
function Carousel(props) {
  const [items, setitems] = useState({});
  const [loading, setLoading] = useState(true);
  // Use effect runs only when something in the second callback is changed in this case [props.data] -> if data changes

  // The carousell will re-render
  useEffect(() => {
    setLoading(true);
    const array = [];

    props.data.forEach((currentItem, index) => {
      if (index >= 2) return;
      array.push({
        src: currentItem.image,
        altText: "#1",
        caption: currentItem.movieTitle,
      });
    });
    setitems(array);
    setLoading(false);
  }, [props.data]);

  return (
    <div className="responsive">
      {loading ? (
        "Loading..."
      ) : (
        <div className="container">
          <UncontrolledCarousel items={items} />
        </div>
      )}
    </div>
  );
}

export default Carousel;
