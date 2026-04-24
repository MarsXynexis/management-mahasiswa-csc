<?php
session_start();
if (isset($_SESSION["login"])) {
    header('Location: index.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);
    if ($username == "dimasgaming" && $password == "123123") {
        header('Location: index.php');
        $_SESSION["login"] = true;
        $_SESSION["username"] = true;
        $_SESSION["remember"] = $remember;
        exit();
    }
};
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - EduFlow</title>
    <link rel="stylesheet" href="./public/style/output.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Plus+Jakarta+Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-[#f8fafc] text-slate-900 min-h-screen flex items-center justify-center p-6 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-indigo-100 via-slate-50 to-white">
    <div class="w-full max-w-[440px]">
        <div class="bg-white/80 backdrop-blur-xl rounded-[2rem] shadow-2xl shadow-indigo-100/50 p-10 border border-white">
            <div class="flex flex-col items-center mb-10">
                <div class="w-16 h-16 bg-indigo-600 rounded-2xl flex items-center justify-center shadow-lg shadow-indigo-200 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="12 14l9-5-9-5-9 5 9 5z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                    </svg>
                </div>
                <h1 class="text-3xl font-extrabold tracking-tight text-slate-800 text-center">Management Mahasiswa</h1>
                <p class="text-slate-500 mt-2 font-medium text-center">Masuk untuk mengelola data mahasiswa</p>
            </div>
            <div class="text-red-500 font-semibold text-center mb-4 hidden" id="salah">
                <p>USERNAME DAN PASSWORD SALAH</p>
            </div>
            <form action="login.php" class="space-y-6" method="POST">
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-slate-700 ml-1">Username</label>
                    <input type="text" name="username" placeholder="Masukkan username" class="w-full px-5 py-4 rounded-2xl bg-white border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all">
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-slate-700 ml-1">Password</label>
                    <input type="password" name="password" placeholder="••••••••" class="w-full px-5 py-4 rounded-2xl bg-white border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all">
                </div>
                <div class="flex items-center justify-between px-1">
                    <label class="flex items-center cursor-pointer group">
                        <input type="checkbox" name="remember" class="w-5 h-5 rounded-lg border-slate-300 text-indigo-600 focus:ring-indigo-500 cursor-pointer">
                        <span class="ml-3 text-sm font-medium text-slate-600 group-hover:text-indigo-600 transition-colors">Ingat Saya</span>
                    </label>
                </div>
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 rounded-2xl transition-all shadow-xl shadow-indigo-200 hover:-translate-y-1">
                    Masuk Sekarang
                </button>
            </form>
        </div>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($username != "dimasgaming" && $password != "123123") {
            echo "<script>document.getElementById('salah').classList.remove('hidden');</script>";
        }
    };
    ?>
</body>

</html>