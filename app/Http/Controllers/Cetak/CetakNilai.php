<?php
/**
 * Created by PhpStorm.
 * User: - INDIEGLO -
 * Date: 27/10/2015
 * Time: 8:45
 */

namespace App\Http\Controllers\Cetak;


use App\Domain\Repositories\ValueRepository;

use App\Http\Controllers\Controller;

class CetakNilai extends Controller
{
    protected $crud;
    protected $paginate;
    protected $akun;
    protected $kelompok;
    protected $jenis;
    protected $objek;
    protected $rincian;
//330 210
    public $kertas_pjg = 297; // portrait
    public $kertas_lbr = 210; // landscape
    public $kertas_pjg1 = 320; // portrait khusus refrensi

    public $font = 'Tahoma';
    public $field_font_size = 9;
    public $row_font_size = 8;

    public $butuh = false; // jika perlu fungsi AddPage()
    protected $padding_column = 5;
    protected $default_font_size = 8;
    protected $line = 0;

    public function __construct(
        ValueRepository $valueRepository

    )
    {
        $this->nilai = $valueRepository;


    }


    function Column($pdf)
    {
        $pdf->AddFont('Tahoma', '', 'tahoma.php');
        $pdf->AddFont('Tahoma', 'B', 'tahomabd.php');
        $set = $this->butuh;
        if ($set == true) {
            $pdf->AddPage();
        }
        $pdf->SetFont($this->font, 'B', $this->field_font_size);
        $pdf->Ln(10);
        $pdf->Cell(50, 10, 'NIS', 1, 0, 'C');
        $pdf->Cell(60, 10, 'Nama', 1, 0, 'C');
        $pdf->Cell(25, 10, 'Kelas', 1, 0, 'C');
        $pdf->Cell(35, 10, 'Mapel', 1, 0, 'C');
        $pdf->Cell(25, 10, 'Type', 1, 0, 'C');
        $pdf->Cell(25, 10, 'Nilai', 1, 0, 'C');
        $pdf->Cell(25, 10, 'Status', 1, 0, 'C');
        $pdf->Cell(25, 10, 'Semester', 1, 0, 'C');
        $pdf->Ln(5  );
        $pdf->SetFont($this->font, '', 10);
        $pdf->Ln(5);

    }

    function repeatColumn($pdf, $orientasi = '', $column = '', $height = 29.7)
    {

        $height_of_cell = $height; // mm
        if ($orientasi == 'P') {
            $page_height = $this->kertas_pjg; // orientasi kertas Potrait
        } else if ($orientasi == 'K') {
            $page_height = $this->kertas_pjg1; // orientasi kertas Portait
        } else if ($orientasi == 'L') {
            $page_height = $this->kertas_lbr; // orientasi kertas Landscape
        }
        $space_bottom = $page_height - $pdf->GetY(); // space bottom on page
        if ($height_of_cell > $space_bottom) {
            $this->$column($pdf);
        }

        $this->line = $space_bottom;

//        echo $space_bottom . ' + ';
    }

