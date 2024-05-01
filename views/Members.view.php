<?php

  class MembersView {
    public function render($data){
      $no = 1;
      $membersData = null;
      $membershipPlanData = null;
      foreach($data['members'] as $val){
        list($id, $name, $email, $phone, $joinDate, $membershipPlanId) = $val;
        $membersData .= "<tr class = 'text-center'>
                <td>" . $no++ . "</td>
                <td>" . $name . "</td>
                <td>" . $email . "</td>
                <td>" . $phone . "</td>
                <td>" . $joinDate . "</td>
                <td>" . $membershipPlanId . "</td>";
      
            $membersData .= "
                <td>
                  <a href='index.php?id_edit=" . $id .  "' class='btn btn-warning m-1' '>Edit</a>
                  <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger m-1' '>Hapus</a>
                </td>";
     
        $membersData .= "</tr>";
      }

      foreach($data['membershipPlan'] as $val){
        list($id, $nama, $joinDate) = $val;
        $membershipPlanData .= "<option value='".$id."'>".$nama."</option>";
      }

      $tpl = new Template("templates/index.html");

      $tpl->replace("OPTION", $membershipPlanData);
      $tpl->replace("DATA_TABEL", $membersData);
      $tpl->write(); 
    }
  }
?>