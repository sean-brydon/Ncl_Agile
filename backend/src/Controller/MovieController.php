<?php

namespace Src\Controller;

use Src\Gateway\MovieGateway;
// Creates a movie controller class
class MovieController
{

    private $db;
    private $requestMethod;
    private $genre;

    private $movieGateway;
    //Creates a constructor for DB,Requestmethod and the genre of the movie

    public function __construct($db, $requestMethod, $genre)
    {
        $this->db = $db;
        $this->requestMethod = $requestMethod;

        $this->movieGateway = new MovieGateway($db);
    }

    public function processRequest()
    {
        switch ($this->requestMethod) {
            case 'GET':
                //Allows us to get a movie by specific genre(not sure if this is going to be handled this way in the frontend-> Pointless API calls)
                if ($this->genre) {
                    $response = $this->getMovie($this->genre);
                } else {
                    // Returns all movies calls getAllMovies
                    $response = $this->getAllMovies();
                };
                break;
            //WIP Implement in the future
            case 'POST':
                $response = $this->createMovie();
                break;
            case 'PUT':
                $response = $this->updateMovie($this->movieID);
                break;
            case 'DELETE':
                $response = $this->deleteMovie($this->movieID);
                break;
            default:
                $response = $this->notFoundResponse();
                break;
        }

        //Returns the body of the request
        header($response['status_code_header']);
        if ($response['body']) {
            echo $response['body'];
        }
    }

    private function getAllMovies()
    {
        // Cales findAll on the movieGateway class and returns the response
        $result = $this->movieGateway->findAll();
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($result);
        return $response;
    }

    private function getMovie($id)
    {
        $result = $this->movieGateway->find($id);
        if (!$result) {
            return $this->notFoundResponse();
        }
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($result);
        return $response;
    }

    private function createMovie()
    {
        $input = (array) json_decode(file_get_contents('php://input'), TRUE);

        $this->movieGateway->insert($input);
        $response['status_code_header'] = 'HTTP/1.1 201 Created';
        $response['body'] = null;
        return $response;
    }

    private function updateMovie($id)
    {
        $result = $this->movieGateway->find($id);

        $this->movieGateway->update($id, $input);
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = null;
        return $response;
    }

    private function deleteMovie($id)
    {
        $result = $this->movieGateway->find($id);
        if (!$result) {
            return $this->notFoundResponse();
        }
        $this->movieGateway->delete($id);
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = null;
        return $response;
    }


    private function unprocessableEntityResponse()
    {
        $response['status_code_header'] = 'HTTP/1.1 422 Unprocessable Entity';
        $response['body'] = json_encode([
            'error' => 'Invalid input'
        ]);
        return $response;
    }

    //Returns a 404 
    private function notFoundResponse()
    {
        $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
        $response['body'] = null;
        return $response;
    }
}
