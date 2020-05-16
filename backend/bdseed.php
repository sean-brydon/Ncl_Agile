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

     INSERT INTO
     `movies` (
       `id`,
       `movieTitle`,
       `ageRating`,
       `movieRating`,
       `description`,
       `image`,
       `genre`
     )
   VALUES
     (
       '1',
       'Avengers:Endgame',
       '13',
       '8.4',
       'After the devastating events of Avengers: Infinity War (2018),
           the universe is in ruins. With the help of remaining allies, 
           the Avengers assemble once more in order to reverse Thanos\' 
           actions and restore balance to the universe.',
       'https://uhdwallpapers.org/uploads/converted/19/04/21/avengers-endgame-1280x720_898598-mm-90.jpg',
       'action'
     ),
     (
       '2',
       'Black Panther',
       '13',
       '7.3',
       'T\'Challa, heir to the hidden but advanced kingdom of Wakanda, must step forward to lead his people into a new future and must confront a challenger from his country\'s past.',
       'https://images.hdqwalls.com/download/black-panther-10k-poster-dl-1280x720.jpg',
       'action'
     ),
     (
       '3',
       'Joker',
       '13',
       '8.5',
       'In Gotham City, mentally troubled comedian Arthur Fleck is disregarded and mistreated by society. He then embarks on a downward spiral of revolution and bloody crime. This path brings him face-to-face with his alter-ego: the Joker.',
       'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJKLiEyyz1Q9RC8EBYl3ijr3nuGeyO2ETmwy6Kdq0AQtD0elWD',
       'action'
     ),
     (
       '4',
       'Warcraft',
       '13',
       '6.8',
       'As an Orc horde invades the planet Azeroth using a magic portal, a few human heroes and dissenting Orcs must attempt to stop the true evil behind this war.',
       'https://media.vanityfair.com/photos/5759c5621e43ab7160f25bcb/master/w_2560%2Cc_limit/warcraft-movie-review.jpg',
       'fantasy'
     ),
     (
       '5',
       'IT',
       '15',
       '6.6',
       'Twenty-seven years after their first encounter with the terrifying Pennywise, the Losers Club have grown up and moved away, until a devastating phone call brings them back.',
       'https://lh3.googleusercontent.com/proxy/FiGnfOLR3xP4k4Yn_6IFAGgw7KS-kemZWsFhXEnKdSLQFbhVq9pN6Yhc9x8cvq8esMFLDYNmm_H8QIAPnECF0LQKyHt5sBz0LMagBAxqtTCUUyxUePTsA13KK32koqjyL8BkzQ',
       'horror'
     ),
     (
       '6',
       'Jumanji: The Next Level',
       '13',
       '6.7',
       'In Jumanji: The Next Level, the gang is back but the game has changed. As they return to rescue one of their own, the players will have to brave parts unknown from arid deserts to snowy mountains, to escape the world\'s most dangerous game.',
       'https://i0.wp.com/attackongeek.com/wp-content/uploads/2019/12/Jumanji-The-Next-Level.jpeg?fit=1125%2C750&ssl=1&resize=1280%2C720',
       'aventure'
     ),
     (
       '7',
       'Sicario',
       '13',
       '7.6',
       'An idealistic FBI agent is enlisted by a government task force to aid in the escalating war against drugs at the border area between the U.S. and Mexico.',
       'https://images.hdqwalls.com/download/sicario-day-of-the-soldado-4k-5k-ew-1280x720.jpg',
       'crime'
     ),
     (
       '8',
       'Little Women',
       '13',
       '7.9',
       'Jo March reflects back and forth on her life, telling the beloved story of the March sisters - four young women, each determined to live life on her own terms.',
       'https://www.thegryphon.co.uk/wp-content/uploads/2020/01/little-women-1280-1574203329782.jpg',
       'drama'
     ),
     (
       '9',
       'Harry Potter and the Prisoner of Azkaban',
       '13',
       '7.9',
       'Harry Potter, Ron and Hermione return to Hogwarts School of Witchcraft and Wizardry for their third year of study, where they delve into the mystery surrounding an escaped prisoner who poses a dangerous threat to the young wizard.',
       'https://weliveentertainment.com/wp-content/uploads/2019/06/Harry-Potter-And-The-Prisoner-Of-Azkaban.jpg',
       'fantasy'
     );
   
        

EOS;
try {
    $createTable = $dbConnection->exec($statement);
    echo "Success!\n";
} catch (\PDOException $e) {
    exit($e->getMessage());
}
