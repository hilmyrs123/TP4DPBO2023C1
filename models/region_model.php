<?php

class Region extends DB
{
    function getRegion()
    {
        $query = "SELECT * FROM region";
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM region WHERE region_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
