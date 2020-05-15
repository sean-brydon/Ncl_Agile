import React, { useState, useEffect } from "react";
import Carousel from "./Carousel/Carousel";
import axios from "axios";
import Tabs from "../GenreSelection/Tabs";
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
      {isLoading ? "" : <Tabs data={data} />}
    </div>
  );
}

export default Home;
