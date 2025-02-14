<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SambutanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sambutan = new \App\Models\Sambutan();
        $sambutan->nama_kepala_sekolah = 'Drs. H. Asep Saepudin, M.Pd.';
        $sambutan->foto_kepala_sekolah = 'kepala-sekolah.jpg';
        $sambutan->sambutan_kepala_sekolah = "<div>Assalamu'alaikum Warahmatullahi Wabarakatuh,</div><div><br></div><div>Puji syukur kehadirat Allah SWT yang telah memberikan rahmat dan karunia-Nya sehingga kita dapat terus berkarya dan berprestasi dalam membangun generasi muda yang berakhlak mulia, cerdas, dan berwawasan luas. Shalawat serta salam semoga selalu tercurah kepada Nabi Muhammad SAW, keluarga, sahabat, dan seluruh umatnya yang senantiasa meneladani ajaran-ajaran beliau.</div><div><br></div><div>SMA Islam Al-Ghozali hadir sebagai lembaga pendidikan yang tidak hanya fokus pada pengembangan akademik, tetapi juga pembentukan karakter siswa yang berlandaskan nilai-nilai Islam. Kami berkomitmen untuk menciptakan lingkungan belajar yang kondusif, inspiratif, dan penuh dengan semangat keislaman. Dengan kurikulum yang terintegrasi antara ilmu pengetahuan dan agama, kami berharap siswa-siswi dapat tumbuh menjadi generasi yang unggul, mandiri, dan bertanggung jawab.</div><div><br></div><div>Kami juga mengapresiasi dukungan dari seluruh orang tua, guru, dan masyarakat yang telah bekerja sama dalam mendidik dan membimbing siswa-siswi kami. Kolaborasi ini sangat penting dalam menciptakan sinergi antara sekolah, keluarga, dan lingkungan masyarakat untuk mencapai tujuan pendidikan yang holistik. Mari kita terus bersinergi dalam membangun generasi muda yang siap menghadapi tantangan masa depan dengan bekal iman, ilmu, dan amal.</div><div><br></div><div>Terakhir, kepada siswa-siswi SMA Islam Al-Ghozali, tetaplah semangat dalam menuntut ilmu dan berproses. Jadilah pribadi yang rendah hati, disiplin, dan selalu haus akan pengetahuan. Ingatlah bahwa kesuksesan tidak hanya diukur dari nilai akademik, tetapi juga dari akhlak dan kontribusi kalian terhadap masyarakat. Semoga Allah SWT senantiasa membimbing kita semua dalam setiap langkah dan perjuangan.</div><div><br></div><div>Wassalamu'alaikum Warahmatullahi Wabarakatuh.</div>";

        $sambutan->save();
    }
}
