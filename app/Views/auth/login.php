<!-- Begin Page Content -->

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">


                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>

                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">SIMAK SIMULASI</h1>
                                        <br>
                                    </div>
                                    <!-- Validation -->
                                    <?= view('validation/flashData') ?>
                                    <form class="user" action="<?= base_url('Auth/Login') ?>" method="POST">
                                        <div class="form-group">
                                            <label for="username_param">Username</label>
                                            <input autofocus type="text" class="form-control form-control-user" id="username_param" name="username_param" placeholder="Masukan Username...">
                                        </div>
                                        <div class="form-group">
                                            <label for="password_param">Kata Sandi</label>
                                            <input type="password" class="form-control form-control-user" id="password_param" name="password_param" placeholder="Masukan Kata Sandi...">
                                        </div>
                                        <hr>
                                        <button type="submit" name="buttonLogin" class="btn btn-primary btn-user btn-block">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</body>
<!-- End of Main Content -->