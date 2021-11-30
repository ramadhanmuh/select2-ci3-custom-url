<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" /> -->
        <meta name="description" content="Halaman formulir pendaftaran calon mahasiswa" />
        <meta name="author" content="<?= $this->config->item('author') ?>" />
        <meta name="url" content="<?= base_url('') ?>" />

        <?php $this->load->view('template/_favicon') ?>

        <?php $this->load->view('template/_style') ?>

        <title><?= $this->config->item('nama_situs') ?> - Calon Mahasiswa - Kartu Registrasi</title>

    </head>
    <body>
        <style>
            #header-info-cetak * {
                font-size: 10pt;
            }
        </style>

        <div class="row m-0"
            id="header-info-cetak">
            <div class="col-3">
                <?= date('d/m/Y, H:i') ?>
            </div>
            <div class="col-9 text-center">
                KARTU_REG
            </div>
        </div>

        <div style="padding: 0 40px; margin-top: 20px">
            <div class="row align-items-center">
                <div class="col-auto">
                    <img src="<?= base_url('assets/images/logo.png') ?>"
                        alt="Logo"
                        width="80">
                </div>
                <div class="col p-0">
                    <h2 class="m-0 text-center text-uppercase"
                        style="font-size: 13pt;">
                        <b><?= $universitas->nama ?></b>
                    </h2>
                    <h1 class="m-0 text-center"
                        style="font-size:16pt">
                        <b><?= $universitas->nama_pendek ?></b>
                    </h1>
                    <h2 class="m-0 text-center"
                        style="font-size: 13pt;">
                        <b>
                            Jl. Sisimangaraja Teladan, Kelurahan Teladan Barat, Kecamatan
                            <br>
                            0812-6362-1919 MEDAN
                        </b>
                    </h2>
                </div>
            </div>

            <div class="row border border-dark mt-5">
                <div class="col-12 py-2 text-center"
                    style="font-size: 16pt">
                    BUKTI PRA REGISTRASI T.A.
                    <?= htmlentities($tahun_ajar->awal) ?>/<?= htmlentities($tahun_ajar->akhir) ?>
                </div>
            </div>

            <div class="row border border-dark mt-3">
                <div class="col-12">
                    <div class="row py-2">
                        <div class="col-9"
                            style="font-size: 11pt"> 
                            <div class="row">
                                <div class="col">
                                    NOMOR PRA REGISTRASI
                                </div>
                                <div class="col-auto p-0">
                                    :
                                </div>
                                <div class="col-6">
                                    <?= htmlentities($nomor_pra_registrasi) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Kelompok Pilihan
                                </div>
                                <div class="col-auto p-0">
                                    :
                                </div>
                                <div class="col-6">
                                    <?= htmlentities($kelompok->nama) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Pilihan Program Studi
                                </div>
                                <div class="col-auto p-0">
                                    :
                                </div>
                                <div class="col-6">
                                    <?= htmlentities($program_studi->program_studi->nama) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Kelas
                                </div>
                                <div class="col-auto p-0">
                                    :
                                </div>
                                <div class="col-6">
                                    <?= htmlentities($program_studi->kelas->nama) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col"
                                    style="letter-spacing: 2px">
                                    Nama
                                </div>
                                <div class="col-auto p-0">
                                    :
                                </div>
                                <div class="col-6">
                                    <?= htmlentities($biodata->nama) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Jenis Kelamin
                                </div>
                                <div class="col-auto p-0">
                                    :
                                </div>
                                <div class="col-6">
                                    <?= htmlentities($biodata->jenis_kelamin) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Tempat/Tanggal Lahir
                                </div>
                                <div class="col-auto p-0">
                                    :
                                </div>
                                <div class="col-6">
                                    <?= htmlentities($biodata->tempat_lahir) ?>/<?= htmlentities($biodata->tanggal_lahir) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Asal Sekolah
                                </div>
                                <div class="col-auto p-0">
                                    :
                                </div>
                                <div class="col-6">
                                    <?= htmlentities($asal_sekolah->sekolah->sekolah) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Kecamatan 
                                </div>
                                <div class="col-auto p-0">
                                    :
                                </div>
                                <div class="col-6">
                                    <?= htmlentities($asal_sekolah->sekolah->kecamatan) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Kab/Kota
                                </div>
                                <div class="col-auto p-0">
                                    :
                                </div>
                                <div class="col-6">
                                    <?= htmlentities($asal_sekolah->sekolah->kabupaten_kota) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Propinsi 
                                </div>
                                <div class="col-auto p-0">
                                    :
                                </div>
                                <div class="col-6">
                                    <?= htmlentities($asal_sekolah->sekolah->propinsi) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Biaya Pendaftaran 
                                </div>
                                <div class="col-auto p-0">
                                    :
                                </div>
                                <div class="col-6">
                                    <?= $biaya ?>.-
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Terbilang
                                </div>
                                <div class="col-auto p-0">
                                    :
                                </div>
                                <div class="col-6 pe-1">
                                    #<?= $terbilang ?> Rupiah#
                                </div>
                            </div>
                        </div>

                        <div class="col-3 py-2">
                            <div class="border p-1 border-dark">
                                <img src="<?= base_url('assets/images/placeholder/300x400-fff-fff.png') ?>"
                                    alt="Foto"
                                    class="w-100">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 mb-2">
                        <div class="col-12 text-center">
                            Kartu ini merupakan bukti pra registrasi. <b>NOMOR PRA REGISTRASI</b> digunakan sebagai
                            nomor saat pembayaran SPP dan biaya Pendaftaran, dapat dibayar di BNI Syariah , Khusus
                            biaya pendaftaran dengan cara transfer ke Rek. 500 6000 145
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="fixed-bottom"
            style="font-size: 8pt">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <?= $url ?>
                </div>
                <div class="col-auto">
                    1/1
                </div>
            </div>
        </div>

        <script>
            setTimeout(function () {
                 window.print(); 
            }, 100);

            window.onafterprint = function(){
                window.close();
            }
        </script>
    </body>
</html>
