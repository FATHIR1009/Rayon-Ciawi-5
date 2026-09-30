<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rayon Ciawi 5 - Portal Informasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom Colors */
        :root {
            --color-navy: #243454;
            --color-orange: #f28b3c;
            --color-bg-light: #f4f6f9;
        }
        .text-navy { color: var(--color-navy); }
        .bg-navy { background-color: var(--color-navy); }
        .text-orange-custom { color: var(--color-orange); }
        .bg-orange-custom { background-color: var(--color-orange); }

        body {
            font-family: 'Inter', sans-serif; /* Fallback font */
        }
        
        /* Connector lines for tree */
        .tree-line-vertical {
            width: 1px;
            height: 30px;
            background-color: #a0aec0;
            margin: 0 auto;
        }
        .tree-line-horizontal {
            border-top: 1px solid #a0aec0;
            width: 70%;
            margin: 0 auto;
            position: relative;
            top: 15px;
            z-index: -1;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="bg-white text-gray-800">

    <!-- Navbar -->
    <nav class="flex items-center justify-between px-8 py-4 bg-white border-b border-gray-100 sticky top-0 z-50 shadow-sm">
        <div class="text-xl font-bold text-navy">
            Rayon Ciawi 5
        </div>
        <div class="hidden md:flex space-x-8 text-sm font-semibold text-navy">
            <a href="#struktur" class="hover:text-orange-custom transition">Struktur</a>
            <a href="#jadwal" class="hover:text-orange-custom transition">Jadwal</a>
            <a href="#galeri" class="hover:text-orange-custom transition">Galeri</a>
        </div>
        <div>
            <a href="{{ url('/login') }}" class="bg-orange-custom hover:bg-orange-600 text-white px-6 py-2 rounded text-sm font-bold shadow transition">
                LOGIN
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-navy pt-20 pb-24 px-8 md:px-16 flex flex-col md:flex-row items-center justify-between">
        <div class="w-full md:w-1/2 text-white pr-0 md:pr-12 mb-10 md:mb-0">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 leading-tight">
                Portal Informasi Rayon Ciawi 5
            </h1>
            <p class="text-gray-300 text-base md:text-lg mb-8 leading-relaxed max-w-lg">
                Sistem informasi terpadu untuk pengelolaan data rayon, jadwal piket, koordinasi kepengurusan, dan transparansi keuangan secara digital.
            </p>
            <a href="#struktur" class="inline-block bg-orange-custom hover:bg-orange-600 text-white font-bold py-3 px-8 rounded shadow-lg transition">
                JELAJAHI PORTAL
            </a>
        </div>
        <div class="w-full md:w-1/2 flex justify-center md:justify-end">
            <!-- Placeholder for Illustration -->
            <div class="w-full max-w-lg aspect-[4/3] bg-gray-300 rounded-xl shadow-inner flex items-center justify-center text-gray-500">
                <!-- Image or illustration goes here -->
            </div>
        </div>
    </section>

    <!-- Struktur Organisasi Section -->
    <section id="struktur" class="py-20" style="background-color: var(--color-bg-light);">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-navy mb-2">Struktur Organisasi</h2>
            <p class="text-gray-500 text-sm mb-4">Kepengurusan Rayon Ciawi 5 Periode 2025</p>
            <div class="w-12 h-1 bg-orange-custom mx-auto mb-12 rounded"></div>

            @php
                // Helper function to find student by position string
                $getStudent = function($positionName) use ($students) {
                    $found = $students->first(function($student) use ($positionName) {
                        return strtolower(trim($student->position->name ?? '')) == strtolower(trim($positionName));
                    });
                    
                    return [
                        'name' => $found ? $found->name : 'Nama Belum Diisi',
                        'position' => $positionName
                    ];
                };

                $ketua = $getStudent('Ketua Rayon');
                $wakil = $getStudent('Wakil Ketua');
                $sekretaris = $getStudent('Sekretaris');
                $bendahara = $getStudent('Bendahara');
                
                // Assuming other positions contain "Kedutaan"
                $kedutaanGizi = $getStudent('Kedutaan Gizi');
                $kedutaanKebersihan = $getStudent('Kedutaan Kebersihan');
                $kedutaanKeamanan = $getStudent('Kedutaan Keamanan');
                $kedutaanIbadah = $getStudent('Kedutaan Ibadah');
            @endphp

            <!-- Tree Layout -->
            <div class="flex flex-col items-center">
                
                <!-- Ketua -->
                <div class="bg-white rounded-xl shadow p-6 w-56 flex flex-col items-center z-10 relative">
                    <div class="w-12 h-12 bg-gray-300 rounded-full mb-3"></div>
                    <div class="text-navy font-bold text-sm">{{ $ketua['position'] }}</div>
                    <div class="text-gray-500 text-xs">{{ $ketua['name'] }}</div>
                </div>

                <div class="tree-line-vertical"></div>

                <!-- Horizontal Line for Wakil, Sek, Ben -->
                <div class="w-[50%] md:w-[60%] border-t border-gray-400 relative">
                    <!-- vertical lines down -->
                    <div class="absolute left-0 top-0 h-6 border-l border-gray-400"></div>
                    <div class="absolute left-1/2 top-0 h-6 border-l border-gray-400 -ml-[0.5px]"></div>
                    <div class="absolute right-0 top-0 h-6 border-r border-gray-400"></div>
                </div>

                <!-- Row 2: Wakil, Sekretaris, Bendahara -->
                <div class="flex justify-center w-full max-w-3xl space-x-4 md:space-x-12 mt-6 z-10 relative">
                    <!-- Wakil -->
                    <div class="bg-white rounded-xl shadow p-6 w-52 flex flex-col items-center">
                        <div class="w-10 h-10 bg-gray-300 rounded-full mb-3"></div>
                        <div class="text-navy font-bold text-sm">{{ $wakil['position'] }}</div>
                        <div class="text-gray-500 text-xs">{{ $wakil['name'] }}</div>
                    </div>
                    <!-- Sekretaris -->
                    <div class="bg-white rounded-xl shadow p-6 w-52 flex flex-col items-center">
                        <div class="w-10 h-10 bg-gray-300 rounded-full mb-3"></div>
                        <div class="text-navy font-bold text-sm">{{ $sekretaris['position'] }}</div>
                        <div class="text-gray-500 text-xs">{{ $sekretaris['name'] }}</div>
                    </div>
                    <!-- Bendahara -->
                    <div class="bg-white rounded-xl shadow p-6 w-52 flex flex-col items-center">
                        <div class="w-10 h-10 bg-gray-300 rounded-full mb-3"></div>
                        <div class="text-navy font-bold text-sm">{{ $bendahara['position'] }}</div>
                        <div class="text-gray-500 text-xs">{{ $bendahara['name'] }}</div>
                    </div>
                </div>

                <!-- Connect Row 2 to Row 3 (from center) -->
                <div class="tree-line-vertical mt-4"></div>

                <div class="w-[70%] md:w-[80%] border-t border-gray-400 relative">
                     <div class="absolute left-0 top-0 h-6 border-l border-gray-400"></div>
                     <div class="absolute left-[33%] top-0 h-6 border-l border-gray-400 -ml-[0.5px]"></div>
                     <div class="absolute left-[66%] top-0 h-6 border-l border-gray-400 -ml-[0.5px]"></div>
                     <div class="absolute right-0 top-0 h-6 border-r border-gray-400"></div>
                </div>

                <!-- Row 3: Kedutaan -->
                <div class="flex justify-center w-full max-w-5xl space-x-2 md:space-x-6 mt-6 z-10 relative flex-wrap md:flex-nowrap gap-y-4 md:gap-y-0">
                    <!-- Gizi -->
                    <div class="bg-white rounded-xl shadow p-6 w-48 flex flex-col items-center">
                        <div class="w-10 h-10 bg-gray-300 rounded-full mb-3"></div>
                        <div class="text-navy font-bold text-sm">{{ $kedutaanGizi['position'] }}</div>
                        <div class="text-gray-500 text-xs text-center">{{ $kedutaanGizi['name'] }}</div>
                    </div>
                    <!-- Kebersihan -->
                    <div class="bg-white rounded-xl shadow p-6 w-48 flex flex-col items-center">
                        <div class="w-10 h-10 bg-gray-300 rounded-full mb-3"></div>
                        <div class="text-navy font-bold text-sm">{{ $kedutaanKebersihan['position'] }}</div>
                        <div class="text-gray-500 text-xs text-center">{{ $kedutaanKebersihan['name'] }}</div>
                    </div>
                    <!-- Keamanan -->
                    <div class="bg-white rounded-xl shadow p-6 w-48 flex flex-col items-center">
                        <div class="w-10 h-10 bg-gray-300 rounded-full mb-3"></div>
                        <div class="text-navy font-bold text-sm">{{ $kedutaanKeamanan['position'] }}</div>
                        <div class="text-gray-500 text-xs text-center">{{ $kedutaanKeamanan['name'] }}</div>
                    </div>
                    <!-- Ibadah -->
                    <div class="bg-white rounded-xl shadow p-6 w-48 flex flex-col items-center">
                        <div class="w-10 h-10 bg-gray-300 rounded-full mb-3"></div>
                        <div class="text-navy font-bold text-sm">{{ $kedutaanIbadah['position'] }}</div>
                        <div class="text-gray-500 text-xs text-center">{{ $kedutaanIbadah['name'] }}</div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Jadwal Section -->
    <section id="jadwal" class="py-20 bg-white">
        <div class="container mx-auto px-4 lg:px-20">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Jadwal Mingguan -->
                <div class="rounded-xl overflow-hidden shadow border border-gray-100">
                    <div class="bg-navy text-white px-6 py-4">
                        <h3 class="font-bold text-lg">Jadwal Mingguan Rayon</h3>
                        <p class="text-xs text-gray-300">Pembagian tugas harian rayon</p>
                    </div>
                    <table class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="bg-navy text-white">
                                <th class="py-3 px-6 font-semibold w-1/3">Hari</th>
                                <th class="py-3 px-6 font-semibold">Nama Siswa</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <tr class="border-b">
                                <td class="py-3 px-6 font-bold text-navy">Senin</td>
                                <td class="py-3 px-6">Arya, dika, Garizah</td>
                            </tr>
                            <tr class="border-b bg-gray-50">
                                <td class="py-3 px-6 font-bold text-navy">Selasa</td>
                                <td class="py-3 px-6">Gita, Haris, Indah</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-3 px-6 font-bold text-navy">Rabu</td>
                                <td class="py-3 px-6">Laras, Maman, Naufal</td>
                            </tr>
                            <tr class="border-b bg-gray-50">
                                <td class="py-3 px-6 font-bold text-navy">Kamis</td>
                                <td class="py-3 px-6">Qori, Rian, Soni</td>
                            </tr>
                            <tr>
                                <td class="py-3 px-6 font-bold text-navy">Jumat</td>
                                <td class="py-3 px-6">Vina, Wawan, Yanto</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Jadwal Bulanan Kamar Mandi -->
                <div class="rounded-xl overflow-hidden shadow border border-gray-100">
                    <div class="bg-navy text-white px-6 py-4">
                        <h3 class="font-bold text-lg">Jadwal Bulanan Kamar Mandi</h3>
                        <p class="text-xs text-gray-300">Tugas dan lokasi kamar mandi</p>
                    </div>
                    <table class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="bg-navy text-white">
                                <th class="py-3 px-6 font-semibold w-1/3">Nama Siswa</th>
                                <th class="py-3 px-6 font-semibold w-1/3">Tugas</th>
                                <th class="py-3 px-6 font-semibold">Lokasi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <tr class="border-b">
                                <td class="py-3 px-6">Dedi, Fahri</td>
                                <td class="py-3 px-6">dinding dan lantai</td>
                                <td class="py-3 px-6 text-xs">Gedung A, Lantai 2, Pintu 3</td>
                            </tr>
                            <tr class="border-b bg-gray-50">
                                <td class="py-3 px-6">Joko, Kevin</td>
                                <td class="py-3 px-6">Membersihkan dinding</td>
                                <td class="py-3 px-6 text-xs">Gedung B, Lantai 1, Pintu 1</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-3 px-6">Opik, Putra</td>
                                <td class="py-3 px-6">Kloset dan lantai</td>
                                <td class="py-3 px-6 text-xs">Gedung C, Lantai 3, Pintu 2</td>
                            </tr>
                            <tr class="border-b bg-gray-50">
                                <td class="py-3 px-6">Taufik, Udin</td>
                                <td class="py-3 px-6">Membersihkan gayung dan ember</td>
                                <td class="py-3 px-6 text-xs">Gedung D, Lantai 1, Pintu 4</td>
                            </tr>
                            <tr>
                                <td class="py-3 px-6">Zaki, Aris</td>
                                <td class="py-3 px-6">ember dan gayung</td>
                                <td class="py-3 px-6 text-xs">Gedung E, Lantai 2, Pintu 5</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>

    <!-- Galeri Section -->
    <section id="galeri" class="py-20" style="background-color: var(--color-bg-light);">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-navy mb-2">Galeri Kegiatan</h2>
            <p class="text-gray-500 text-sm mb-4">Dokumentasi aktivitas rutin dan kebersamaan di Rayon Ciawi 5</p>
            <div class="w-12 h-1 bg-orange-custom mx-auto mb-12 rounded"></div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto">
                <!-- Gallery Items (Placeholders like Figma) -->
                <div class="aspect-[4/3] bg-gray-300 rounded-xl shadow-sm"></div>
                <div class="aspect-[4/3] bg-gray-300 rounded-xl shadow-sm"></div>
                <div class="aspect-[4/3] bg-gray-300 rounded-xl shadow-sm"></div>
                <div class="aspect-[4/3] bg-gray-300 rounded-xl shadow-sm"></div>
                <div class="aspect-[4/3] bg-gray-300 rounded-xl shadow-sm"></div>
                <div class="aspect-[4/3] bg-gray-300 rounded-xl shadow-sm"></div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-navy text-white py-6 border-t border-gray-700">
        <div class="container mx-auto px-8 flex flex-col md:flex-row justify-between items-center">
            <div class="font-bold text-lg mb-4 md:mb-0">Rayon Ciawi 5</div>
            <div class="text-sm text-gray-400">
                &copy; 2025 Rayon Ciawi 5. All rights reserved.
            </div>
        </div>
    </footer>

</body>
</html>
