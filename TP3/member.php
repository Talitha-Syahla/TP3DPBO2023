<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Member.php');
include('classes/Template.php');

$view = new Template('templates/skintabel.html');
$member = new Member($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

$member->open();
$member->getMember();

// cari member
if (isset($_GET['cari'])) {
    $member->searchMember($_GET['cari']);
}
else {
    $member->getMember();
}

$mainTitle = 'Member';
$header = '<tr>
<th scope="row">No.</th>
<th scope="row">Nama Member</th>
<th scope="row">Action</th>
</tr>';
$data = null;
$no = 1;
$formLabel = 'member';
$dataUpdate = "";


while ($mem = $member->getResult()) {
    $data .= '<tr>
    <th scope="row">' . $no . '</th>
    <td>' . $mem['name_member'] . '</td>
    <td style="font-size: 22px;">
        <a href="member.php?id=' . $mem['id_member'] . '" title="Edit Data"><i class="bi bi-pencil-square text-warning"></i></a>&nbsp;<a href="member.php?hapus=' . $mem['id_member'] . '" title="Delete Data"><i class="bi bi-trash-fill text-danger"></i></a>
        </td>
    </tr>';
    $no++;
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        if (isset($_POST['submit'])) {
            
            if ($member->updateMember($id, $_POST, $_FILES) > 0) {
                echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'member.php';
            </script>";
            } else {
                echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'member.php';
            </script>";
            }
        }

        $member->getMemberById($id);
        $row = $member->getResult();

        $dataUpdate = $row['name_member'];

        $btn = 'Simpan';
        $title = 'Ubah';

        
    }
}
else if (isset($_POST['submit'])) {
    if ($member->addMember($_POST, $_FILES) > 0) {
        echo "<script>
            alert('Data berhasil ditambah!');
            document.location.href = 'member.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal ditambah!');
            document.location.href = 'member.php';
        </script>";
    }
}

if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    if($id > 0){
        if($member->deleteMember($id) > 0){
            echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = 'member.php';
            </script>";
        }
        else{
            echo "<script>
                alert('Data gagal dihapus!');
                document.location.href = 'member.php';
            </script>";
        }
    }
}

$title = 'Tambah';
$member->close();

$view = new Template('templates/skintabel.html');
$view->replace('DATA_VAL_UPDATE', $dataUpdate);
$view->replace('DATA_TABEL_HEADER', $header);
$view->replace('DATA_TABEL', $data);
$view->replace('DATA_MAIN_TITLE', $mainTitle);
$view->replace('DATA_TITLE', $title);
$view->write();