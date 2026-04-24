<?php
session_start();
if (!isset($_SESSION["login"])) {
    header('Location: login.php');
    exit();
}

$student = [
    "name" => "Ahmad Syaifullah",
    "nim" => "123456789",
    "major" => "Teknik Informatika"
];

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="./public/style/output.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Plus+Jakarta+Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-[#f8fafc] text-slate-900 min-h-screen flex flex-col md:flex-row">
    <!-- Sidebar -->
    <aside class="w-full md:w-72 bg-white border-r border-slate-100 p-6 flex flex-col shrink-0">
        <div class="flex items-center gap-3 px-2 mb-10">
            <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white shadow-md shadow-indigo-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                </svg>
            </div>
            <span class="font-bold text-xl tracking-tight">Management Mahasiswa</span>
        </div>
        <nav class="flex-grow space-y-2">
            <a href="index.php" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-2xl bg-indigo-50 text-indigo-600 font-semibold transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                </svg>
                Data Mahasiswa
            </a>
            <a href="add-form.php" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-2xl text-slate-600 font-semibold hover:bg-slate-50 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Data
            </a>
        </nav>
        <div class="mt-auto pt-6 border-t border-slate-100">
            <a href="controller/logout.php" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-2xl font-semibold text-red-500 hover:bg-red-50 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Keluar
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-grow p-6 md:p-10 overflow-y-auto">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-4">
            <div>
                <h2 class="text-3xl font-extrabold text-slate-800">Data Mahasiswa</h2>
                <p class="text-slate-500 mt-1">Total 2 mahasiswa terdaftar.</p>
            </div>
            <a href="add-form.php" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3.5 rounded-2xl font-bold flex items-center justify-center gap-2 shadow-lg shadow-indigo-100 transition-all hover:-translate-y-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Baru
            </a>
        </div>

        <!-- Search -->
        <div class="bg-white p-4 rounded-3xl shadow-sm border border-slate-100 flex flex-col md:flex-row gap-4 mb-8">
            <div class="relative flex-grow">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 absolute left-4 top-1/2 -translate-y-1/2 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input type="text" placeholder="Cari berdasarkan nama atau NIM..." class="w-full pl-12 pr-4 py-3.5 rounded-2xl bg-slate-50 border-none focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
            </div>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-slate-50/50 border-b border-slate-100">
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-wider text-slate-500">Mahasiswa</th>
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-wider text-slate-500">NIM</th>
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-wider text-slate-500">Jurusan</th>
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-wider text-slate-500 text-right">Aksi</th>
                        </tr>
                    </thead>


                    <tbody class="divide-y divide-slate-50">
                        <tr class="group hover:bg-slate-50/50 transition-colors">
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-4">
                                    <img src="https://ui-avatars.com/api/?name=Ahmad+Syaifullah&background=4f46e5&color=fff" class="w-10 h-10 rounded-xl" alt="">
                                    <span class="font-bold text-slate-700"><?php echo $student['name']; ?></span>
                                </div>
                            </td>
                            <td class="px-8 py-5 text-slate-500 font-medium"><?php echo $student['nim']; ?></td>
                            <td class="px-8 py-5">
                                <span class="bg-indigo-50 text-indigo-700 px-3 py-1 rounded-lg text-xs font-bold"><?php echo $student['major']; ?></span>
                            </td>
                            <td class="px-8 py-5 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="edit-form.php" class="p-2.5 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-xl transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>
                                    <button onclick="document.getElementById('delete-modal').classList.remove('hidden')" class="p-2.5 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-xl transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody> 


                </table>
            </div>
        </div>
    </main>

    <!-- Modal Hapus -->
    <div id="delete-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center p-6 bg-slate-900/60 backdrop-blur-sm">
        <div class="bg-white rounded-[2.5rem] w-full max-w-md p-10 shadow-2xl">
            <div class="w-20 h-20 bg-red-50 text-red-500 rounded-3xl flex items-center justify-center mx-auto mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
            <h3 class="text-2xl font-extrabold text-center text-slate-800">Hapus Mahasiswa?</h3>
            <p class="text-slate-500 text-center mt-3">Tindakan ini tidak dapat dibatalkan.</p>
            <div class="flex flex-col gap-3 mt-10">
                <button class="w-full bg-red-500 hover:bg-red-600 text-white font-bold py-4 rounded-2xl shadow-lg shadow-red-100">Ya, Hapus Data</button>
                <button onclick="document.getElementById('delete-modal').classList.add('hidden')" class="w-full bg-slate-100 text-slate-600 font-bold py-4 rounded-2xl hover:bg-slate-200">Batalkan</button>
            </div>
        </div>
    </div>
</body>

</html>