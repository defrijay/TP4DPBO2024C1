<?php
include_once("conf.php");
include_once("models/Payments.class.php");
include_once("models/Members.class.php");
include_once("views/Payments.view.php");

class PaymentsController {
  private $payments;
  private $members;

  function __construct(){
    $this->payments = new Payments(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->members = new Members(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->payments->open();
    $this->members->open();
    $this->payments->getPayments();
    $this->members->getMembers();
    
    $data = array(
      'payments' => array(),
      'members' => array()
    );
    while($row = $this->payments->getResult()){

      array_push($data['payments'], $row);
    }
    while($row = $this->members->getResult()){
      array_push($data['members'], $row);
    }
    $this->payments->close();
    $this->members->close();

    $view = new PaymentsView();
    $view->render($data);
  }

  function add(){
    
  }

  function edit(){
    
  }

  function delete(){
    
  }

}