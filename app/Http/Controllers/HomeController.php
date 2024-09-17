<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $navItems = [
            (object)["name" => "Beranda", "href" => "#"],
            (object)["name" => "Tentang", "href" => "#about"],
            (object)["name" => "Kategori", "href" => "#category"],
            (object)["name" => "Time Line", "href" => "#time-line"],
            (object)["name" => "FAQ", "href" => "#faq"],
        ];

        $categoryItems = [
            (object)[
                "title" => "Web App", 
                "href" => "web-app", 
                "imgUrl" => "web-app.png",
                "maxTeam" => "3"
            ],
            (object)[
                "title" => "UI/UX Design", 
                "href" => "ui-ux-design", 
                "imgUrl" => "uiux.png",
                "maxTeam" => "3"
            ],
            (object)[
                "title" => "CTF", 
                "href" => "ctf", 
                "imgUrl" => "ctf.png",
                "maxTeam" => "3"
            ],
        ];

        $timelineItems = [
            (object)[
                "startDate" => "12 September 2024",
                "lastDate" => "16 November 2024",
                "title" => "Pendaftaran Gelombang 1",
            ],
            (object)[
                "startDate" => "13 September 2024",
                "lastDate" => "16 Desember 2024",
                "title" => "Pendaftaran Gelombang 2",
            ],
            (object)[
                "startDate" => "19 Oktober 2024",
                "lastDate" => "19 Desember 2024",
                "title" => "Pengerjaan dan Pengumpulan Karya",
            ],
            (object)[
                "startDate" => "23 Desember 2024",
                "lastDate" => "",
                "title" => "Warm Up Capture The Flag",
            ],
            (object)[
                "startDate" => "20 Desember 2024",
                "lastDate" => "30 Desember 2024",
                "title" => "Babak Penyisihan",
            ],
            (object)[
                "startDate" => "3 Januari 2025",
                "lastDate" => "",
                "title" => "Pengumuman Finalis",
            ],
            (object)[
                "startDate" => "4 Januari 2025",
                "lastDate" => "11 Januari 2025",
                "title" => "Registrasi Ulang Lomba",
            ],
            (object)[
                "startDate" => "13 Januari 2025",
                "lastDate" => "",
                "title" => "Technical Meeting",
            ],
            (object)[
                "startDate" => "20 Januari 2025",
                "lastDate" => "",
                "title" => "Final Lomba",
            ],
        ];

        $faqItems = [
            (object)[
                "question" => "Apa itu TechComfest?",
                "answer" => "Techcomfest (Technology Computer Festival) merupakan salah satu wujud misi dan peran aktif UKM 
                            Polytechnic Computer Club dalam mengikuti perkembangan teknologi 
                            dalam bidang IT melalui lomba SMA/SMK sederajat dan Mahasiswa umum se-Indonesia."
            ],
            (object)[
                "question" => "Kapan Techcomfest diadakan?",
                "answer" => "Techcomfest diadakan pada tanggal 20 Januari 2025"
            ],
            (object)[
                "question" => "Bagaimana cara mendapatkan buku pedoman Techomfest?",
                "answer" => "Peserta dapat mengunduh pedoman yang telah disediakan di website techcomfest"
            ],
            (object)[
                "question" => "Apakah boleh menggunakan satu akun email untuk mendaftar dengan nama tim yang berbeda?",
                "answer" => "Ketika mendaftar, email yang digunakan adalah satu email untuk satu tim"
            ],
            (object)[
                "question" => "Apakah satu instansi dapat mengirim lebih dari satu tim untuk setiap cabang lomba?",
                "answer" => "Instansi diperbolehkan mengirimkan lebih dari satu tim untuk 
                setiap cabang lomba, dengan syarat anggota tim hanya diperbolehkan mengikuti satu mata lomba."
            ],
            (object)[
                "question" => "Apakah saja yang didapatkan pemenang lomba Techomfest?   ",
                "answer" => "Pemenang lomba Techcomfest akan mendapatkan uang pembinaan, piala, sertifikat"
            ],
            (object)[
                "question" => "Apakah ada biaya pendaftaran lomba?",
                "answer" => "Pada gelombang pertama peserta mata lomba UI/UX Design Competition 
                dikenai biaya pendaftaran sebesar Rp 70.000, untuk mata lomba Capture The Flag Competition dikenai 
                biaya pendaftaran sebesar Rp 80.000, dan untuk mata lomba Web Design Competition dikenai biaya pendaftaran sebesar Rp 60.000. 
                Kemudian pada gelombang kedua, peserta mata lomba UI/UX Design Competition dikenai biaya pendaftaran sebesar Rp 80.000, 
                untuk mata lomba Capture The Flag Competition dikenai biaya pendaftaran sebesar Rp 100.000, dan untuk mata lomba Web Design dikenai biaya pendaftaran sebesar Rp 75.000."
            ],
            (object)[
                "question" => "Apakah ada biaya pendaftaran ulang untuk yang masuk final?",
                "answer" => "Tidak ada."
            ],
            (object)[
                "question" => "Apakah dapat mengirimkan karya yang pernah dilombakan di event lain?",
                "answer" => "Tidak boleh. Karya yang dikirimkan adalah murni dari peserta dan tidak pernah diperlombakan sebelumnya."
            ],
            (object)[
                "question" => "Apakah lomba Capture The Flag dilaksanakan secara offline atau online?",
                "answer" => "Untuk babak penyisihan lomba Capture The Flag dilaksanakan secara daring. 
                Kemudian babak final akan dilaksanakan secara luring (onsite) pada tanggal 20 Januari 2024 di Gedung Magister Terapan lantai 2 Politeknik Negeri Semarang."
            ],
            (object)[
                "question" => "Apakah karya yang dikirim akan menjadi milik panitia?",
                "answer" => "Karya yang diperlombakan akan menjadi hak milik panitia"
            ],
            (object)[
                "question" => "Web App diperbolehkan menggunakan apa saja?",
                "answer" => "Web App wajib menggunakan Laravel sebagai framework utama, dan Tailwind, Bootstrap sebagai framework css."
            ],
        ];

        return view('pages.home', compact('navItems', 'categoryItems', 'timelineItems', 'faqItems'));
    }
}
