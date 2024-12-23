<?php
// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['sias_user_account_name']) && empty($_SESSION['sias_user_account_password'])){
	echo "<meta http-equiv='refresh' content='0; url=login-error'>";
}
// jika user sudah login, maka jalankan perintah untuk pemanggilan file halaman konten
else {
	// jika halaman konten yang dipilih beranda, panggil file view beranda
	if ($_GET['module']=='beranda') {
		include "modules/beranda/view.php";
	}
	// ---------------------------------------------------------------------------------

	// jika halaman konten yang dipilih surat masuk, panggil file view surat masuk
	elseif ($_GET['module']=='surat_masuk') {
		include "modules/surat-masuk/view.php";
	}

	// jika halaman konten yang dipilih form surat masuk, panggil file form surat masuk
	elseif ($_GET['module']=='form_surat_masuk') {
		include "modules/surat-masuk/form.php";
	}
	// ---------------------------------------------------------------------------------

	// jika halaman konten yang dipilih surat keluar, panggil file view surat keluar
	elseif ($_GET['module']=='surat_keluar') {
		include "modules/surat-keluar/view.php";
	}

	// jika halaman konten yang dipilih form surat keluar, panggil file form surat keluar
	elseif ($_GET['module']=='form_surat_keluar') {
		include "modules/surat-keluar/form.php";
	}
	// ---------------------------------------------------------------------------------

	// jika halaman konten yang dipilih rekapitulasi, panggil file view rekapitulasi
	elseif ($_GET['module']=='rekapitulasi') {
		include "modules/rekapitulasi/view.php";
	}
	// ---------------------------------------------------------------------------------

	// jika halaman konten yang dipilih instansi, panggil file view instansi
	elseif ($_GET['module']=='instansi' && $_SESSION['sias_user_permissions']=='Administrator') {
		include "modules/instansi/view.php";
	}

	// jika halaman konten yang dipilih form instansi, panggil file form instansi
	elseif ($_GET['module']=='form_instansi' && $_SESSION['sias_user_permissions']=='Administrator') {
		include "modules/instansi/form.php";
	}
	// ---------------------------------------------------------------------------------

		// jika halaman konten yang dipilih jenis, panggil file view jenis
	elseif ($_GET['module']=='jenis' && $_SESSION['sias_user_permissions']=='Administrator') {
		include "modules/jenis/view.php";
	}

	// jika halaman konten yang dipilih form jenis, panggil file form jenis
	elseif ($_GET['module']=='form_jenis' && $_SESSION['sias_user_permissions']=='Administrator') {
		include "modules/jenis/form.php";
	}
	// ---------------------------------------------------------------------------------

	// jika halaman konten yang dipilih konfigurasi aplikasi, panggil file view konfigurasi aplikasi
	elseif ($_GET['module']=='config' && $_SESSION['sias_user_permissions']=='Administrator') {
		include "modules/konfigurasi/view.php";
	}
	// ---------------------------------------------------------------------------------
	
	// jika halaman konten yang dipilih manajemen user, panggil file view manajemen user
	elseif ($_GET['module']=='user' && $_SESSION['sias_user_permissions']=='Administrator') {
		include "modules/user/view.php";
	}

	// jika halaman konten yang dipilih form manajemen user, panggil file form manajemen user
	elseif ($_GET['module']=='form_user' && $_SESSION['sias_user_permissions']=='Administrator') {
		include "modules/user/form.php";
	}
	// ---------------------------------------------------------------------------------

	// jika halaman konten yang dipilih backup database, panggil file view backup database
	elseif ($_GET['module']=='backup' && $_SESSION['sias_user_permissions']=='Administrator') {
		include "modules/backup-database/view.php";
	}
	// ---------------------------------------------------------------------------------

	// jika halaman konten yang dipilih audit trail, panggil file view audit trail
	elseif ($_GET['module']=='audit_trail' && $_SESSION['sias_user_permissions']=='Administrator') {
		include "modules/audit-trail/view.php";
	}
	// ---------------------------------------------------------------------------------

	// jika halaman konten yang dipilih password, panggil file view password
	elseif ($_GET['module']=='password') {
		include "modules/password/view.php";
	}
	// ---------------------------------------------------------------------------------
}
?>