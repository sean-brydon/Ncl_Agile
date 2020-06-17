import React, { useState, useEffect } from "react";
import Carousel from "./Carousel/Carousel";
import axios from "axios";
import Tabs from "../GenreSelection/Tabs";
function Home() {
  const [isLoading, setIsLoading] = useState(true);
  const [data, setData] = useState(null);
  // Using axios for a promised base API call
  // Could use fetch however, axios allows the use of promises and is alot easier to check for errors than using callbacks within fetch
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
  // Display movies based on loading status
  return (
    <div>
      {isLoading ? <h1>Loading...</h1> : <Carousel data={data}></Carousel>}
      {isLoading ? "" : <Tabs data={data} />}
    </div>
  );
}

export default Home;
