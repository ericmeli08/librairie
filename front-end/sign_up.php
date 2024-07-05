<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" sizes="500x500" type="image/x-icon" href="<?=URL_IMG ?>bookLogo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire </title>
    <link rel="stylesheet" href="<?= URL_CSS2 ?>sign_up.css">
</head>
<body>
    <div class="container">
        <nav>
            <img src="<?= URL_IMG ?>logo.png" alt="">
			
			<ul>
				<li class="nav-item"><a href="<?= URL_CONTROLLER2 ?>boutiqueController.php" class="nav-link">Library</a></li>
				<li class="nav-item"><a href="#" class="nav-link">About Us</a></li>
				<li class="nav-item"><a href="<?= URL_CONTROLLER2 ?>sign_upController.php" class="nav-link">Sign Up</a></li>
				<li class="nav-item"><a href="<?= URL_CONTROLLER2 ?>sign_inController.php" class="nav-link">Sign In</a></li>
			</ul>
		</nav>
        
        <span class="illustration" ></span>
        <section>
            <h1>WELCOME !</h1>
            <P>Use this awesome form to login or create new account in the librairie for free. <br> tempore totam ve</P>
        </section>

        <div class="sign-form">
            <h2>Register with</h2>
            <div class="log">
                <div class="img"><img src="<?= URL_IMG ?>icon/facebook.png" alt=""></div>
                <div class="img"><img src="<?= URL_IMG ?>icon/apple.png" alt=""></div>
                <div class="img"><img src="<?= URL_IMG ?>icon/google.png" alt=""></div>
            </div>
            <span>or</span>
            <form action="" id="form" method="POST">
                
                <div>
                    <input type="text" name="nom" id="nom" placeholder="Name" >
                </div>
                <div>
                    <input type="email" name="email" id="email" placeholder="E-Mail" >
                </div>
                <div>
                    <input type="password" name="pwd" id="pwd" placeholder="Password" >
                </div>
                <div class="form-check" >
                    <input type="checkbox" name="check-terms" id="check">
                    <label for="check"> I agree the <a href="" >Terms and Conditions </a></label>
                </div>
                <input type="submit" name="submit" value="SIGN UP">
                <input type="hidden" name="id" value="0">
                <input type="hidden" name="date_create" value="0">
                <div class="foot-form">
                    Already have an account?  <a href="<?= URL_CONTROLLER2 ?>sign_inController.php">Sign in</a>
                </div>
            </form>
        </div>

        <ul class="foot-nav" >
            <li><a href="">Library</a></li>
            <li><a href="">About Us</a></li>
            <li><a href="">Team</a></li>
            <li><a href="">Blog</a></li>
            <li><a href="">Products</a></li>
        </ul>

        <div class="foot-text">
            Copyright © 2024 Soft by Creative Tim.
        </div>

    </div>
    <script src="<?= URL_JS2 ?>sign_up.js"></script>
</body>
</html>