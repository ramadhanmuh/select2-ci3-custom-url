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

        <title><?= $this->config->item('nama_situs') ?> - Calon Mahasiswa - Pendaftaran Tutup</title>

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
                        
                        <div class="alert alert-warning" role="alert">
                            <p class="m-0">Pendaftaran sedang tutup.</p>
                        </div>

                    </div>
                </main>

                <?php $this->load->view('template/dashboard/_footer') ?>

            </div>
        </div>

        <?php $this->load->view('template/_script') ?>

        <script src="<?= base_url('assets/scripts/pages/calon-mahasiswa/pendaftaran/formulir.js') ?>"
            defer></script>
    </body>
</html>
