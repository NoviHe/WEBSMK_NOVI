<?php

use Illuminate\Database\Seeder;
use App\Jurusan;

class JurusanTableSeeder extends Seeder
{
    public function run()
    {
        $jurusans = [
            [
                'kode_jurusan' => 'RPL',
                'nama_jurusan' => 'Rekayasa Perangkat Lunak',
                'slug' => 'rekayasa-perangkat-lunak',
                'deskripsi' => 'Kompetensi keahlian yang mempelajari cara merancang, membuat, memelihara, dan mengembangkan perangkat lunak berbasis web, desktop, dan mobile.',
                'visi_misi' => 'Mencetak programmer dan software engineer andal berkarakter unggul.',
                'prospek_kerja' => 'Software Developer, Web Programmer, Mobile App Developer, IT Consultant, Database Administrator.',
                'gambar' => null,
                'icon' => 'icon-code',
                'is_active' => true,
            ],
            [
                'kode_jurusan' => 'TKJ',
                'nama_jurusan' => 'Teknik Komputer dan Jaringan',
                'slug' => 'teknik-komputer-jaringan',
                'deskripsi' => 'Mempelajari perakitan komputer, instalasi sistem operasi, rancang bangun jaringan LAN/WAN, routing, dan cybersecurity.',
                'visi_misi' => 'Mencetak teknisi jaringan yang tersertifikasi dan berdaya saing global.',
                'prospek_kerja' => 'Network Administrator, System Administrator, Computer Technician, Cloud Support.',
                'gambar' => null,
                'icon' => 'icon-network',
                'is_active' => true,
            ],
            [
                'kode_jurusan' => 'MM',
                'nama_jurusan' => 'Multimedia',
                'slug' => 'multimedia',
                'deskripsi' => 'Mempelajari desain grafis, editing video, animasi 2D/3D, audio processing, dan produksi media kreatif visual.',
                'visi_misi' => 'Mewujudkan insan kreatif dalam industri digital kreatif dan periklanan.',
                'prospek_kerja' => 'Graphic Designer, Video Editor, 2D/3D Animator, Content Creator, UI/UX Designer.',
                'gambar' => null,
                'icon' => 'icon-camera',
                'is_active' => true,
            ],
            [
                'kode_jurusan' => 'UPW',
                'nama_jurusan' => 'Usaha Perjalanan Wisata',
                'slug' => 'usaha-perjalanan-wisata',
                'deskripsi' => 'Mempelajari pemanduan wisata (tour guiding), reservasi tiket, perancangan paket wisata, dan pengelolaan destinasi wisata.',
                'visi_misi' => 'Menghasilkan tenaga profesional di bidang hospitality dan pariwisata Pangandaran.',
                'prospek_kerja' => 'Tour Guide, Travel Agent Consultant, Event Organizer Specialist, Ticketing Officer.',
                'gambar' => null,
                'icon' => 'icon-plane',
                'is_active' => true,
            ],
            [
                'kode_jurusan' => 'TEIN',
                'nama_jurusan' => 'Teknik Elektronika Industri',
                'slug' => 'teknik-elektronika-industri',
                'deskripsi' => 'Mempelajari otomasi industri, PLC, mikrokontroler, perancangan sirkuit elektronika, robotika, dan pneumatik.',
                'visi_misi' => 'Mencetak teknisi otomasi industri yang siap kerja di era manufaktur 4.0.',
                'prospek_kerja' => 'Teknisi Otomasi Pabrik, Programmer PLC, Quality Control Electronics, Teknisi Instrumentasi.',
                'gambar' => null,
                'icon' => 'icon-cogs',
                'is_active' => true,
            ],
            [
                'kode_jurusan' => 'TKR',
                'nama_jurusan' => 'Teknik Kendaraan Ringan',
                'slug' => 'teknik-kendaraan-ringan',
                'deskripsi' => 'Mempelajari pemeliharaan mesin otomotif, sistem kelistrikan kendaraan, chasis, sistem pemindah tenaga, dan diagnosis EFI.',
                'visi_misi' => 'Mencetak mekanik handal berstandar bengkel resmi APM.',
                'prospek_kerja' => 'Mekanik Otomotif, Service Advisor, Teknisi Kelistrikan Mobil, Wirausaha Bengkel.',
                'gambar' => null,
                'icon' => 'icon-truck',
                'is_active' => true,
            ],
            [
                'kode_jurusan' => 'TPMP',
                'nama_jurusan' => 'Pengelolaan Migas dan Petrokimia',
                'slug' => 'pengelolaan-migas-petrokimia',
                'deskripsi' => 'Mempelajari proses industri hulu dan hilir minyak, gas, serta pemrosesan bahan kimia industri.',
                'visi_misi' => 'Menghasilkan operator kilang dan laboratorium petrokimia yang kompeten dan patuh K3.',
                'prospek_kerja' => 'Plant Operator Kilang, Teknisi Laboratorium Kimia, Petugas K3 Industri Migas.',
                'gambar' => null,
                'icon' => 'icon-beaker',
                'is_active' => true,
            ],
            [
                'kode_jurusan' => 'GP',
                'nama_jurusan' => 'Geologi Pertambangan',
                'slug' => 'geologi-pertambangan',
                'deskripsi' => 'Mempelajari eksplorasi sumber daya bumi, pemetaan geologi, mineralogi, dan teknik pengeboran tambang.',
                'visi_misi' => 'Mencetak juru ukur dan teknisi geologi lapangan yang berintegritas dan tangguh.',
                'prospek_kerja' => 'Teknisi Tambang, Surveyor Lapangan Geologi, Pemetaan GIS, Laboran Batuan.',
                'gambar' => null,
                'icon' => 'icon-map-pin',
                'is_active' => true,
            ],
        ];

        foreach ($jurusans as $item) {
            Jurusan::firstOrCreate(['kode_jurusan' => $item['kode_jurusan']], $item);
        }
    }
}
