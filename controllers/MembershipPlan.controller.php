<?php
include_once("conf.php");
include_once("models/MembershipPlan.class.php");
include_once("views/MembershipPlan.view.php");

class MembershipController {
  private $membershipPlan;

  function __construct(){
    $this->membershipPlan = new membershipPlan(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->membershipPlan->open();
    $this->membershipPlan->getMembershipPlan();
    $data = array();
    while($row = $this->membershipPlan->getResult()){
      array_push($data, $row);
    }

    $this->membershipPlan->close();

    $view = new membershipPlanView();
    $view->render($data);
  }

  function add(){
  }

  function edit(){
  }

  function delete(){
  }

}