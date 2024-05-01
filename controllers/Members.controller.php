<?php
include_once("conf.php");
include_once("models/Members.class.php");
include_once("models/MembershipPlan.class.php");
include_once("views/Members.view.php");

class MembersController {
  private $membership;
  private $membershipPlan;

  function __construct(){
    $this->members = new Members(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->membershipPlan = new MembershipPlan(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->members->open();
    $this->membershipPlan->open();
    $this->members->getMembers();
    $this->membershipPlan->getmembershipPlan();
    
    $data = array(
      'members' => array(),
      'membershipPlan' => array()
    );
    while($row = $this->members->getResult()){

      array_push($data['members'], $row);
    }
    while($row = $this->membershipPlan->getResult()){
      array_push($data['membershipPlan'], $row);
    }
    $this->members->close();
    $this->membershipPlan->close();

    $view = new MembersView();
    $view->render($data);
  }

  function add(){
    
  }

  function edit(){
    
  }

  function delete(){
    
  }

}