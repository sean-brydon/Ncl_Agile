import React, { useState, useEffect } from "react";
import "./movieCard.css";
import {
  Card,
  CardImg,
  CardText,
  CardBody,
  CardSubtitle,
  Button,
} from "reactstrap";
function MovieCard(props) {
  const { data, filter } = props;
  const [filteredData, setfilteredData] = useState({});
  const [isLoading, setisLoading] = useState(true);

  useEffect(() => {
    setisLoading(true);
    if (filter) {
      let array = data.filter((i) => i.genre === filter);
      console.log(array);
      setfilteredData(array);
      setisLoading(false);
    } else {
      setfilteredData(data);
      console.log(data);
      setisLoading(false);
    }
  }, []);
  if (isLoading) return <h1>Loading movies...</h1>;

  return filteredData.map((currentMovie, index) => {
    return (
      <Card key={index}>
        <h3 className="text-center">{currentMovie.movieTitle}</h3>

        <CardImg
          top
          width="100%"
          src={currentMovie.image}
          className="image center"
        />
        <CardBody>
          <CardSubtitle>Genre: {currentMovie.genre}</CardSubtitle>
          <CardText>{currentMovie.description}</CardText>
          <Button color="primary" outline className="mr-3 bottom">
            Age : {currentMovie.ageRating}
          </Button>
          <Button color="primary" outline className="bottom">
            Rating : {currentMovie.movieRating}
          </Button>
        </CardBody>
      </Card>
    );
  });
}

export default MovieCard;
