import React, { useState, useEffect } from "react";
import { UncontrolledCarousel } from "reactstrap";

function Carousel(props) {
  const [items, setitems] = useState({});
  const [loading, setLoading] = useState(true);
  useEffect(() => {
    setLoading(true);
    const array = [];

    props.data.forEach((currentItem, index) => {
      if (index >= 3) return;
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
    <div className="h-50">
      {loading ? (
        "Loading..."
      ) : (
        <UncontrolledCarousel className="carousel" items={items} />
      )}
    </div>
  );
}

export default Carousel;
