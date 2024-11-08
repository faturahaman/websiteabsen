<?php
session_start();
require '../config/db.php';  // Include the database connection

// Login process
if (isset($_POST['login'])) {
    $namaPegawai = $_POST['namaPegawai'];
    $noPegawai = $_POST['noPegawai'];
    $password = md5($_POST['password']);  // Encrypt password with md5

    // Query to check if user exists
    $query = "SELECT * FROM tb_pegawai WHERE namaPegawai='$namaPegawai' AND noPegawai='$noPegawai' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Successful login, store username in session and redirect
        $_SESSION['loginadmin'] = true;
        header("Location: admin.php");
        exit();
    } else {
        // Failed login message
        $error_message = "Nama pegawai, no pegawai, atau password salah.";
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
        <h2 class="text-white text-2xl font-bold mb-4 text-center">Login Staff admin</h2>
        <hr class="border-white mb-4">

        <!-- Login Form -->
        <form action="" method="POST">
            <div class="mb-4">
                <label class="block text-white mb-2" for="namaSiswa">Nama Pegawai</label>
                <input class="w-full p-2 rounded bg-[#ff6666] text-white" type="text" id="namaPegawai" name="namaPegawai" required>
            </div>
            <div class="mb-4">
                <label class="block text-white mb-2" for="nopegawai">Nomor Pegawai</label>
                <input class="w-full p-2 rounded bg-[#ff6666] text-white" type="text" id="nopegawai" name="noPegawai" required>
            </div>
            <div class="mb-4">
                <label class="block text-white mb-2" for="password">Password</label>
                <input class="w-full p-2 rounded bg-[#ff6666] text-white" type="password" id="password" name="password" required>
            </div>
            <a href="register_admin.php">
                Register
            </a>
            <div class="flex justify-end">
                <button class="bg-gray-200 text-black py-2 px-4 rounded" type="submit" name="login">Login</button>
            </div>
        </form>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="bottom-0 -mb-8 -mx-7">
        <path fill="#f3f4f5" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
</svg>

        <!-- Error Message -->
        <?php if (isset($error_message)) : ?>
            <p class="text-red mt-4"><?php echo $error_message; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
