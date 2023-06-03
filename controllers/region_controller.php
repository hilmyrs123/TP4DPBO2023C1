<?php
include_once("conf.php");
include_once("models/region_model.php");
include_once("views/region_view.php");

class RegionController
{
    private $region;

    function __construct()
    {
        $this->region = new Region(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function region()
    {
        $this->region->open();
        $this->region->getregion();
        $data = array();
        while ($row = $this->region->getResult()) {
            array_push($data, $row);
        }

        $this->region->close();

        $view = new regionView();
        $view->render($data);
    }

    function delete($id)
    {
        $this->region->open();
        $this->region->delete($id);
        $this->region->close();

        header("location:region.php");
    }
}
