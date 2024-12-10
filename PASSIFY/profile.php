   <?php
    //   session_start();
    //   
    //   if (!isset($_SESSION['user'])) {
    //       header("Location: login.php");
    //       exit();
    //   }
    //   
    //   $user = $_SESSION['user'];
    //   
    ?>


   <!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>
    <h1>User Profile</h1>
    <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
    <p><strong>Phone:</strong> <?php echo htmlspecialchars($user['phone']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
    <p><strong>Age:</strong> <?php echo htmlspecialchars($user['age']); ?></p>
    <p><strong>Gender:</strong> <?php echo htmlspecialchars($user['gender']); ?></p>
    <p><strong>Source Address:</strong> <?php echo htmlspecialchars($user['source_add']); ?></p>
    <p><strong>Destination Address:</strong> <?php echo htmlspecialchars($user['destination_add']); ?></p>
    <p><strong>Pass Type:</strong> <?php echo htmlspecialchars($user['pass_type']); ?></p>
</body>
</html> -->


   <?php
    session_start();

    if (!isset($_SESSION['user'])) {
        header("Location: login.php");
        exit();
    }

    $user = $_SESSION['user'];
    ?>

   <!DOCTYPE html>
   <html lang="en">

   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>User Profile</title>
       <style>
           * {
               padding: 0;
               margin: 0;
               box-sizing: border-box;
           }

           html {
               scroll-behavior: smooth;
           }

           body {
               color: #000000;
               font-family: 'Courier New', Courier, monospace;
               font-weight: 600;
               font-size: 18px;
           }


           nav {
               height: 50px;
               width: 100%;
               background-color: rgba(232, 232, 232, 0.95);
               display: flex;
               align-items: center;
               padding: 0 20px;
               position: fixed;
               top: 0;
               z-index: 1000;
           }

           nav ul li a:hover {
               color: #000000;
               transition: background-color 0.15s ease;
               border: 2px solid #856cae;
               border-radius: 25px;
               background-color: #e5d5ff;
           }

           .logo {
               margin-right: 40px;
               font-weight: 700;
               font-size: 23px;
               cursor: pointer;
               padding: 7px;
               background-color: #bba9d8;
               border-radius: 7px;
           }

           nav ul {
               display: flex;
               width: 100%;
               justify-content: space-around;
               align-items: center;
           }

           nav ul li {
               list-style: none;
           }

           nav li a {
               padding: 7px;
               border-radius: 25px;
               color: black;
               text-decoration: none;
           }

           nav button {
               font-family: 'Courier New', Courier, monospace;
               font-weight: 600;
               color: black;
               border-radius: 20px;
               border: 1px solid black;
               padding: 8px;
               cursor: pointer;
               background-color: rgba(232, 232, 232, 0.525);

           }

           .container {
               background-color: #fff;
               padding: 20px;
               border-radius: 10px;
               box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
               width: 80%;
               max-width: 600px;
           }

           .container h1 {
               text-align: center;
               margin-bottom: 20px;
           }

           .container p {
               margin: 10px 0;
           }

           .container strong {
               display: block;
               margin-bottom: 5px;
           }

           .print-button {
               background-color: #4CAF50;
               color: white;
               border: none;
               padding: 10px 20px;
               border-radius: 5px;
               cursor: pointer;
               margin-top: 20px;
               display: block;
               width: 100%;
               text-align: center;
               text-decoration: none;
           }

           .print-button:hover {
               background-color: #45a049;
           }

           h1 {
               margin-top: 50px;
           }

           .container {

               margin: auto;
           }
       </style>
   </head>

   <body>

       <header>

           <nav>
               <div class="logo"> PASSIFY </div>
               <ul>
                   <li><a href="index.html">Home</a></li>
                   <li><a href="index.html#services">Services</a></li>
                   <li><a href="index.html#pricing">Pricing</a></li>
                   <!-- <button><a href="login.html">Login</a></button> -->
               </ul>
           </nav>

       </header>


       <div class="container">
           <h1>User Profile</h1>
           <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
           <p><strong>Phone:</strong> <?php echo htmlspecialchars($user['phone']); ?></p>
           <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
           <p><strong>Age:</strong> <?php echo htmlspecialchars($user['age']); ?></p>
           <!-- <p><strong>Gender:</strong> // <?php echo htmlspecialchars($user['gender']); ?></p> -->
           <p><strong>Source Address:</strong> <?php echo htmlspecialchars($user['source_add']); ?></p>
           <p><strong>Destination Address:</strong> <?php echo htmlspecialchars($user['destination_add']); ?></p>
           <p><strong>Pass Type:</strong> <?php echo htmlspecialchars($user['pass_type']); ?></p>
           <button class="print-button" onclick="window.print()">Print Profile</button>
       </div>
   </body>

   </html>