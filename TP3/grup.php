<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Grup.php');
include('classes/Member.php');
include('classes/Company.php');
include('classes/Template.php');

$view = new Template('templates/skintabel.html');
$grup = new Grup($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$grup->open();

// cari grup
if (isset($_GET['cari'])) {
    // methode mencari data grup
    $grup->searchGrup($_GET['cari']);
} 
else {
    // method menampilkan data grup
    $grup->getGrup();
}

$mainTitle = 'Grup';
$header = '<tr>
<th scope="row">No.</th>
<th scope="row">Nama Grup</th>
<th scope="row">Action</th>
</tr>';
$data = null;
$no = 1;
$formLabel = 'grup';
$dataUpdate = "";

while ($gr = $grup->getResult()) {
    $data .= '<tr>
    <th scope="row">' . $no . '</th>
    <td>' . $gr['nama_grup'] . '</td>
    <td style="font-size: 22px;">
        <a href="grup.php?id=' . $gr['id_grup'] . '" title="Edit Data"><i class="bi bi-pencil-square text-warning"></i></a>&nbsp;<a href="grup.php?hapus=' . $gr['id_grup'] . '" title="Delete Data">
        <i class="bi bi-trash-fill text-danger"></i></a>
        </td>
    </tr>';
    $no++;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        if (isset($_POST['submit'])) {
            
            if ($grup->updateGrup($id, $_POST, $_FILES) > 0) {
                echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'grup.php';
            </script>";
            } else {
                echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'grup.php';
            </script>";
            }
        }

        $grup->getGrupById($id);
        $row = $grup->getResult();

        $dataUpdate = $row['nama_grup'];

        $btn = 'Simpan';
        $title = 'Ubah';

        
    }
}
else if (isset($_POST['submit'])) {
    if ($grup->addGrup($_POST, $_FILES) > 0) {
        echo "<script>
            alert('Data berhasil ditambah!');
            document.location.href = 'grup.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal ditambah!');
            document.location.href = 'grup.php';
        </script>";
    }
}

if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    if($id > 0){
        if($grup->deleteGrup($id) > 0){
            echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = 'grup.php';
            </script>";
        }
        else{
            echo "<script>
                alert('Data gagal dihapus!');
                document.location.href = 'grup.php';
            </script>";
        }
    }
}

$title = 'Tambah';
$grup->close();
$view = new Template('templates/skintabel.html');

$view->replace('DATA_VAL_UPDATE', $dataUpdate);
$view->replace('DATA_TABEL_HEADER', $header);
$view->replace('DATA_TABEL', $data);
$view->replace('DATA_MAIN_TITLE', $mainTitle);
$view->replace('DATA_TITLE', $title);
$view->write();