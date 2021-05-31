<?php  session_start();?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="css/style2.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">

          <form action="#"  method="post"class="sign-in-form">
            <h2 class="title">Sign in</h2>

            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Email" name="email"required/>
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password"required/> 
            </div>

            <input type="submit" value="Login"name="login" class="btn solid" />
          </form>

          <form action="#" class="sign-up-form"method="post">
            <h2 class="title">Sign up</h2>
       
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email"  name="email"required/>
            </div>

            
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password"  name="password"required/>
            </div>

            <div class="input-field">
              <i class="fas fa-check-circle"></i>
              <input type="password" placeholder="Confirm password"name="cpassword" required/>
            </div>

            <input type="submit" class="btn" value="Sign up"  name="submit"/>


          </form>
        </div>
      </div>

      <div class="panels-container">

        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
             Creat a new? 
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/shopping.svg" class="image" alt="" />
        </div>

        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/signup.svg" class="image" alt="" />
        </div>

      </div>

    </div>
    <script src="main.js"></script>
  </body>
</html>