    public function Nilai()
    {
//        array(215, 330)

        $pdf = new PdfClass('L', 'mm', 'A4');
        $pdf->is_header = false;
        $pdf->set_widths = 80;
        $pdf->set_footer = 29;
        $pdf->orientasi = 'p';
        $pdf->AddFont('Arial', '', 'arial.php');

        //Disable automatic page break
        $pdf->SetAutoPageBreak(false);
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetAutoPageBreak(0, 20);
        $pdf->SetTitle('Surat pendaftaran');
        $pdf->AddFont('Times-Roman', '', 'times.php');
        $pdf->AddFont('Times-Roman', 'B', 'timesb.php');
        $pdf->AddPage();
        $pdf->with_cover = true;
//        $pdf->is_footer = true;
        $pdf->set_widths = 80;
        $pdf->set_footer = 25;
        $gambar = 'assets/img/logoo.jpg';
        $pdf->Image($gambar, 240, 10, 40, 40);
        $gambar = 'assets/img/malangkab.png';
        $pdf->Image($gambar, 10, 10, 40, 40);
        $pdf->Ln(15);
        $pdf->AddFont('Tahoma', 'B', 'tahomabd.php');
        $pdf->AddFont('Tahoma', '', 'tahoma.php');
        $pdf->SetFont('Tahoma', '', 14);
        $pdf->Cell(0, 0, 'PEMERINTAH KABUPATEN MALANG', 0, 0, 'C');
        $pdf->Ln(5);
        $pdf->Cell(0, 0, 'DINAS PENDIDIKAN KABUPATEN MALANG', 0, 0, 'C');
        $pdf->Ln(5);
        $pdf->SetFont('Tahoma', 'B', 14);
        $pdf->Cell(0, 0, 'SMK NEGERI 1 KEPANJEN', 0, 0, 'C');
        $pdf->Ln(5);
        $pdf->SetFont('Tahoma', '', 12);
        $pdf->Cell(0, 0, 'NSS : 321051816023 NPSN : 20564067', 0, 0, 'C');
        $pdf->Ln(5);
        $pdf->Cell(0, 0, 'Jl. Raya Kedungpedaringan Telp. 0341-3957770341 Fax. 0341-394776', 0, 0, 'C');
        $pdf->Ln(5);
        $pdf->Cell(0, 0, 'Kode Pos 65163 Email : smkn1kepanjen@ymail.com Web : smkn1kepanjen.sch.id', 0, 0, 'C');
        $pdf->Ln(5);
        $pdf->Cell(270, 0, '', 1, 0, 'C');
        $pdf->Ln(0);
        $pdf->Cell(270, 0, '', 1, 0, 'C');
        $pdf->Ln(0);
        $pdf->Cell(270, 0, '', 1, 0, 'C');
        $pdf->Ln(0);
        $pdf->Cell(270, 0, '', 1, 0, 'C');
        $pdf->Ln(0);
        $pdf->Cell(270, 0, '', 1, 0, 'C');
        $pdf->Ln(0);
        $pdf->Cell(270, 0.5, '', 1, 0, 'C');
        $pdf->Ln(1);
        $pdf->Cell(270, 0, '', 1, 0, 'C');
        $pdf->Ln(10);
        $pdf->SetFont('Tahoma', 'B', 14);
        $pdf->Cell(0, 0, 'REKAP NILAI', 0, 0, 'C');
        $pdf->Ln(5);
        $pdf->Cell(0, 0, 'TAHUN PELAJARAN 2016/2017', 0, 0, 'C');

        $this->Column($pdf);
//        $pdf->SetY(51);
        $nilai = $this->nilai->getByPagecetak();
        $pdf->SetAligns(['C', 'C', 'C', 'C', 'JC', 'C', 'C', 'C', 'C', 'C']);
        $pdf->SetWidths([50, 60, 25, 35, 25, 25, 25, 25]);
//dump($nilai);
        if ($nilai == null) {

        } else {
            foreach ($nilai as $row) {
                $pdf->Row([$row->nis, $row->name, $row->class,$row->mata_pelajaran,$row->type,$row->nilai,$row->status,$row->semester]);

            }
            $this->butuh = true;

            $pdf->Ln(20);
            if ($pdf->y >= '240') {
                $pdf->Ln(40);

            }

        }
//==============================================================================================================================================================================
        $pdf->Ln(10);
        $pdf->SetFont('Arial', 'B', 12);

        $pdf->Cell(60, 16, 'Kepala Sekolah', 0, '', 'C');
//        $pdf->SetX(30);
        $pdf->SetFont('Arial', 'BU', 10);
        $pdf->Ln(20);
        $pdf->Cell(60, 36, 'Drs . R. DIDIK INDRATNO MW,MN', 0, '', 'C');
        $pdf->Ln(5);
        $pdf->Cell(60, 36, 'NIP. 19600717 198703 1 012', 0, '', 'C');

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(370, -34, 'Wali Kelas', 0, '', 'C');
//        $pdf->SetX(30);
        $pdf->SetFont('Arial', 'BU', 10);
        $pdf->Ln(30);
//        $guru = $this->guru->find($jumlah[0]->wali_kelas);
if($nilai !=null) {
    $pdf->Cell(490, -34, $nilai[0]->name_guru, 0, '', 'C');
    $pdf->Ln(5);
    $pdf->Cell(490, -34, $nilai[0]->nip, 0, '', 'C');
}
        $tanggal = date('d/m/y');

        $pdf->Output('cetak-data-pendaftaran-' . $tanggal . '.pdf', 'I');
        exit;
    }
}