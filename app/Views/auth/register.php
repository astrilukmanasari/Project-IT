<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sudutsepatu.co - Register</title>

    <link href="assets_cms/gambar/favicon1.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link rel="icon" href="<?= base_url('assets_cms/gambar/favicon-32x32.png'); ?>" type="image/x-icon">

    <link rel="icon" href="<?= base_url('assets_cms/gambar/favicon-32x32.png'); ?>" type="image/x-icon">
    <link href="<?= base_url('assets_cms/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="<?= base_url('assets_cms/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image" style="margin-top: 100px;">
                        <img src="<?= base_url('assets_cms/gambar/sudutsepatu.co.JPG'); ?>" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Daftar Akun Anda!</h1>
                            </div>

                            <?php if (session()->getFlashdata('success')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('success') ?>
                                </div>
                            <?php endif; ?>

                            <?php if (isset($validation)) : ?>
                                <div class="alert alert-danger">
                                    <?= $validation->listErrors(); ?>
                                </div>
                            <?php endif; ?>


                            <form class="user" action="<?= base_url('register') ?>" method="post">
                                <?= csrf_field() ?>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="name" placeholder="Nama Lengkap" value="<?= set_value('name') ?>">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email" placeholder="Alamat Email" value="<?= set_value('email') ?>">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" name="repeat_password" placeholder="Ulangi Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="address" placeholder="Alamat" value="<?= set_value('address') ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="phone" placeholder="No Telephone" value="<?= set_value('phone') ?>">
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Buat Akun
                                </button>
                                <hr>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('login'); ?>">Sudah Punya Akun? Masuk!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets_cms/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets_cms/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets_cms/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
    <script src="<?= base_url('assets_cms/js/sb-admin-2.min.js'); ?>"></script>
</body>

</html>