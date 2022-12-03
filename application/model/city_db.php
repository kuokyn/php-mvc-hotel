<?php
function select_city_by_name($city)
{
    global $db;
    $query = "SELECT * FROM city WHERE city='" . $city . "'";
    $result = mysqli_query($db, $query);
    return $result;
}

function insert_city($city, $countrycode, $district, $population)
{
    global $db;
    $query = "INSERT INTO city (ID, city,countrycode,district,population) 
                  VALUES (1, '$city','$countrycode','$district',$population)";
    $statement = $db->prepare($query);
    if ($statement->execute()) {
        $count = $statement->num_rows();
    }
    return $count;
}

function update_city($id, $city, $countrycode, $district, $population)
{
    global $db;
    $query = "UPDATE city 
                SET city='$city', countrycode = '$countrycode', district = '$district', 
                    population = '$population' WHERE ID = $id";

    $statement = $db->prepare($query);
    $statement->execute();
    return $statement->affected_rows;
}

function delete_city($id) {

    global $db;
    $query = "DELETE FROM city WHERE ID =". $id;
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement->affected_rows;
}
