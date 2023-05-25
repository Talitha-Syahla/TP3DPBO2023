<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Grup.php');
include('classes/Member.php');
include('classes/Company.php');
include('classes/Template.php');

$company = new company($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$company->open();

$data = nulL;

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        $company->getCompanyById($id);
        $row = $company->getResult();

        $data .= '<div class="card-header text-center">
        <h3 class="my-0">Detail ' . $row['naungan'] . '</h3>
        </div>
        <div class="card-body text-end">
            <div class="row mb-5">
                <div class="col-3">
                    <div class="row justify-content-center">
                        <img src="assets/images/' . $row['foto'] . '" class="img-thumbnail" alt="' . $row['foto'] . '" width="60">
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="card px-3">
                            <table border="0" class="text-start">
                                <tr>
                                    <td>Nama Naungan</td>
                                    <td>:</td>
                                    <td>' . $row['naungan'] . '</td>
                                </tr>
                                <tr>
                                    <td>Nama Grup</td>
                                    <td>:</td>
                                    <td>' . $row['nama_grup'] . '</td>
                                </tr>
                                <tr>
                                    <td>Nama Member</td>
                                    <td>:</td>
                                    <td>' . $row['name_member'] . '</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="company.php?id='.$row['id_company'].'"><button type="button" class="btn btn-success text-white">Edit Data</button></a>
                <a href="?delete='.$row['id_company'].'"><button type="button" class="btn btn-danger">Hapus Data</button></a>
            </div>';
    }
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    if($id > 0){
        if($company->deleteCompany($id) > 0){
            echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = 'index.php';
            </script>";
        }
        else{
            echo "<script>
                alert('Data gagal dihapus!');
                document.location.href = '?id=".$id."';
            </script>";
        }
    }
}

$company->close();
$detail = new Template('templates/skindetail.html');
$detail->replace('DATA_DETAIL_COMPANY', $data);
$detail->write();
