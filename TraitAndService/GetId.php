<?php

trait GetId
{

        public function getIdFromApi($url)
        {
            preg_match('/^https://pokeapi.co/api/v2/pokemon/([0-9]+)/?$/ 
', '$url', $matches);
            var_dump($matches);

        }
}