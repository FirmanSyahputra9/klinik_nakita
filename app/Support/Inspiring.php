<?php

namespace App\Support;

use Illuminate\Support\Collection;
use Illuminate\Support\Stringable;

class Inspiring
{
    public static function quote()
    {
        return static::formatForConsole(static::quotes()->random());
    }

    public static function quotes()
    {
        return new Collection([
            'Kesehatan merupakan hak dasar manusia dan merupakan tanggung jawab seluruh komponen bangsa. - dr. Terawan Agus Putranto',
            'Kesehatan adalah modal utama bangsa untuk maju. - dr. Nila Moeloek',
            'Mencegah lebih baik daripada mengobati. - dr. Soekarno Djojonegoro',
            'Dokter bukan hanya mengobati, tetapi juga harus mendidik masyarakat agar hidup sehat. - dr. Cipto Mangunkusumo',
            'Kesehatan rakyat adalah kekayaan bangsa yang paling berharga. - Soekarno',
            'Bangsa yang kuat adalah bangsa yang sehat lahir dan batin. - Mohammad Hatta',
            'Kesehatan bukan hanya milik mereka yang mampu, tetapi milik seluruh rakyat. - dr. Wahidin Soedirohoesodo',
            'Sehat adalah keadaan sejahtera fisik, mental, dan sosial, bukan hanya bebas dari penyakit. - dr. Adhyatma, MPH',
            'Perbaikan kesehatan masyarakat dimulai dari pola hidup sederhana dan disiplin. - dr. Johannes Leimena',
            'Pelayanan kesehatan harus menjangkau seluruh rakyat hingga pelosok. - dr. Boentaran Martoatmodjo',
            'Kualitas hidup bangsa sangat ditentukan oleh kualitas kesehatannya. - dr. Siti Fadilah Supari',
            'Menjaga kesehatan adalah bentuk tanggung jawab terhadap diri sendiri dan lingkungan. - dr. Tan Shot Yen',
            'Gizi yang baik adalah fondasi tumbuh kembang anak dan masa depan bangsa. - Prof. Hardinsyah',
            'Kesehatan mental sama pentingnya dengan kesehatan fisik. - dr. Damayanti R. Sjarif',
            'Kebersihan adalah sebagian dari kesehatan dan budaya bangsa. - dr. Abdul Rasjid',
        ]);
    }

    protected static function formatForConsole($quote)
    {
        [$text, $author] = (new Stringable($quote))->explode('-');

        return sprintf(
            "\n  <options=bold>“ %s ”</>\n  <fg=gray>— %s</>\n",
            trim($text),
            trim($author),
        );
    }
}
