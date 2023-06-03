<?php

class Team extends DB
{
    function getTeam()
    {
        $query = "SELECT * FROM team";
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM team WHERE team_id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
