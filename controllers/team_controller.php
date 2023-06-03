<?php
include_once("conf.php");
include_once("models/team_model.php");
include_once("views/team_view.php");

class TeamController
{
    private $team;

    function __construct()
    {
        $this->team = new team(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function team()
    {
        $this->team->open();
        $this->team->getTeam();
        $data = array();
        while ($row = $this->team->getResult()) {
            array_push($data, $row);
        }

        $this->team->close();

        $view = new teamView();
        $view->render($data);
    }

    function delete($id)
    {
        $this->team->open();
        $this->team->delete($id);
        $this->team->close();

        header("location:team.php");
    }
}
