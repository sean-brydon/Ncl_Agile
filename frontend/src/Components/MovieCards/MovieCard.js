import React from "react";
import "./movieCard.css";
function MovieCard(props) {
  const { data } = props;
  console.log(data);

  return (
    <div>
      <div className="row">
        <div className="col-xs-1-12">
          <div className="card">
            <img
              className="card-img-top image"
              src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJKLiEyyz1Q9RC8EBYl3ijr3nuGeyO2ETmwy6Kdq0AQtD0elWD"
              width="100"
              alt=""
            />
            <div className="card-body">
              <h3 className="card-title">Joker</h3>
              <p className="card-text">Text</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

export default MovieCard;
