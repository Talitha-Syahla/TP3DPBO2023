<?php

class Member extends DB
{
    function getMember()
    {
        $query = "SELECT * FROM member";
        return $this->execute($query);
    }

    function getMemberById($id)
    {
        $query = "SELECT * FROM member WHERE id_member=$id";
        return $this->execute($query);
    }

    function searchMember($keyword)
    {
        $query = "SELECT * FROM member WHERE name_member LIKE '%$keyword%'";
        return $this->execute($query);
    }

    function addMember($data)
    {
        $nama = $data['nama'];
        $query = "INSERT INTO member VALUES('', '$nama')";
        return $this->executeAffected($query);
    }

    function updateMember($id, $data)
    {
        $nama = $data['nama'];
        $query = "UPDATE member SET name_member = '$nama' WHERE id_member = $id";
        return $this->executeAffected($query);
    }

    function deleteMember($id)
    {
        $del = "DELETE FROM company WHERE id_member = $id";
        $this->executeAffected($del);
        $query = "DELETE FROM member WHERE id_member=$id";
        return $this->executeAffected($query);
    }
}
