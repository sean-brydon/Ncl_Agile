import React, { useState, useEffect } from "react";
import Carousel from "./Carousel/Carousel";
import axios from "axios";
function Home() {
  const [isLoading, setIsLoading] = useState(true);
  const [data, setData] = useState(null);

  useEffect(() => {
    setIsLoading(true);
    axios
      .get("http://localhost:5555/movies")
      .then((res) => {
        setData(res.data);
        setIsLoading(false);
      })
      .catch((err) => {
        throw err;
      });
  }, []);

  return (
    <div>
      {isLoading ? <h1>Loading...</h1> : <Carousel data={data}></Carousel>}
    </div>
  );
}

export default Home;
