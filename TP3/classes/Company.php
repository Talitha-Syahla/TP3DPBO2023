<?php

class Company extends DB
{
    function getCompanyJoin()
    {
        $query = "SELECT * FROM company JOIN grup ON company.id_grup=grup.id_grup JOIN member ON company.id_member=member.id_member ORDER BY company.id_company";

        return $this->execute($query);
    }

    function getCompany()
    {
        $query = "SELECT * FROM company";
        return $this->execute($query);
    }

    function getCompanyById($id)
    {
        $query = "SELECT * FROM company JOIN grup ON company.id_grup=grup.id_grup JOIN member ON company.id_member=member.id_member WHERE id_company=$id";
        return $this->execute($query);
    }

    function searchCompany($keyword)
    {
        $query = "SELECT * FROM company JOIN grup ON company.id_grup=grup.id_grup JOIN member ON company.id_member=member.id_member WHERE naungan LIKE '%".$keyword."%' OR nama_grup LIKE '%".$keyword."%' OR name_member LIKE '%".$keyword."%'";
        return $this->execute($query);
    }

    function filterNaungan(){
        $query = "SELECT * FROM company JOIN grup ON company.id_grup=grup.id_grup JOIN member ON company.id_member=member.id_member ORDER BY company.naungan";
        return $this->execute($query);
    }

    function filterGrup(){
        $query = "SELECT * FROM company JOIN grup ON company.id_grup=grup.id_grup JOIN member ON company.id_member=member.id_member ORDER BY grup.nama_grup";
        return $this->execute($query);
    }

    function filterMember(){
        $query = "SELECT * FROM company JOIN grup ON company.id_grup=grup.id_grup JOIN member ON company.id_member=member.id_member ORDER BY member.name_member";
        return $this->execute($query);
    }

    function addCompany($data, $file)
    {

        $blank = $file['foto']['tmp_name'];
        $foto_comp = $file['foto']['name'];
        
        $direct = "assets/images/$foto_comp";
        move_uploaded_file($blank, $direct);

        $naungan = $data['naungan'];
        $id_grup = $data['grup'];
        $id_member = $data['member'];

        $query = "INSERT INTO company VALUES('','$foto_comp', '$naungan' , '$id_grup', '$id_member')";
        return $this->executeAffected($query);
    }

    function updateCompany($id, $data, $file)
    {
        $blank = $file['foto']['tmp_name'];
        $foto_comp = $file['foto']['name'];
        
        $direct = "assets/images/$foto_comp";
        move_uploaded_file($blank, $direct);

        $naungan = $data['naungan'];
        $id_grup = $data['grup'];
        $id_member = $data['member'];

        $query = "UPDATE company SET foto = '$foto_comp',
            naungan = '$naungan',
            id_grup = '$id_grup',
            id_member = '$id_member'
            WHERE id_company = $id";

        return $this->executeAffected($query);
    }

    function deleteCompany($id)
    {
        $query = "DELETE FROM company WHERE id_company = $id";
        return $this->executeAffected($query);
    }
}
