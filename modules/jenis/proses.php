<?php
session_start();

// Panggil koneksi config.php untuk koneksi database
require_once "../../config/config.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login
if (empty($_SESSION['sias_user_account_name']) && empty($_SESSION['sias_user_account_password'])){
    echo "<meta http-equiv='refresh' content='0; url=../../login-error'>";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    // jika action = insert maka jalankan perintah insert data
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {
            // fungsi untuk membuat id_jenis
            $result = $mysqli->query("SELECT max(id_jenis) as kode FROM jenis")
                                      or die('Ada kesalahan pada query tampil data id_jenis: '.$mysqli->error);
            $data = $result->fetch_assoc();

            $id_jenis   = $data['kode'] + 1;
            // ambil data hasil submit dari form
            $nama_jenis = $mysqli->real_escape_string(trim($_POST['nama_jenis']));

            $created_user  = $_SESSION['sias_userID'];

            // perintah query untuk mengecek nama jenis
            $result = $mysqli->query("SELECT nama_jenis FROM jenis WHERE nama_jenis='$nama_jenis'")
                                      or die('Ada kesalahan pada query tampil data nama jenis: '.$mysqli->error);
            $rows = $result->num_rows;

            // jika nama jenis sudah ada
            if ($rows > 0) {
                // tampilkan pesan gagal simpan data
                header("location: ../../jenis-error1-$nama_jenis");
            }
            // jika nama jenis belum ada
            else {
                // perintah query untuk menyimpan data ke tabel jenis
                $insert = $mysqli->query("INSERT INTO jenis(id_jenis,nama_jenis,created_user)
                                          VALUES('$id_jenis','$nama_jenis','$created_user')")
                                          or die('Ada kesalahan pada query insert : '.$mysqli->error);

                // cek query
                if ($insert) {
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../jenis-success-add");
                }
            }
        }   
    }
    
    // jika action = update maka jalankan perintah update data
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id'])) {
                // ambil data hasil submit dari form
                $id_jenis   = $mysqli->real_escape_string(trim($_POST['id']));
                $nama_jenis = $mysqli->real_escape_string(trim($_POST['nama_jenis']));

                $updated_user  = $_SESSION['sias_userID'];
                $updated_date  = gmdate("Y-m-d H:i:s", time()+60*60*7);

                // perintah query untuk mengubah data pada tabel jenis
                $update = $mysqli->query("UPDATE jenis SET nama_jenis = '$nama_jenis',
                                                              updated_user  = '$updated_user',
                                                              updated_date  = '$updated_date'
                                                        WHERE id_jenis   = '$id_jenis'")
                                          or die('Ada kesalahan pada query update : '.$mysqli->error);

                // cek query
                if ($update) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../jenis-success-update");
                }
            }
        }
    }      
    
    // jika action = delete maka jalankan perintah delete data
    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_jenis = $_GET['id'];

            // perintah query untuk menampilkan data dari tabel jenis
            $result = $mysqli->query("SELECT id_jenis, nama_jenis FROM jenis WHERE id_jenis='$id_jenis'")
                                      or die('Ada kesalahan pada query tampil data jenis: '.$mysqli->error);
            $data = $result->fetch_assoc();

            $nama_jenis = $data['nama_jenis'];
            $deleted_user  = $_SESSION['sias_userID'];
            $action        = "Delete";
            $description   = "<b>Delete</b> data jenis pada tabel <b>jenis</b>. <br> <b>[ID jenis : </b>".$id_jenis."<b>][Nama jenis : </b>".$nama_jenis."<b>]";

            // perintah query untuk menampilkan data jenis dari tabel surat masuk berdasarkan id_jenis
            $query_surat_masuk = $mysqli->query("SELECT asal_surat FROM surat_masuk WHERE asal_surat='$id_jenis'")
                                                 or die('Ada kesalahan pada query tampil data jenis: '.$mysqli->error);
            $rows_surat_masuk = $query_surat_masuk->num_rows;

            // perintah query untuk menampilkan data jenis dari tabel surat keluar berdasarkan id_jenis
            $query_surat_keluar = $mysqli->query("SELECT tujuan_surat FROM surat_keluar WHERE tujuan_surat='$id_jenis'")
                                                  or die('Ada kesalahan pada query tampil data jenis: '.$mysqli->error);
            $rows_surat_keluar = $query_surat_keluar->num_rows;

            // jika data ada
            if ($rows_surat_masuk > 0 || $rows_surat_keluar > 0) {
                // tampilkan pesan gagal hapus data
                header("location: jenis-error2-$id_jenis");
            }
            // jika data tidak ada
            else {
                // perintah query untuk menghapus data pada tabel jenis
                $delete = $mysqli->query("DELETE FROM jenis WHERE id_jenis='$id_jenis'")
                                          or die('Ada kesalahan pada query delete : '.$mysqli->error);

                // cek hasil query
                if ($delete) {
                    // perintah query untuk menyimpan data ke tabel sys_audit_trail
                    $insert = $mysqli->query("INSERT INTO sys_audit_trail(username,action,description)
                                              VALUES('$deleted_user','$action','$description')")
                                              or die('Ada kesalahan pada query insert : '.$mysqli->error);

                    // cek hasil query
                    if ($insert) {
                        // jika berhasil tampilkan pesan berhasil delete data
                        header("location: jenis-success-delete");
                    }
                }
            }
        }
    }    
}       
?>