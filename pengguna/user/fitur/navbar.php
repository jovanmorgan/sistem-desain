<?php
// Lakukan koneksi ke database
include '../../keamanan/koneksi.php';
include 'nama_halaman.php';
// Periksa apakah session id_user telah diset
if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];

    // Query SQL untuk mengambil data user berdasarkan id_user dari session
    $query = "SELECT * FROM user WHERE id_user = '$id_user'";
    $result = mysqli_query($koneksi, $query);

    // Periksa apakah query berhasil dieksekusi
    if ($result) {
        // Periksa apakah terdapat data user
        if (mysqli_num_rows($result) > 0) {
            // Ambil data user sebagai array asosiatif
            $user = mysqli_fetch_assoc($result);
?>
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="white">
                        <a href="index.html" class="logo">
                            <img src="../../assets/img/desain/logo2.png" alt="navbar brand" class="navbar-brand" width="150" />
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
                <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
                    data-background-color="white">
                    <div class="container-fluid">
                        <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pe-1">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                </div>
                                <form class="search-form d-flex align-items-center" method="POST" action="fitur/search.php">
                                    <input type="text" name="query" placeholder="Search ..." class="form-control" />
                                </form>
                            </div>
                        </nav>

                        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                            <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                    aria-expanded="false" aria-haspopup="true">
                                    <i class="fa fa-search"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-search animated fadeIn">
                                    <form class="search-form d-flex align-items-center" method="POST" action="fitur/search.php">
                                        <div class="input-group">

                                            <input type="text" name="query" placeholder="Search ..." class="form-control" />
                                        </div>
                                    </form>
                                </ul>
                            </li>

                            <!-- muncul saat berada dibagian halaman edit desain-->

                            <!-- Hilangkan tombol tambah jika di halaman Pendaftar -->
                            <?php if ($page_title == "Desain Dan Editan"): ?>
                                <!-- bagian undo -->
                                <li class="nav-item topbar-icon hidden-caret">
                                    <button class="nav-link" id="nav-undo" title="Undo">
                                        <i class="fas fa-undo"></i>
                                    </button>
                                </li>
                                <!-- bagin redo -->
                                <li class="nav-item topbar-icon hidden-caret">
                                    <button class="nav-link" id="nav-redo" title="Redo">
                                        <i class="fas fa-redo"></i>
                                    </button>
                                </li>
                                <!-- bagian copy -->
                                <li class="nav-item topbar-icon hidden-caret">
                                    <button class="nav-link" id="nav-copy" title="Copy">
                                        <i class="fa fa-copy"></i>
                                    </button>
                                </li>
                                <!-- bagian paste -->
                                <li class="nav-item topbar-icon hidden-caret">
                                    <button class="nav-link" id="nav-paste" title="Paste">
                                        <i class="fa fa-paste"></i>
                                    </button>
                                </li>
                                <!-- bagian cut -->
                                <li class="nav-item topbar-icon hidden-caret">
                                    <button class="nav-link" id="nav-cut" title="Cut">
                                        <i class="fa fa-cut"></i>
                                    </button>
                                </li>
                                <!-- bagian naikan ke lapisan paling atas -->
                                <li class="nav-item topbar-icon hidden-caret">
                                    <button class="nav-link" id="nav-naikan-lapisan" title="Naikan">
                                        <i class="bx bx-layer-plus"></i>
                                    </button>
                                </li>
                                <!-- bagian turunkan ke lapisan paling bawa -->
                                <li class="nav-item topbar-icon hidden-caret">
                                    <button class="nav-link" id="nav-turukan-lapisan" title="Turunkan">
                                        <i class="bx bx-layer-minus"></i>
                                    </button>
                                </li>
                                <!-- bagian hapus -->
                                <li class="nav-item topbar-icon hidden-caret">
                                    <button class="nav-link" id="nav-delate" title="Delate">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </li>
                                <!-- bagian ke atas -->
                                <li class="nav-item topbar-icon hidden-caret">
                                    <button class="nav-link" id="nav-keatas" title="Ke atas">
                                        <i class="fa fa-arrow-circle-up"></i>
                                    </button>
                                </li>
                                <!-- bagian kebawa -->
                                <li class="nav-item topbar-icon hidden-caret">
                                    <button class="nav-link" id="nav-kebawa" title="Ke bawa">
                                        <i class="fa fa-arrow-circle-down"></i>
                                    </button>
                                </li>
                                <!-- bagian kekiri -->
                                <li class="nav-item topbar-icon hidden-caret">
                                    <button class="nav-link" id="nav-kekiri" title="Ke kiri">
                                        <i class="fa fa-arrow-circle-left"></i>
                                    </button>
                                </li>
                                <!-- bagian kekanan -->
                                <li class="nav-item topbar-icon hidden-caret">
                                    <button class="nav-link" id="nav-kekanan" title="Ke kekanan">
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </button>
                                </li>
                            <?php endif; ?>


                            <li class="nav-item topbar-user dropdown hidden-caret">
                                <a class="dropdown-toggle profile-pic" id="dropdownProfile" href="#">
                                    <div class="avatar-sm">
                                        <?php if (!empty($user['fp'])): ?>
                                            <img src="../../assets/img/fp_pengguna/user/<?php echo $user['fp']; ?>" alt="..."
                                                class="avatar-img rounded-circle" />
                                        <?php else: ?>
                                            <img src="../../assets/img/avatar/avatar.png" alt="..." class="avatar-img rounded-circle" />
                                        <?php endif; ?>
                                    </div>
                                    <span class="profile-username">
                                        <span class="op-7">Hay,</span>
                                        <span class="fw-bold"><?php echo $user['nama_lengkap']; ?></span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-user" id="dropdownMenu">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                        <li>
                                            <div class="user-box">
                                                <div class="avatar-lg">
                                                    <?php if (!empty($user['fp'])): ?>
                                                        <img src="../../assets/img/fp_pengguna/user/<?php echo $user['fp']; ?>"
                                                            alt="image profile" class="avatar-img rounded" />
                                                    <?php else: ?>
                                                        <img src="../../assets/img/avatar/avatar.png" alt="..." alt="image profile"
                                                            class="avatar-img rounded" />
                                                    <?php endif; ?>
                                                </div>
                                                <div class="u-text text-white">
                                                    <span class="op-7">Hay,</span>
                                                    <span class="fw-bold"><?php echo $user['nama_lengkap']; ?></span>

                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="profile">My Profile</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="log_out">Logout</a>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    const dropdownToggle = document.getElementById("dropdownProfile");
                    const dropdownMenu = document.getElementById("dropdownMenu");

                    // Toggle dropdown menu visibility
                    dropdownToggle.addEventListener("click", (e) => {
                        e.preventDefault();
                        dropdownMenu.classList.toggle("show");
                    });

                    // Close the dropdown menu when clicking outside
                    document.addEventListener("click", (e) => {
                        if (!dropdownToggle.contains(e.target) && !dropdownMenu.contains(e.target)) {
                            dropdownMenu.classList.remove("show");
                        }
                    });
                });
            </script>
<?php
        } else {
            // Jika tidak ada data user
            echo "Tidak ada data user.";
        }
    } else {
        // Jika query tidak berhasil dieksekusi
        echo "Gagal mengambil data user: " . mysqli_error($koneksi);
    }
} else {
    // Jika session id_user tidak diset
    echo "Session id_user tidak tersedia.";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
?>