<?php
session_start();
require '../config/db.php';  // Include the database connection

// Login process
if (isset($_POST['login'])) {
    $namaSiswa = $_POST['namaSiswa'];
    $nis = $_POST['nis'];
    $password = md5($_POST['password']);  // Encrypt password with md5

    // Query to check if user exists
    $query = "SELECT * FROM tb_siswa WHERE namaSiswa='$namaSiswa' AND nis='$nis' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Successful login, store username in session and redirect
        $_SESSION['login'] = true;
        $_SESSION['nama_siswa'] = $namaSiswa;  // Optional: Store name for personalization
        header("Location: input_absen.php");
        exit();
    } else {
        // Failed login message
        $error_message = "Invalid name, NIS, or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login Siswa</title>
</head>
<body class="bg-[#3b0a0a] flex items-center justify-center min-h-screen">
    <div class="bg-[#b30000] p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-white text-2xl font-bold mb-4 text-center">Login Siswa</h2>
        <hr class="border-white mb-4">

        <!-- Login Form -->
        <form action="" method="POST">
            <div class="mb-4">
                <label class="block text-white mb-2" for="namaSiswa">Nama Siswa</label>
                <input class="w-full p-2 rounded bg-[#ff6666] text-white" type="text" id="namaSiswa" name="namaSiswa" required>
            </div>
            <div class="mb-4">
                <label class="block text-white mb-2" for="nis">NIS</label>
                <input class="w-full p-2 rounded bg-[#ff6666] text-white" type="text" id="nis" name="nis" required>
            </div>
            <div class="mb-4">
                <label class="block text-white mb-2" for="password">Password</label>
                <input class="w-full p-2 rounded bg-[#ff6666] text-white" type="password" id="password" name="password" required>
            </div>
            <div class="flex justify-end">
                <button class="bg-gray-200 text-black py-2 px-4 rounded" type="submit" name="login">Login</button>
            </div>
        </form>

        <!-- Error Message -->
        <?php if (isset($error_message)) : ?>
            <p class="text-white mt-4"><?php echo $error_message; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
