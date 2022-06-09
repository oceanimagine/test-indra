<!DOCTYPE HTML>
<html>
    <head>
        <title>Klasterisasi Untuk Menentukan Tingkat Risiko Penyebaran COVID-19 di Jakarta Pusat</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <!-- Custom fonts for this template-->
        <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

        <!-- Custom styles for this template-->
        <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet" />
    </head>
    
    <body class="" style="background: linear-gradient(#5f0a87, #a4508b);">
        <nav class="navbar navbar-expand-lg navbar-dark bg-white shadow-lg pb-3 pt-3 font-weight-bold">
            <div class="container">
                <a class="navbar-brand" style="font-weight: 900; color: #4A235A; white-space: normal;" href="<?php echo base_url() ?>"> <i class="fa fa-database mr-2 rotate-n-15"></i>Klasterisasi Untuk Menentukan Tingkat Risiko Penyebaran COVID-19</a>
            </div>
        </nav>

        <div class="container">
            <!-- Outer Row -->
            <div class="row d-plex justify-content-between mt-5">

                
				
				<div class="col-xl-5 col-lg-5 col-md-5 mt-5">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Login Account</h1>
                                        </div>
                                        <?php echo form_open('Login',array('class' => 'form-vertical user')); ?>
                                            <div class="form-group">
                                                <input autocomplete="off" name="username" type="text" class="form-control form-control-user" id="exampleInputUser" required="" placeholder="Username" />
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" required="" placeholder="Password" />
                                            </div>
                                            <button type="submit" class="btn btn-block btn-user" style="background-color: #4A235A;"><i class="fas fa-fw fa-sign-in-alt mr-1"></i><span style="color: white;"> Masuk</span></button>
                                        <?php echo form_close(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				
				<div class="col-xl-6 col-lg-6 col-md-6 mt-5">
                    <div class="card bg-none o-hidden border-0 my-5 text-white" style="background: none;">
                        <div class="card-body p-0">
                            <h4 style="font-weight: 800;">Penerapan Klasterisasi Menentukan Tingkat Risiko Penyebaran COVID-19 Menggunakan Algoritma K-Medodis di Jakarta Pusat</h4>
							<p class="text-justify">
                            Peningkatan kasus COVID-19 yang kian semakin tinggi membuat pemerintah melakukan penanganan untuk memberhentikan angkat kenaikan kasus COVID-19 dengan melakukan pembatasan bersekala demi memperkecil peningkatan kasus. Provinsi DKI Jakarta menjadi kluster tertinggi dalam kasus terkonfirmasi COVID-19, khususnya di kota Jakarta Pusat
							</p><p class="text-justify">
							Algoritma K-Medoids diusulkan pada tahun 1987 dan menggunakan metode partisi clustering untuk mengelompokkan sekumpulan n objek menjadi sejumlah cluster. Algoritma ini menggunakan objek pada kumpulan objek untuk mewakili sebuah cluster. Objek yang terpilih untuk mewakili sebuah cluster disebut dengan medoid.
							</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>
    </body>
</html>
