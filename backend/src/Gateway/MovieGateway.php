<?php

namespace Src\Gateway;

class MovieGateway
{
    private $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // SQL for selecting all movies
    public function findAll()
    {
        $sqlQuery = "
            SELECT id,movieTitle,ageRating,movieRating,description,image,genre FROM movies;
        ";
        try {
            $sqlQuery = $this->db->query($sqlQuery);
            $result = $sqlQuery->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    // TODO: Allow admin to insert users
    public function insert(array $input)
    {
        $statement = "
            INSERT INTO movies 
                (movieTitle,ageRating,movieRating,description,image,genre)
            VALUES
                (:movieTitle, :ageRating, :movieRating, :description,:image,:genre);
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'movieTitle' => $input['movieTitle'],
                'ageRating' => $input['ageRating'],
                'movieRating' => $input['movieRating'],
                'description' => $input['description'],
                'image' => $input['image'],
                'genre' => $input['genre'],
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
}
