<?php
include_once("conf.php");
include_once("models/members_model.php");
include_once("views/members_view.php");

class MembersController
{
  private $member;

  function __construct()
  {
    $this->member = new member(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index()
  {
    $this->member->open();
    $this->member->getmember();
    $data = array();
    while ($row = $this->member->getResult()) {
      array_push($data, $row);
    }

    $this->member->close();

    $view = new membersView();
    $view->render($data);
  }


  function add($data)
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this->member->open();
      $this->member->add($data);
      $this->member->close();
      header("location:index.php");
    } else {
      $view = new MembersView();
      $view->renderAddForm();
    }
  }

  function edit($id)
  {
    if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];

      $this->member->open();
      $this->member->update($id, $name, $email, $phone);
      $this->member->close();

      header("location:index.php");
    } else {
      $this->member->open();
      $memberdata = $this->member->edit($id);
      $this->member->close();

      if ($memberdata) {
        $view = new MembersView();
        $view->renderEditForm($memberdata);
      } else {
        header("location:index.php");
      }
    }
  }

  function delete($id)
  {
    $this->member->open();
    $this->member->delete($id);
    $this->member->close();

    header("location:index.php");
  }
}
