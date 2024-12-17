<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="slide navbar style.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap?v=<?= time(); ?>" rel="stylesheet">
    <title>Register</title>
    <link href="../css/login_register.css?<?= time(); ?>" rel="stylesheet" />
    <link rel="shortcut icon" href="../assets/img/desain/logo.jpg" type="" />
    <!-- Link untuk Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css?v=<?= time(); ?>">
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <a href="login">
                <h2 class="inactive underlineHover">Sign In</h2>
            </a>
            <a href="register">
                <h2 class="active">Sign Up</h2>
            </a>

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="../assets/img/desain/register.png" id="icon" alt="User Icon"
                    style="width: 150px; margin-right: 25px" />
            </div>

            <!-- Login Form -->
            <form id="registrasi">
                <!-- Nama Lengkap -->
                <div class="input-wrapper">
                    <input type="text" id="login" class="fadeIn second" name="nama_lengkap"
                        placeholder="Nama Lengkap Anda" required />
                    <i class="fas fa-user input-icon"></i>
                </div>

                <!-- Username -->
                <div class="input-wrapper">
                    <input type="text" id="username" class="fadeIn third" name="username"
                        placeholder="Username Contoh: User123" required />
                    <i class="fas fa-user-tag input-icon"></i>
                </div>

                <!-- Password -->
                <div class="input-wrapper">
                    <input type="password" id="password" class="fadeIn third" name="password"
                        placeholder="Password Contoh: User1234" required />
                    <i class="fas fa-lock input-icon"></i>
                    <i class="fas fa-eye toggle-password" onclick="togglePasswordVisibility('password')"></i>
                </div>

                <input type="submit" class="fadeIn fourth" value="Sign Up" style="cursor: pointer" />
            </form>

            <!-- Remind Passowrd -->
            <!-- <div id="formFooter">
          <a class="underlineHover" href="#">Forgot Password?</a>
        </div> -->
        </div>
    </div>
    <!-- End footer -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    function togglePasswordVisibility(inputId) {
        var passwordInput = document.getElementById(inputId);
        var passwordIcon = document.querySelector(
            "#" + inputId + " + .show-password"
        );

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordIcon.classList.remove("fa-eye-slash");
            passwordIcon.classList.add("fa-eye");
        } else {
            passwordInput.type = "password";
            passwordIcon.classList.remove("fa-eye");
            passwordIcon.classList.add("fa-eye-slash");
        }
    }

    document
        .getElementById("registrasi")
        .addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent the form from submitting by default

            // Get the form element
            var form = this;

            // Ambil data dari form
            var formData = new FormData(form);

            // Cek apakah semua input diisi
            var nama = formData.get("nama");
            var password = formData.get("password");
            var username = formData.get("username");

            if (
                nama === "" ||
                password === "" ||
                username === ""
            ) {
                Swal.fire("Error", "Semua data wajib diisi", "error");
                return; // Stop the submission process if any input is empty
            }

            // Kirim data menggunakan AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../keamanan/proses_register", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Tampilkan SweetAlert berdasarkan respon dari ../keamanan/proses_register_pengunjung
                        var response = xhr.responseText;
                        if (response.trim() === "success") {
                            // Reset the form after successful submission
                            form.reset();
                            Swal.fire({
                                title: "Success",
                                text: "Akun Anda berhasil di Buat",
                                icon: "success"
                            }).then(() => {
                                window.location.href = "login";
                            })
                        } else if (response.trim() === "error_username_exists") {
                            Swal.fire("Akun sudah ada!", "Akun ini sudah terdaftar!, Silakan gunakan akun lain",
                                "info");
                        } else if (response.trim() === "error_password_length") {
                            Swal.fire("Password Salah!", "Password harus memiliki minimal 8 karakter", "info");
                        } else if (response.trim() === "error_password_strength") {
                            Swal.fire("Password Salah!",
                                "Password harus mengandung huruf besar, huruf kecil, dan angka", "info"
                            );
                        } else {
                            Swal.fire("Error", "Terjadi kesalahan saat proses login", "error");
                        }
                    } else {
                        Swal.fire("Error", "Gagal melakukan request", "error");
                    }
                }
            };
            xhr.onerror = function() {
                Swal.fire("Error", "Gagal melakukan request", "error");
            };
            xhr.send(formData);
        });
    </script>
</body>

</html>