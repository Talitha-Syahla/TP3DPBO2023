<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Grup.php');
include('classes/Member.php');
include('classes/Company.php');
include('classes/Template.php');

$view = new Template('templates/skinadd.html');

$company = new Company($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$grup = new Grup($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$member = new Member($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

$company->open();
$grup->open();
$member->open();

$grup->getGrup();
$member->getMember();

$gruppp = [];
while ($gr = $grup->getResult()) {
    $gruppp[] = $gr;
}

$memb = [];
while ($mem = $member->getResult()) {
    $memb[] = $mem;
}

$dataGrup = "";
$dataMember = "";
$dataUpdate = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        if (isset($_POST['submit'])) {
            if ($company->updateCompany($id, $_POST, $_FILES) > 0) {
                echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'company.php';
            </script>";
            } else {
                echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'company.php';
            </script>";
            }
        }

        $company->getCompanyById($id);
        $row = $company->getResult();

        $dataUpdate = $row['naungan'];

        $btn = 'Simpan';
        $title = 'Ubah';

    }
}
else if(isset($_POST['submit'])){
    if ($company->addCompany($_POST, $_FILES) > 0) {
        echo "<script>
            alert('Data berhasil ditambah!');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal ditambah!');
            document.location.href = 'index.php';
        </script>";
    }
}

$title = 'Tambah';
foreach ($gruppp as $gr) {
    $dataGrup .= '<option value="' . $gr['id_grup'] . '">' . $gr['nama_grup'] . '</option>';
}

foreach ($memb as $mem) {
    $dataMember .= '<option value="' . $mem['id_member'] . '">' . $mem['name_member'] . '</option>';
}

$company->close();
$grup->close();
$member->close();

$view = new Template('templates/skinadd.html');

$mainTitle = 'Naungan';

$view->replace('DATA_MAIN_TITLE', $mainTitle);
$view->replace('DATA_TITLE', $title);
$view->replace('DATA_GRUP', $dataGrup);
$view->replace('DATA_MEMBER', $dataMember);
$view->replace('DATA_VAL_UPDATE', $dataUpdate);
$view->write();