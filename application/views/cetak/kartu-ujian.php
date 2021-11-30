<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="Halaman formulir pendaftaran calon mahasiswa" />
        <meta name="author" content="<?= $this->config->item('author') ?>" />
        <meta name="url" content="<?= base_url('') ?>" />

        <?php $this->load->view('template/_favicon') ?>

        <?php $this->load->view('template/_style') ?>

        <title><?= $this->config->item('nama_situs') ?> - Calon Mahasiswa - Kartu Ujian</title>

    </head>
    <body>
        <style>
            #header-info-cetak *{
                font-size: 10pt;
            }
        </style>

        <div class="row m-0"
            id="header-info-cetak">
            <div class="col-3">
                <?= date('d/m/Y, H:i') ?>
                26/10/2021, 22:00
            </div>
            <div class="col-9 text-center">
                KARTU_REG
            </div>
        </div>

        <div class="row m-0 mt-3 px-2">
            <div class="col-6">
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <img src="<?= base_url('assets/images/logo.png') ?>"
                            alt="Logo"
                            width="50">
                    </div>
                    <div class="col-7">
                        <h1 class="text-center"
                            style="font-size:20pt">
                            <?= htmlentities($universitas->nama_pendek) ?>
                        </h1>
                        <h2 class="text-center"
                            style="font-size: 15pt">
                            <b>PPMB -
                                <?= htmlentities($tahun_ajar->awal . '/' . $tahun_ajar->akhir) ?></b>
                        </h2>
                    </div>
                </div>
                <div class="row border m-0 border-dark">
                    <div class="col-12 text-center">
                        <h3 style="font-size: 13pt"
                            class="m-0 my-1">
                            KARTU PESERTA UJIAN
                        </h3>
                    </div>
                </div>
                <div class="row mt-2 m-0"
                    style="font-size: 8pt">
                    <div class="col-12 px-1">
                        <div class="row">
                            <div class="col">
                                Nomor Pra Registrasi
                            </div>
                            <div class="col-auto p-0">
                                :
                            </div>
                            <div class="col-7 ps-1">
                                <?= htmlentities($pendaftaran->nomor_pra_registrasi) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                Nomor Ujian
                            </div>
                            <div class="col-auto p-0">
                                :
                            </div>
                            <div class="col-7 ps-1">
                                5-0003
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                Nama Peserta
                            </div>
                            <div class="col-auto p-0">
                                :
                            </div>
                            <div class="col-7 ps-1">
                                <?= htmlentities($biodata->nama) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                Program Studi
                            </div>
                            <div class="col-auto p-0">
                                :
                            </div>
                            <div class="col-7 ps-1">
                                <?= htmlentities($program_studi->program_studi->jenjang_pendidikan->nama_pendek) ?>
                                <?= htmlentities($program_studi->program_studi->nama) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-0 mt-1">
                    <div class="col-5 px-1">
                        <div class="border border-dark p-1">
                            <img src="<?= base_url('assets/images/placeholder/300x400-fff-fff.png') ?>"
                                alt="Foto"
                                class="w-100">
                        </div>
                        <div>
                            <img src="<?= $barcode ?>" alt="barcode"
                                style="width: 119%; margin-left: -10%">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="mt-3 mb-5"
                                    style="font-size: 25pt"><?= htmlentities($kelompok->nama) ?></h2>
                            </div>
                            <div class="col-12 text-center"
                                style="font-size: 8pt;">
                                MEDAN, <?= date('d') . ' ' . bulan(date('m')) . ' ' . date('Y')  ?>
                                <br>
                                Ketua Panitia,
                            </div>
                            <div class="col-12 py-4">

                            </div>
                            <div class="col-12 text-center"
                                style="font-size: 8pt;">
                            ( Ir. Luthfi Parinduri, MM )
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <h2 style="font-size:20pt"
                    class="text-center">
                    BUKTI HADIR UJIAN
                </h2>
                <div class="row border border-dark">
                    <div class="col-12 py-2">
                        <div class="row">
                            <div class="col-12"
                                style="font-size: 8pt">
                                <div class="row">
                                    <div class="col">
                                        Lokasi Ujian
                                    </div>
                                    <div class="col-auto p-0">
                                        :
                                    </div>
                                    <div class="col-8">
                                        KAMPUS
                                        <?= htmlentities($universitas->nama_pendek) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        Hari/Tanggal
                                    </div>
                                    <div class="col-auto p-0">
                                        :
                                    </div>
                                    <div class="col-8">
                                        Sabtu, 18 September 2021
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        Pukul
                                    </div>
                                    <div class="col-auto p-0">
                                        :
                                    </div>
                                    <div class="col-8">
                                        08.00 sd. Selesai
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        Ruang
                                    </div>
                                    <div class="col-auto p-0">
                                        :
                                    </div>
                                    <div class="col-8">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mx-4 border border-dark mt-3">
                            <div class="col-6 border-bottom border-dark border-end text-center py-1"
                                style="font-size: 8pt">
                                Pengawas
                            </div>
                            <div class="col-6 border-bottom border-dark text-center py-1"
                                style="font-size: 8pt">
                                Peserta
                            </div>
                            <div class="col-6 border-end border-dark"
                                style="height: 70px"></div>
                            <div class="col-6"
                                style="height: 70px"></div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center"
                                style="font-size: 8pt">
                                Ditandatangai sewaktu ujian berlangsung
                            </div>
                        </div>
                        <div class="row mt-4"
                            style="font-size: 8pt;">
                            <div class="col-5">
                                Mata Ujian:
                                <ol class="m-0"
                                    style="padding-left: 11px">
                                    <li>Pancasila</li>
                                    <li>Bhs. Indonesia</li>
                                    <li>Bhs. Inggris</li>
                                    <li>IPA Terpadu</li>
                                </ol>
                            </div>
                            <div class="col-5 mt-4">
                                <i>Catatan :</i>
                                <p class="m-0">
                                    30 menit sebelum ujian peserta hadir
                                    untuk melihat ruang ujian
                                </p>
                            </div>
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
