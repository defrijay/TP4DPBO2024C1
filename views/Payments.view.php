<?php
class PaymentsView{
    public function render($data){
        $no = 1;
        $payments = ''; // Buat string kosong untuk menyimpan HTML pembayaran
        $memberId = ''; // Buat string kosong untuk menyimpan opsi anggota
        $paymentMethods = ''; // Buat string kosong untuk menyimpan opsi metode pembayaran

        // Loop melalui pembayaran
        foreach($data['payments'] as $payment){
            list($id, $member_id, $payment_date, $amount, $payment_method) = $payment;
            $payments .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $member_id . "</td>
                <td>" . $payment_date . "</td>
                <td>" . $amount . "</td>
                <td>" . $payment_method . "</td>
                <td>
                    <a href='Payments.php?id_edit=" . $id .  "' class='btn btn-warning m-1'>Edit</a>
                    <a href='Payments.php?id_hapus=" . $id . "' class='btn btn-danger m-1'>Hapus</a>
                </td>
                </tr>"; 
        }

        // Loop melalui opsi anggota
        foreach($data['members'] as $member){
            list($id, $name, $joinDate) = $member;
            $memberId .= "<option value='".$id."'>".$id."</option>";
        }

        // Loop melalui opsi metode pembayaran dari database
        foreach($data['payments'] as $payment){
            list($id, $member_id, $payment_date, $amount, $payment_method) = $payment;
            $paymentMethods .= "<option value='".$payment_method."'>".$payment_method."</option>";
        }

        $tpl = new Template("templates/Payments.html");
        $tpl->replace("DATA_TABEL", $payments); 
        $tpl->replace("OPTION", $memberId); // Ganti OPTION dengan opsi anggota
        $tpl->replace("OPTION_PAYMENTS", $paymentMethods); // Ganti OPTION_PAYMENTS dengan opsi metode pembayaran
        $tpl->write();
    }
}
?>
