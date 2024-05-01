<?php

class Members extends DB
{
    function getMembers()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function addMembers($data)
    {
        // Memasukkan data baru ke dalam tabel
        $query = "INSERT INTO members (name, email, phone, join_date, membership_plan_id )
                  VALUES ('$data[name]', '$data[email]', '$data[phone]', '$data[join_date]', $data[membership_plan_id])
                  ";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function updateMembers()
    {
        // Mengupdate data pada tabel berdasarkan ID
        $query = "UPDATE members
                  SET name = '$data[name]',
                      email = '$data[email]',
                      phone = '$data[phone]',
                      join_date = '$data[join_date]',
                      membership_plan_id = $data[membership_plan_id]
                  WHERE members_id = $data[members_id]
        ";
        // Mengeksekusi query
        return $this->execute($query);
    }

    function deleteMembers($id)
    {
         // Menghapus data dari tabel berdasarkan ID
         $query = "DELETE FROM members WHERE members_id = $id";
        // Mengeksekusi query
        return $this->execute($query);
    }

    function statusMembers($id)
    {
        // Mengambil status pembayaran berdasarkan ID
        $query = "SELECT status FROM members WHERE members_id = $id";
        // Mengeksekusi query
        return $this->execute($query);
    }
}
