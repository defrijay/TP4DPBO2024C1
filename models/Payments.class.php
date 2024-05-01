<?php

class Payments extends DB
{
    function getPayments()
    {
        $query = "SELECT * FROM payments";
        return $this->execute($query);
    }

    function addPayments($data)
    {
        // Memasukkan data baru ke dalam tabel
        $query = "INSERT INTO payments (member_id, payment_date, amount, payment_method) 
                  VALUES ($data[member_id], '$data[payment_date]', $data[amount], '$data[payment_method]')";
        // Mengeksekusi query
        return $this->execute($query);
    }

    function updatePayments($data)
    {
        // Mengupdate data pada tabel berdasarkan ID
        $query = "UPDATE payments 
                  SET member_id = $data[member_id], payment_date = '$data[payment_date]', 
                      amount = $data[amount], payment_method = '$data[payment_method]'
                  WHERE payment_id = $data[payment_id]";
        // Mengeksekusi query
        return $this->execute($query);
    }

    function deletePayments($id)
    {
        // Menghapus data dari tabel berdasarkan ID
        $query = "DELETE FROM payments WHERE payment_id = $id";
        // Mengeksekusi query
        return $this->execute($query);
    }

    function statusPayments($id)
    {
        // Mengambil status pembayaran berdasarkan ID
        $query = "SELECT status FROM payments WHERE payment_id = $id";
        // Mengeksekusi query
        return $this->execute($query);
    }
}
