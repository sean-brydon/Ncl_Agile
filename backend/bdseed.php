<?php
require 'bootstrap.php';

$statement = <<<EOS
    CREATE TABLE `moviedatabase`.`movies` 
        ( `id` INT NOT NULL AUTO_INCREMENT , 
        `movieTitle` TEXT NOT NULL , 
        `ageRating` INT NOT NULL , 
        `movieRating` FLOAT NOT NULL , 
        `description` TEXT NOT NULL , 
        `image` TEXT NOT NULL , 
        `genre` TEXT NOT NULL ,
         PRIMARY KEY (`id`)) 
     ENGINE = InnoDB;

     INSERT INTO `movies` (`id`, `movieTitle`, `ageRating`, `movieRating`, `description`, `image`, `genre`)
      VALUES 
      ('1', 'Avengers:Endgame', '13', '8.4',
       'After the devastating events of Avengers: Infinity War (2018),
        the universe is in ruins. With the help of remaining allies, 
        the Avengers assemble once more in order to reverse Thanos\' 
        actions and restore balance to the universe.', 
        'https://uhdwallpapers.org/uploads/converted/19/04/21/avengers-endgame-1280x720_898598-mm-90.jpg', 
        'action'), 
        ('2', 'Black Panther', '13', '7.3',
         'T\'Challa, heir to the hidden but advanced kingdom of Wakanda, must step forward to lead his people into a new future and must confront a challenger from his country\'s past.', 
         'https://images.hdqwalls.com/download/black-panther-10k-poster-dl-1280x720.jpg', 
         'action');

EOS;
try {
    $createTable = $dbConnection->exec($statement);
    echo "Success!\n";
} catch (\PDOException $e) {
    exit($e->getMessage());
}
