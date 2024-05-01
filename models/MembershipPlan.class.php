<?php

class MembershipPlan extends DB
{
    function getMembershipPlan()
    {
        $query = "SELECT * FROM membership_plan";
        return $this->execute($query);
    }

    function addMembershipPlan($data)
    {
        // Memasukkan data baru ke dalam tabel
        $query = "INSERT INTO membership_plan (plan_name, price, duration_months) VALUES ('$data[plan_name]', $data[price], $data[duration_months])";
        // Mengeksekusi query
        return $this->execute($query);
    }

    function updateMembershipPlan($data)
    {
        // Mengupdate data pada tabel berdasarkan ID
        $query = "UPDATE membership_plan SET 
            plan_name       = '$data[plan_name]', 
            price           = $data[price], 
            duration_months = $data[duration_months] 
                WHERE membership_plan_id = $data[membership_plan_id]";
        // Mengeksekusi query
        return $this->execute($query);
    }

    function deleteMembershipPlan($id)
    {
        // Menghapus data dari tabel berdasarkan ID
        $query = "DELETE FROM membership_plan WHERE membership_plan_id = $id";
        // Mengeksekusi query
        return $this->execute($query);
    }

    function statusMembershipPlan($id)
    {
        // Mengambil status membership plan berdasarkan ID
        $query = "SELECT status FROM membership_plan WHERE membership_plan_id = $id";
        // Mengeksekusi query
        return $this->execute($query);
    }
}

