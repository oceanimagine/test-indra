<div class="hero-v1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mr-auto text-center text-lg-left">
                <span class="d-block subheading">About</span>
                <h1 class="heading mb-3">About Us</h1>
                <p class="mb-5">Website untuk mengklasterisasi dalam mengetahui tingkat penyebaran COVID-19 dengan menggunakan Algoritma K-Medoids di Jakarta Pusat</p>
                



            </div>
            <div class="col-lg-6">
                <figure class="illustration">
                    <img src="<?= base_url('assets/home/') ?>images/illustration.png" alt="Image" class="img-fluid">
                </figure>
            </div>

        </div>
    </div>
</div>


<!-- MAIN -->




<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <figure class="img-play-vid">
                    <img src="<?= base_url('assets/home/') ?>images/cerita_korona.png" alt="Image" class="img-fluid">
                    <div class="absolute-block d-flex">
                    <span class="text">Cerita Si Corona</span>
                        <a href="https://www.youtube.com/watch?v=ciRwAED2mVs" data-fancybox class="btn-play">
                            <span class="icon-play"></span>
                        </a>
                    </div>
                </figure>
            </div>
            <div class="col-lg-5 ml-auto">
                <h2 class="mb-4 section-heading">Apa Itu Coronavirus dan COVID-19?</h2>
                <p>Coronavirus Disease 2019 atau Covid-19 adalah penyakit baru yang dapat menyebabkan gangguan pernapasan dan radang paru. Penyakit ini disebabkan oleh infeksi Severe Acute Respiratory Syndrome Coronavirus 2 (SARS-CoV-2). Gejala klinis yang muncul beragam, mulai dari seperti gejala flu biasa (batuk, pilek, nyeri tenggorok, nyeri otot, nyeri kepala) sampai yang berkomplikasi berat (pneumonia atau sepsis) atau bahkan tidak bergejala sama sekali.</p>
                <ul class="list-check list-unstyled mb-5">
                    <p>Orang dengan Covid-19 memiliki berbagai gejala yang dilaporkan - mulai dari gejala ringan hingga penyakit parah. Gejala dapat muncul 2-14 hari setelah terpapar virus. Orang dengan gejala di bawah ini mungkin memiliki Covid-19: </p>
                    <li>Demam atau Kedinginan</li>
                    <li>Batuk</li>
                    <li>Napas Pendek atau Sulit Bernapas</li>
                    <li>Kelelahan</li>
                    <li>Otot atau Sakit Tubuh</li>
                    <li>Sakit Kepala</li>
                    <li>Kehilangan rasa atau Bau Baru</li>
                    <li>Sakit Tenggorokan</li>
                    <li>Hidung Tersumbat atau Berair</li>
                    <li>Mual atau Muntah</li>
                    <li>Diare</li>
                </ul>
                <p><a href="#" class="btn btn-primary">Learn more</a></p>
            </div>
        </div>
    </div>
</div>

<div class="site-section stats">
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-7 text-center mx-auto">
                <h2 class="section-heading">Data Pemantauan COVID-19</h2>
                <p>Data Pemantauan Kasus COVID-19 di Jakarta Pusat</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="data">
                    <span class="icon text-primary">
                        <span class="flaticon-virus"></span>
                    </span>
                    <strong class="d-block number"><?= number_format($sum_positif, 0, "", ",") ?></strong>
                    <span class="label">Positif</span>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="data">
                    <span class="icon text-primary">
                        <span class="flaticon-virus"></span>
                    </span>
                    <strong class="d-block number"><?= number_format($sum_sembuh, 0, "", ",") ?></strong>
                    <span class="label">Sembuh</span>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="data">
                    <span class="icon text-primary">
                        <span class="flaticon-virus"></span>
                    </span>
                    <strong class="d-block number"><?= number_format($sum_meninggal, 0, "", ",") ?></strong>
                    <span class="label">Meninggal</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-7 mx-auto text-center">
            <span class="subheading">Apa yang dibutuhkan </span>
                <h2 class="mb-4 section-heading">Untuk Melindungi Diri Sendiri</h2>
                <p> Virus corona kini tengah meneror beberapa negara di dunia, termasuk Indonesia. Kondisi ini membuat banyak orang merasa takut dan cemas. beberapa cara untuk melindungi diri sendiri, berikut caranya:</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 ">
                <div class="row mt-5 pt-5">
                    <div class="col-lg-6 do ">
                        <h3>Yang Seharusnya Dilakukan</h3>
                        <ul class="list-unstyled check">
                            <li>Menetap Di Rumah</li>
                            <li>Memakai Masker</li>
                            <li>Menggunakan Sanitizer</li>
                            <li>Disinfectan Rumah </li>
                            <li>Mencuci Tangan</li>
                 
                        </ul>
                    </div>
                    <div class="col-lg-6 dont ">
                        <h3>Yang Seharusnya Dihindari</h3>
                        <ul class="list-unstyled cross">
                            <li>Hindari Orang Yang Terinfeksi</li>
                            <li>Hindari Berjabat Tangan</li>
                            <li>Jangan Menyentuh Wajah</li>
                            <li>Permukaan Yang Terinfeksi Virus</li>
                            <li>Berkerumunan</li>
                    
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="<?= base_url('assets/home/') ?>images/protect.png" alt="Image" class="img-fluid">
            </div>
        </div>
    </div>
</div>