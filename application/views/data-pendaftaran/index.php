<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description"
            content="Pendaftaran akun calon mahasiswa di situs <?= $this->config->item('nama_situs') ?>" />
        <meta name="author" content="<?= $this->config->item('author') ?>" />

        <?php $this->load->view('template/_style') ?>
        <link href="<?= base_url('vendor/jquery-steps/') ?>demo/css/jquery.steps.css" rel="stylesheet">
        <link href="<?= base_url('vendor/jquery-steps/') ?>demo/css/main.css" rel="stylesheet">
        <link href="<?= base_url('vendor/jquery-steps/') ?>demo/css/normalize.css" rel="stylesheet">

        <title><?= $this->config->item('nama_situs') ?> - Daftar</title>
            <?php $this->load->view('template/autentikasi/_head.php') ?>
    </head>
    <style type="text/css">
        /* Adjust the height of section */
        #form-data-pendaftaran .content {
            min-height: 100px;
        }
        #form-data-pendaftaran .content > .body {
            width: 100%;
            height: auto;
            padding: 15px;
            position: relative;
        }

        @media (max-width: 1023px) {
            .wizard > .steps > ul > li {
                width: 100%;
            }
        }
    </style>
    <body class="bg-primary">
        <?php $this->load->view('template/autentikasi/_header') ?>

            <div class="col-lg-12">
                <div class="card shadow-lg border-0 rounded-lg mt-3 mt-lg-4">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Lengkapi Data Pendaftaran</h3></div>
                        <div class="card-body">
                            <form id="form-data-pendaftaran"
                                method="post">
                                <?php $this->load->view('data-pendaftaran/data-calon-mahasiswa') ?>
                                <?php $this->load->view('data-pendaftaran/alamat') ?>
                                <h3>Berkas-Berkas</h3>
                                <section>
                                    <p>The next and previous buttons help you to navigate through your content.</p>
                                </section>
                                <h3>Program Studi</h3>
                                <section>
                                    <p>The next and previous buttons help you to navigate through your content.</p>
                                </section>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <?php $this->load->view('template/autentikasi/_footer') ?>

        <?php $this->load->view('template/_script') ?>
        <script src="<?= base_url('vendor/jQuery/jquery.min.js') ?>"></script>
        <script src="<?= base_url('vendor/jquery-cookie/jquery.cookie.min.js') ?>"></script>
        <script src="<?= base_url('vendor/jquery-steps/build/jquery.steps.min.js') ?>"></script>
        <script src="<?= base_url('') ?>assets/scripts/data-pendaftaran.js"></script>
    </body>
</html>
