<?php
session_start();
require '../config/db.php';
require '../config/functions.php';

// Check if the user is logged in
if (!isset($_SESSION['loginadmin'])) {
  header("Location: loginstaff.php");
  exit;
}

if (isset($_POST['btn-kategori'])) {
  $students = cari($_POST["category"]);
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Absensi Siswa SMK Analis Kimia Nusa </title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="h-screen font-sans text-white bg-red-900">

  <div class="flex h-full">
    <!-- Sidebar -->
    <div class="flex flex-col w-1/4 p-4 bg-red-800">
      <!-- Logo dan Judul -->
      <div class="flex items-center mb-8">
        <img src="img/WhatsApp_Image_2024-09-20_at_09.08.49_4a0e336d-removebg-preview (1).png"
          alt="School Logo" width="50" height="50" class="mr-2" />
        <span class="text-xl font-bold">Navigation Admin</span>
      </div>

      <!-- Navigasi Sidebar -->
      <nav class="flex-grow">
        <ul>
          <li class="mb-4">
            <a href="Data Absen" class="block px-4 py-2 bg-red-700 rounded">Data Absen</a>
          </li>
          <li class="mb-4">
            <a href="input_absen.php" class="block px-4 py-2 bg-red-700 rounded">Input Absen</a>
          </li>
          <li class="mb-4">
            <a href="register_siswa.php" class="block px-4 py-2 bg-red-700 rounded">daftarkan siswa</a>
          </li>
          <li class="mb-4">
            <a href="register_siswa.php" class="block px-4 py-2 bg-red-700 rounded">daftarkan admin</a>
          </li>
          <li class="mb-4">
            <a href="logout.php" class="block px-4 py-2 bg-red-700 rounded">Log Out</a>
          </li>
        </ul>
      </nav>
    </div>

    <!-- Konten Utama -->
    <div class="flex flex-col w-3/4 p-8">
      <h1 class="mb-4 text-2xl font-bold">Absensi Siswa SMK Analis Kimia Nusa Bangsa</h1>

      <div class="flex-grow p-4 bg-red-700 rounded">
        <h2 class="mb-4 text-xl font-bold">History Absensi</h2>
        <form action="" method="post" class="font-mono text-red-700">
          <select name="category" id="category" class="p-2 border-2 border-red-500 rounded-lg ">
            <option value="" selected>Pilih Kelas</option>
            <option value="10-PPLG">10 PPLG</option>
            <option value="10-AK">10 PPLG</option>
            <option value="10-FARMASI">10 PPLG</option>
            <option value="11-PPLG">11 PPLG</option>
            <option value="11-AK">11 AK</option>
            <option value="11-FARMASI">11 FARMASI</option>
            <option value="12-PPLG">12 PPLG</option>
            <option value="12-AK">12 AK</option>
            <option value="12-FARMASI">12 FARMASI</option>
          </select>
          <button type="submit" name="btn-kategori" class="p-1 text-xs bg-white border-2 border-red-500 rounded-lg ">cari kelas</button>
        </form>
        <!-- Tabel Absensi -->
        <table class="w-full text-left">
          <thead>
            <tr>
              <th class="px-4 py-2">No </th>
              <th class="px-4 py-2">Nama</th>
              <th class="px-4 py-2">Kelas</th>
              <th class="px-4 py-2">Date</th>
              <th class="px-4 py-2">Status</th>
            </tr>
          </thead>
          <tbody>
            <!-- show data -->
            <?php
            $no = 1;
            foreach ($students as $student) : ?>
              <tr class="bg-red-600">
                <td class="px-4 py-2"><?= $no ?></td>
                <td class="px-4 py-2"><?= $student['namaSiswa'] ?></td>
                <td class="px-4 py-2"><?= $student['kelas'] ?></td>
                <td class="px-4 py-2"><?= $student['time'] ?></td>
                <td class="px-4 py-2"><?= $student['statusAbsen'] ?></td>
              </tr>
            <?php
              $no++;
            endforeach; ?>
          </tbody>
          <!-- end show data -->
        </table>
      </div>
    </div>
  </div>

</html>