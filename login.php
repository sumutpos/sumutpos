<?php require_once('init.php'); ?>

<?php
$errors = array();
$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['username']) ? trim($_POST['password']) : '';

if(isset($_POST['submit'])):
	
	// Validasi
	if(!$username) {
		$errors[] = 'Username tidak boleh kosong';
	}
	if(!$password) {
		$errors[] = 'Password tidak boleh kosong';
	}
	
	if(empty($errors)):
		$query = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'");
		$cek = mysqli_num_rows($query);
		$data = mysqli_fetch_array($query);
		
		if($cek > 0){
			$hashed_password = sha1($password);
			if($data['password'] === $hashed_password) {
				$_SESSION["user_id"] = $data["id_user"];
				$_SESSION["username"] = $data["username"];
				$_SESSION["role"] = $data["role"];
				redirect_to("index.php");
			} else {
				$errors[] = 'Username atau password salah!';
			}
		} else {
			$errors[] = 'Username atau password salah!';
		}
		
	endif;

endif;	
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Sistem Pendukung Keputusan Metode SAW</title>

        <!-- Custom fonts for this template-->
        <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

        <!-- Custom styles for this template-->
        <link href="css/css2/sb-admin-2.min.css" rel="stylesheet" />
        <link rel="shortcut icon" href="logo2.png" type="image/x-icon">
        <link rel="icon" href="logo2.png" type="image/x-icon">

        <style>
            .bg-purple-dark {
                background-color: #003b7b; /* Warna ungu tua */
            }
        </style>
    </head>

   <body class="bg-purple-dark">
    <nav class="navbar navbar-expand-lg navbar-dark bg-white shadow-lg pb-3 pt-3 font-weight-bold">
        <div class="container justify-content-center">
            <a class="navbar-brand text-center" style="font-weight: 900; color: #003b7b;" href="login.php">
                <i></i> <img width="30px" src="logo2.png" alt="Deskripsi Gambar">
                Sistem Pendukung Keputusan Pemilihan Karyawan terbaik
            </a>
        </div>
    </nav>
</body>


        <div class="container">
            <!-- Outer Row -->
            <div class="row justify-content-center mt-5">
                <div class="col-xl-6 col-lg-6 col-md-8 mt-2">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">


                                        <div class="text-center">
                                             <img width="150px" src="logo2.png">
                                             <br>
                                            <h1 class="h4 text-gray-900 mb-4">Login Account</h1>
                                        </div>
                                        <?php if(!empty($errors)): ?>
                                            <?php foreach($errors as $error): ?>
                                                <div class="alert alert-danger text-center"><?php echo $error; ?></div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>  
                                        <form class="user" action="login.php" method="post">
                                            <div class="form-group">
                                                <input required autocomplete="off" type="text" value="<?php echo htmlentities($username); ?>" class="form-control form-control-user" id="exampleInputUser" placeholder="Username" name="username" />
                                            </div>
                                            <div class="form-group">
                                                <input required autocomplete="off" type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Password" />
                                            </div>
                                            <button name="submit" type="submit" class="btn btn-warning btn-user btn-block"><i class="fas fa-fw fa-sign-in-alt mr-1"></i> Masuk</button>
                                        </form>


<br>
                                        <div class="text-center">
    <a class="small" href="forgot-password.php">Forgot Password?</a>
</div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="assets/js/sb-admin-2.min.js"></script>
    </body>
</html>
