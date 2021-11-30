<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Halaman formulir pendaftaran calon mahasiswa" />
        <meta name="author" content="<?= $this->config->item('author') ?>" />
        <meta name="url" content="<?= base_url('') ?>" />

        <?php $this->load->view('template/_favicon') ?>

        <?php $this->load->view('template/_style') ?>

        <title><?= $this->config->item('nama_situs') ?> - Calon Mahasiswa - Pendaftaran</title>

    </head>
    <body class="sb-nav-fixed">

        <?php $this->load->view('template/calon-mahasiswa/_header') ?>

        <div id="layoutSidenav">

            <?php $this->load->view('template/calon-mahasiswa/_sidebar') ?>
            
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Pendaftaran</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Pendaftaran</li>
                        </ol>
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <strong>Selamat datang di pendaftaran mahasiswa baru.</strong> Silahkan isi formulir pendaftaran berikut ini.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <div class="card mb-3">

                            <!-- Alur -->
                            <?php $this->load->view('calon-mahasiswa/pendaftaran/_alur') ?>
                            <!-- End Of Alur -->

                        </div>

                        <div class="alert alert-danger d-none"
                            id="alert-danger-form">
                            
                        </div>

                        <div class="row position-relative">
                            <div class="col-12">
                                <!-- Form -->
                                <?php $this->load->view('calon-mahasiswa/pendaftaran/_biodata') ?>
                                <?php $this->load->view('calon-mahasiswa/pendaftaran/_unggah-berkas') ?>
                                <?php $this->load->view('calon-mahasiswa/pendaftaran/_program-studi') ?>
                                <?php $this->load->view('calon-mahasiswa/pendaftaran/_cetak-praregistrasi') ?>
                                <?php $this->load->view('calon-mahasiswa/pendaftaran/_slip-pembayaran') ?>
                                <?php $this->load->view('calon-mahasiswa/pendaftaran/_cetak-kartu-ujian') ?>
                                <!-- End of Form -->
                            </div>
                            <div class="col-12 h-100 position-absolute d-flex bg-white align-items-center justify-content-center mt-5 d-none"
                                id="form-loader">
                                <div class="spinner-border" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </main>

                <?php $this->load->view('template/dashboard/_footer') ?>

            </div>
        </div>

        <?php $this->load->view('template/_script') ?>

        <script src="<?= base_url('assets/scripts/pages/calon-mahasiswa/pendaftaran/formulir.js?v=1') ?>"
            defer></script>
    </body>
</html>
