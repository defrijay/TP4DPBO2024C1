<?php
  class MembershipPlanView{
    public function render($data){
      $no = 1;
      $membershipPlan = null;
      foreach($data as $val){
        list($id, $nama, $status) = $val;
        if ($status == 'Senior') {
          $membershipPlan .= "<tr>
                  <td>" . $no++ . "</td>
                  <td>" . $nama . "</td>
                  <td>" . $status . "</td>
                  <td>
                  <a href='MembershipPlan.php?id_hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
                  </td>
                  </tr>";
        } else {
            $membershipPlan .= "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . $nama . "</td>
                    <td>" . $status . "</td>
                    <td>
                    <a href='MembershipPlan.php?id_edit=" . $id .  "' class='btn btn-warning''>Edit</a>
                    <a href='MembershipPlan.php?id_hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
                    </td>
                    </tr>";
        }
      }

      $tpl = new Template("templates/MembershipPlan.html");
      $tpl->replace("DATA_TABEL", $membershipPlan);
      $tpl->write();
    }
  }