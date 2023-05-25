## Janji
Saya Talitha Syahla NIM 2101330 mengerjakan Soal TP3
dalam mata kuliah Desain Pemrograman Berorientasi Objek untuk keberkahanNya 
maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

# TUGAS PRAKTIKUM 3 DPBO 2023
Buatlah program menggunakan bahasa pemrograman PHP dengan spesifikasi sebagai berikut:

    - Program bebas, kecuali program Ormawa
    - Menggunakan minimal 3 buah tabel
    - Terdapat proses Create, Read, Update, dan Delete data
    - Memiliki fungsi pencarian dan pengurutan data (kata kunci bebas)
    - Menggunakan template/skin form tambah data dan ubah data yang sama
    - 1 tabel pada database ditampilkan dalam bentuk bukan tabel, 2 tabel sisanya ditampilkan dalam bentuk tabel (seperti contoh saat praktikum)
    - Menggunakan template/skin tabel yang sama untuk menampilkan tabel


File README ini berisikan design program, penjelasan alur program, dan dokumentasi saat program dirun/dijalankan.

# Design 

## Design Database

![db_hybe](https://github.com/Talitha-Syahla/TP3DPBO2023/assets/119799623/55392773-11e5-43f7-a58d-3dbe163fbcfd)

Database yang digunakan pada program ini ada 3 tabel, yaitu tabel company, tabel grup, dan tabel member. Database ini memiliki relasi `one to manny`, dimana satu company memiliki banyak grup dan member di dalamnya. Relasi tersebut dihubungkan oleh _foreign key_ pada tabel grup yaitu `id_grup` dan tabel member yaitu `id_member` yang tertuju pada tabel company yaitu `id_company`.  

# Alur Program
1. Saat user pertama kali membuka program ini, halaman yang akan ditampilkan adalah halaman home. Yang mana halaman ini akan menampilkan daftar-daftar naungan yang ada di Company Hybe Labels. Daftar-daftar naungan ini berisikan data-data seperti nama grup yang ada di naungan tersebut dan juga member yang ada terlibat di grup dan naungan tersebut. Bagian navbar terdapat navigasi yang dapat user pilih untuk halaman tambah naungan, halaman grup, dan halaman member. Selain itu terdapat juga navigasi untuk pencarian dan juga terdapat filter yang dapat dipilih user untuk mengurutkan berdasarkan naungan, member, atau grup.

2. Jika user menekan tombol salah satu naungan pada halaman home, maka akan diarahkan pada halaman detail. Pada halaman ini juga terdapat tombol untuk mengubah data film dan menghapus data film yang dipilih.

3. Jika user menekan tombol ubah data pada halaman detail, maka akan diarahkan ke halaman form untuk mengubah data. Form ini sudah terisi dengan data film yang akan diubah, jadi user hanya perlu mengubah data yang ingin diubah saja.

4. Jika user menekan tombol tambah naungan pada halaman home, maka akan diarahkan pada halaman form yang dapat diisi oleh user untuk menambahkan data naungan.

5. Jika user menekan tombol grup pada halaman home, maka akan diarahkan pada halaman yang berisi tabel dengan kumpulan data grup yang tersedia di database, user juga dapat mengubah dan menghapus data grup. Pada halaman ini juga sudah tersedia form untuk menambahkan data grup baru yang terletak di sebelah kanan tabel.

6. Jika user menekan tombol member pada halaman home, maka akan diarahkan pada halaman yang berisi tabel dengan kumpulan data member yang tersedia di database, user juga dapat mengubah dan menghapus data member. Pada halaman ini juga sudah tersedia form untuk menambahkan data member baru yang terletak di sebelah kanan tabel.

# Dokumentasi

    - Halaman Login
![home](https://github.com/Talitha-Syahla/TP3DPBO2023/assets/119799623/3d8dedd2-60ba-45a0-b0e6-2c18397fe937)
    
    - Halaman Detail Naungan
![detail](https://github.com/Talitha-Syahla/TP3DPBO2023/assets/119799623/0f6f2c95-4285-4f1c-8621-5d4530d92d39)
    
    - Halaman Tambah Naungan
![add](https://github.com/Talitha-Syahla/TP3DPBO2023/assets/119799623/2856b486-42ba-4fe7-b312-c7f60e7fb4b9)
    
    - Halaman Grup
![grup](https://github.com/Talitha-Syahla/TP3DPBO2023/assets/119799623/bafe5b10-f50f-4d16-a99d-5e140a820e92)
    
    - Halaman Member
![member](https://github.com/Talitha-Syahla/TP3DPBO2023/assets/119799623/07346f7b-c383-44d3-b00f-d6a92767e7f4)

# Simulasi



