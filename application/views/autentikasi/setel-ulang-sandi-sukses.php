<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description"
            content="Berhasil mendaftarkan akun calon mahasiswa di <?= $this->config->item('nama_situs') ?>" />
        <meta name="author" content="<?= $this->config->item('author') ?>" />

        <?php $this->load->view('template/_favicon.php') ?>

        <?php $this->load->view('template/_style') ?>

        <title><?= $this->config->item('nama_situs') ?> - Setel Ulang Sandi Sukses</title>
            <?php $this->load->view('template/autentikasi/_head.php') ?>
    </head>
    <body class="bg-primary">
        <?php $this->load->view('template/autentikasi/_header') ?>

            <div class="col-lg-7 pt-5 mt-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4 text-success">
                            Setel Ulang Sandi Berhasil
                        </h3>
                    </div>
                    <div class="card-body py-5">
                        <p class="m-0 text-center">
                            Kata sandi akun anda berhasil diubah. Silahkan masuk melalui tombol berikut.
                        </p>
                        <p class="text-center mt-3">
                            <a href="<?= base_url('') ?>"
                                class="btn btn-primary">
                                <i class="fas fa-sign-in-alt"></i>
                                Masuk
                            </a>
                        </p>
                    </div>
                </div>
            </div>

        <?php $this->load->view('template/autentikasi/_footer') ?>

        <?php $this->load->view('template/_script') ?>
        
    </body>
</html>
