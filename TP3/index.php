<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Grup.php');
include('classes/Member.php');
include('classes/Company.php');
include('classes/Template.php');

// buat instance company
$listcompany = new company($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// buka koneksi
$listcompany->open();

// cari company
if (isset($_POST['search'])) {
    // methode mencari data company
    $listcompany->searchCompany($_POST['cari']);
} 
else if (isset($_POST['naungan'])){
    $listcompany->filterNaungan();
}
else if (isset($_POST['grup'])){
    $listcompany->filterGrup();
}
else if (isset($_POST['member'])){
    $listcompany->filterMember();
}
else {
    // method menampilkan data pengurus
    $listcompany->getCompanyJoin();
}

$data = null;

// ambil data company
// gabungkan dgn tag html
// untuk di passing ke skin/template
while ($row = $listcompany->getResult()) {
    $data .= '<div class="col gx-2 gy-3 justify-content-center">' .
        '<div class="card pt-4 px-2 company-thumbnail">
        <a href="detail.php?id=' . $row['id_company'] . '">
        <div class="row justify-content-center">
                <img src="assets/images/' . $row['foto'] . '" class="card-img-top" alt="' . $row['foto'] . '">
            </div>
            <div class="card-body">
                <p class="card-text naungan my-0">' . $row['naungan'] . '</p>
                <p class="card-text grup-nama">' . $row['nama_grup'] . '</p>
                <p class="card-text member-nama">' . $row['name_member'] . '</p>
            </div>
        </a>
    </div>    
    </div>';
}

// tutup koneksi
$listcompany->close();

// buat instance template
$home = new Template('templates/skin.html');

// simpan data ke template
$home->replace('DATA_COMPANY', $data);
$home->write();
