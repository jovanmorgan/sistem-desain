<?php include 'fitur/penggunah.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'fitur/head.php'; ?>
<?php include 'fitur/nama_halaman.php'; ?>
<?php include 'fitur/nama_halaman_proses.php'; ?>

<body translate="no">
    <div class="wrapper">
        <!-- Sidebar -->
        <?php include 'fitur/sidebar.php'; ?>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.html" class="logo">
                            <img src="../../assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                                height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <?php include 'fitur/navbar.php'; ?>
                <!-- End Navbar -->
            </div>

            <div class="container">
                <div class="page-inner">
                    <?php include 'fitur/papan_halaman.php'; ?>

                    <div id="load_data">
                        <section class="section">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <!-- text penyambut -->
                                            <h2>Halaman Editor</h2>
                                            <p>Selamat datang di halaman Desain & Editan, Pada Halaman ini anda dapat
                                                mengedit data tempalate anda</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <style>
                            .box {
                                width: 100px;
                                height: 100px;
                                background-color: #007bff;
                                margin: 20px auto;
                                transition: transform 0.5s linear;
                            }

                            .spin {
                                animation: spin 1s linear infinite;
                            }

                            @keyframes spin {
                                from {
                                    transform: rotate(0deg);
                                }

                                to {
                                    transform: rotate(360deg);
                                }
                            }
                        </style>
                        <!-- Tabel Data Ketua KUB -->
                        <section class="section" id="konten">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body" style="overflow-x: hidden;">
                                            <div style="overflow-x: auto;">

                                                <main class="main-content">
                                                    <canvas id="editorCanvas" width="900" height="600"
                                                        style="border: 1px solid #ccc"></canvas>
                                                </main>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>

            <?php include 'fitur/footer.php'; ?>
        </div>

        <!-- Awal pengaturan editor -->
        <div class="custom-template">
            <div class="title">
                <h2>Pengaturan</h2>
            </div>
            <div class="custom-content">
                <div class="switcher">
                    <div class="container">

                        <hr>
                        <div class="switch-block">
                            <h4 class="text-center mb-3" style="font-weight: bold; font-size: 18px;">Latar Belakang
                            </h4>
                            <hr>

                            <!-- Rasio Latar Belakang -->
                            <div class="mb-3">
                                <label for="aspectRatio" class="form-label">Pilih Rasio Latar
                                    Belakang:</label>
                                <select id="aspectRatio" class="form-select">
                                    <option value="16:9">16:9</option>
                                    <option value="9:16">9:16</option>
                                    <option value="4:5">4:5</option>
                                    <option value="1:1">1:1</option>
                                    <option value="4:3">4:3</option>
                                </select>
                            </div>
                            <!-- Warna Latar Belakang -->
                            <div class="mb-3">
                                <label for="backgroundColor" class="form-label">Warna Latar
                                    Belakang:</label>
                                <input type="color" id="backgroundColor" name="backgroundColor"
                                    class="form-control form-control-color" />
                            </div>
                        </div>

                        <hr>

                        <div class="switch-block">
                            <h4 class="text-center mb-3" style="font-weight: bold; font-size: 18px;">Tambah Shape
                            </h4>
                            <hr>

                            <div id="shapeOptions">
                                <!-- Primary Shapes -->
                                <div class="shape-button shape-circle" data-shape="circle" draggable="true"
                                    title="Lingkaran"></div>
                                <div class="shape-button shape-rectangle" data-shape="rectangle" draggable="true"
                                    title="Persegi Panjang"></div>
                                <div class="shape-button shape-triangle" data-shape="triangle" draggable="true"
                                    title="Segitiga"></div>

                                <!-- Additional Shapes -->
                                <div id="additionalShapes">
                                    <div class="shape-button shape-equilateral" data-shape="equilateral"
                                        draggable="true" title="Segitiga Sama Sisi"></div>
                                    <div class="shape-button shape-isosceles" data-shape="isosceles" draggable="true"
                                        title="Segitiga Sama Kaki"></div>
                                    <div class="shape-button shape-hexagon" data-shape="hexagon" draggable="true"
                                        title="Segi Enam"></div>
                                    <div class="shape-button shape-pentagon" data-shape="pentagon" draggable="true"
                                        title="Segi Lima"></div>
                                    <div class="shape-button shape-oval" data-shape="oval" draggable="true"
                                        title="Oval"></div>
                                </div>

                                <!-- Show More Button -->
                                <span id="showMoreShapes">Pilih Shape Lainnya</span>

                                <!-- Warna Elemen -->
                                <div class="mb-3">
                                    <label for="elementColor" class="form-label">Warna
                                        Elemen:</label>
                                    <input type="color" id="elementColor" name="elementColor"
                                        class="form-control form-control-color" />
                                </div>

                                <!-- Transparansi -->
                                <div class="mb-3">
                                    <label for="opacitySlider" class="form-label">Transparansi:</label>
                                    <input type="range" id="opacitySlider" min="0" max="100" value="100"
                                        class="form-range" />
                                    <span id="opacityValue" class="fw-bold">100</span>%
                                </div>

                                <!-- Ukuran Shape -->
                                <div class="mb-3">
                                    <label for="shapeSize" class="form-label">Ukuran Shape:</label>
                                    <input type="range" id="shapeSize" min="20" max="150" value="50" class="form-range">
                                    <span id="sizeValue" class="fw-bold">50</span> px
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="switch-block">
                            <h4 class="text-center mb-3" style="font-weight: bold; font-size: 18px;">Border (Tepian)
                            </h4>
                            <hr>
                            <!-- Aktifkan Border -->
                            <div class="form-check form-switch mb-3">
                                <input type="checkbox" id="borderActive" name="borderActive" class="form-check-input">
                                <label for="borderActive" class="form-check-label">Aktifkan
                                    Border</label>
                            </div>

                            <!-- Warna & Ukuran Border -->
                            <div class="mb-3">
                                <label for="borderColor" class="form-label">Warna
                                    Border:</label>
                                <input type="color" id="borderColor" name="borderColor"
                                    class="form-control form-control-color" />
                            </div>

                            <div class="mb-3">
                                <label for="borderSize" class="form-label">Ukuran
                                    Border:</label>
                                <input type="range" id="borderSize" name="borderSize" min="0" max="10" value="0"
                                    class="form-range" />
                                <span id="borderSizeValue" class="fw-bold">0</span> px
                            </div>
                        </div>
                        <hr>
                        <div class="switch-block">
                            <h4 class="text-center mb-3" style="font-weight: bold; font-size: 18px;">Tambahkan Text</h4>
                            <hr>
                            <!-- Masukkan Teks -->
                            <div class="mb-3">
                                <label for="textInput" class="form-label">Masukkan Teks:</label>
                                <input type="text" id="textInput" class="form-control" placeholder="Teks baru...">
                                <button id="addTextBtn" type="button" class="btn btn-primary mt-2">Tambah Teks</button>
                            </div>
                            <!-- Pilihan Font -->
                            <div class="mb-3">
                                <label for="textFont" class="form-label">Pilih Font:</label>
                                <select id="textFont" class="form-select">
                                    <!-- Font options will be added dynamically -->
                                </select>
                            </div>
                            <!-- Warna dan Ukuran Teks -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="textColor" class="form-label">Warna Teks:</label>
                                    <input type="color" id="textColor" class="form-control form-control-color">
                                </div>
                                <div class="col-md-6">
                                    <label for="textSize" class="form-label">Ukuran Font:</label>
                                    <input type="range" id="textSize" min="10" max="100" value="30" class="form-range">
                                    <span id="textSizeValue" class="fw-bold">30</span> px
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="switch-block">
                            <h4 class="text-center mb-3" style="font-weight: bold; font-size: 18px;">Tambahkan
                                Gambar
                            </h4>
                            <hr>
                            <!-- Tambah Gambar -->
                            <div class="mb-3">
                                <label for="imageInput" class="form-label">Tambah
                                    Gambar:</label>
                                <input type="file" id="imageInput" accept="image/*" class="form-control">
                                <button id="deleteImage" type="button" class="btn btn-danger mt-2">Hapus
                                    Gambar</button>
                            </div>

                            <!-- Ukuran Gambar -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="imageWidth" class="form-label">Lebar:</label>
                                    <input type="range" id="imageWidth" min="10" max="800" value="100"
                                        class="form-range">
                                    <span id="imageWidthValue" class="fw-bold">100</span> px
                                </div>
                                <div class="col-md-6">
                                    <label for="imageHeight" class="form-label">Tinggi:</label>
                                    <input type="range" id="imageHeight" min="10" max="800" value="100"
                                        class="form-range">
                                    <span id="imageHeightValue" class="fw-bold">100</span> px
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="switch-block">
                            <h4 class="text-center mb-3" style="font-weight: bold; font-size: 18px;">Melukis
                            </h4>
                            <hr>
                            <div class="row gy-3">
                                <!-- Activate Drawing -->
                                <div class="col-md-4">
                                    <label class="form-label">
                                        <input type="checkbox" id="activateDrawing" class="form-check-input me-2">
                                        Enable Drawing
                                    </label>
                                </div>
                                <!-- Drawing Mode -->
                                <div class="col-md-4">
                                    <label for="drawingMode" class="form-label">Drawing Mode</label>
                                    <select id="drawingMode" class="form-select">
                                        <option value="pencil">Pencil</option>
                                        <option value="circle">Circle</option>
                                        <option value="spray">Spray</option>
                                    </select>
                                </div>
                                <!-- Drawing Color -->
                                <div class="col-md-4">
                                    <label for="drawingColor" class="form-label">Drawing Color</label>
                                    <input type="color" id="drawingColor" class="form-control form-control-color"
                                        value="#000000">
                                </div>
                                <!-- Shadow Color -->
                                <div class="col-md-4">
                                    <label for="drawingShadowColor" class="form-label">Shadow Color</label>
                                    <input type="color" id="drawingShadowColor" class="form-control form-control-color"
                                        value="#000000">
                                </div>
                                <!-- Line Width -->
                                <div class="col-md-4">
                                    <label for="lineWidth" class="form-label">Line Width</label>
                                    <input type="range" id="lineWidth" class="form-range" min="1" max="10" value="2">
                                </div>
                                <!-- Shadow Width -->
                                <div class="col-md-4">
                                    <label for="shadowWidth" class="form-label">Shadow Width</label>
                                    <input type="range" id="shadowWidth" class="form-range" min="0" max="10" value="0">
                                </div>
                                <!-- Shadow Offset -->
                                <div class="col-md-4">
                                    <label for="shadowOffset" class="form-label">Shadow Offset</label>
                                    <input type="range" id="shadowOffset" class="form-range" min="0" max="10" value="0">
                                </div>
                                <!-- Clear Canvas -->
                                <div class="col-md-12 text-center">
                                    <button id="clearCanvas" class="btn btn-danger">Clear Canvas</button>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="switch-block">
                            <h4 class="text-center mb-3" style="font-weight: bold; font-size: 18px;">Pengaturan
                                Umum
                            </h4>
                            <hr>
                            <div class="icon-grid">
                                <button class="icon-btn bg-primary" id="copy" title="Copy">
                                    <i class="fas fa-copy"></i>
                                </button>
                                <button class="icon-btn bg-success" id="paste" title="Paste">
                                    <i class="fas fa-paste"></i>
                                </button>
                                <button class="icon-btn bg-danger" id="cut" title="Cut">
                                    <i class="fas fa-cut"></i>
                                </button>
                                <button class="icon-btn bg-info" id="undo" title="Undo">
                                    <i class="fas fa-undo"></i>
                                </button>
                                <button class="icon-btn bg-warning" id="redo" title="Redo">
                                    <i class="fas fa-redo"></i>
                                </button>
                                <button class="icon-btn bg-secondary" id="naikan" title="Lapisan Paling Atas">
                                    <i class="bx bx-layer-plus"></i> <!-- Ikon Lapisan Atas -->
                                </button>
                                <button class="icon-btn bg-dark" id="turunkan" title="Lapisan Paling Bawah">
                                    <i class="bx bx-layer-minus"></i> <!-- Ikon Lapisan Bawah -->
                                </button>
                                <button class="icon-btn bg-danger" id="delate" title="delate">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                <button class="icon-btn bg-secondary" id="keatas" title="Keatas">
                                    <i class="fas fa-arrow-circle-up"></i>
                                </button>
                                <button class="icon-btn bg-secondary" id="kebawa" title="Kebawa">
                                    <i class="fas fa-arrow-circle-down"></i>
                                </button>
                                <button class="icon-btn bg-secondary" id="kekiri" title="Kekiri">
                                    <i class="fas fa-arrow-circle-left"></i>
                                </button>
                                <button class="icon-btn bg-secondary" id="kekanan" title="Kekanan">
                                    <i class="fas fa-arrow-circle-right"></i>
                                </button>
                            </div>
                        </div>
                        <hr>
                        <button id="saveBtn2" type="button" class="btn btn-success w-100">Simpan
                            Gambar</button>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
            <div class="custom-toggle">
                <i class="icon-settings"></i>
            </div>
        </div>
        <!-- akhir pengaturan editor -->


    </div>
    <style>
        .icon-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            justify-items: center;
            margin: 20px 0;
        }

        .icon-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 20px;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .icon-btn:hover {
            transform: scale(1.1);
        }

        .bg-primary {
            background-color: #007bff;
        }

        .bg-success {
            background-color: #28a745;
        }

        .bg-danger {
            background-color: #dc3545;
        }

        .bg-info {
            background-color: #17a2b8;
        }

        .bg-warning {
            background-color: #ffc107;
        }

        .bg-secondary {
            background-color: #6c757d;
        }

        .bg-dark {
            background-color: #343a40;
        }
    </style>
    <script>
        // konten
        const konten = document.getElementById("konten");
        const toggleSpinBtn = document.getElementById("toggleSpinBtn");
        let isSpinning = false;

        toggleSpinBtn.addEventListener("click", () => {
            isSpinning = !isSpinning;
            if (isSpinning) {
                konten.classList.add("spin");
                // toggleSpinBtn.textContent = "Stop Spinning";
            } else {
                konten.classList.remove("spin");
                // toggleSpinBtn.textContent = "Start Spinning";
            }
        });
        //  akhir konten

        document.getElementById('backgroundColor').addEventListener('input', function() {
            document.getElementById('backgroundColor').style.backgroundColor = this.value;
        });

        document.getElementById('elementColor').addEventListener('input', function() {
            document.getElementById('elementColor').style.backgroundColor = this.value;
        });

        document.getElementById('borderColor').addEventListener('input', function() {
            document.getElementById('borderColor').style.backgroundColor = this.value;
        });

        document.getElementById('textColor').addEventListener('input', function() {
            document.getElementById('textColor').style.backgroundColor = this.value;
        });

        function openEditModal(id, id_kub, nama_lengkap, username, password) {
            let editModal = new bootstrap.Modal(document.getElementById('editModal'));
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_id_kub').value = id_kub;
            document.getElementById('edit_nama_lengkap').value = nama_lengkap;
            document.getElementById('edit_username').value = username;
            document.getElementById('edit_password').value = password;
            editModal.show();
        }
    </script>

    <?php include 'fitur/js.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.2.4/fabric.min.js"></script>
    <script src="../../assets/js/editor.js?v=<?= time(); ?>"></script>
</body>

</html>