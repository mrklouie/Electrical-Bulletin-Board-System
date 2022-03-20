<?php
require "includes/db.php";
session_start();

?>

<?php if (isset($_SESSION["sessionUserType"])) {?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="css/main.css
    "
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
<style>
  .logout-button{
    width: 100%;
    height: 100%;
    background: url("logout.jpg");
    border-style: none;
    border-radius: 10px;
    background-size: cover;
  }
</style>
    <title>Homepage</title>
  </head>

  <body>
    <div class="container-fluid">
      <!-- START NAVBAR -->
      <div class="navbar">
      <div class="brand-name">
        EBBS
      </div>
      <a href="#" class="menu" id="menu">
        <i class="fa-solid fa-bars hamburger"></i>
      </a>
      <div class="navbar-links">
        <ul>
        <li><a href="archives.php">Archives</a></li>
          <li><a href="#">Feedbacks</a></li>
          <li><a href="index.php">Manage</a></li>
          <li><a href="#">Logout</a></li>
        </ul>
      </div>
      </div>
      <!-- END NAVBAR -->
      <div class="parent-of-section">
        <!-- LEFT SECTION START -->

        <!-- LEFT SECTION END -->
        <div class="section right-section" id="right-section">

          <div class="container-cards" id="container-cards">
              <h2 class="archives-title">Feedbacks
                  <?php $sql = "SELECT * FROM tbl_archives";
    $result = mysqli_query($conn2, $sql);
    $rowsCount = mysqli_num_rows($result);
    echo "(" . $rowsCount . ")";
    ?>
              </h2>
              <div class="feedback-container">
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Message</th>
                            <th>Email</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Mark Louie</td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt doloremque iure, deleniti quisquam provident velit, debitis magnam soluta error sequi, nobis at excepturi autem asperiores quod facilis eum incidunt. Quas vel non repudiandae perferendis neque at, quia reprehenderit facilis, explicabo incidunt commodi corporis veritatis iusto distinctio aliquam, corrupti consectetur ex?</td>
                            <td>mark.17dullavin@gmail.com</td>
                            <td>2022-03-20 21:26:08</td>
                        </tr>
                        <tr>
                            <td>Mark Louie</td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt doloremque iure, deleniti quisquam provident velit, debitis magnam soluta error sequi, nobis at excepturi autem asperiores quod facilis eum incidunt. Quas vel non repudiandae perferendis neque at, quia reprehenderit facilis, explicabo incidunt commodi corporis veritatis iusto distinctio aliquam, corrupti consectetur ex?</td>
                            <td>mark.17dullavin@gmail.com</td>
                            <td>2022-03-20 21:26:08</td>
                        </tr>
                        <tr>
                            <td>Mark Louie</td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt doloremque iure, deleniti quisquam provident velit, debitis magnam soluta error sequi, nobis at excepturi autem asperiores quod facilis eum incidunt. Quas vel non repudiandae perferendis neque at, quia reprehenderit facilis, explicabo incidunt commodi corporis veritatis iusto distinctio aliquam, corrupti consectetur ex?</td>
                            <td>mark.17dullavin@gmail.com</td>
                            <td>2022-03-20 21:26:08</td>
                        </tr>
                        <tr>
                            <td>Mark Louie</td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt doloremque iure, deleniti quisquam provident velit, debitis magnam soluta error sequi, nobis at excepturi autem asperiores quod facilis eum incidunt. Quas vel non repudiandae perferendis neque at, quia reprehenderit facilis, explicabo incidunt commodi corporis veritatis iusto distinctio aliquam, corrupti consectetur ex?</td>
                            <td>mark.17dullavin@gmail.com</td>
                            <td>2022-03-20 21:26:08</td>
                        </tr>
                        <tr>
                            <td>Mark Louie</td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt doloremque iure, deleniti quisquam provident velit, debitis magnam soluta error sequi, nobis at excepturi autem asperiores quod facilis eum incidunt. Quas vel non repudiandae perferendis neque at, quia reprehenderit facilis, explicabo incidunt commodi corporis veritatis iusto distinctio aliquam, corrupti consectetur ex?</td>
                            <td>mark.17dullavin@gmail.com</td>
                            <td>2022-03-20 21:26:08</td>
                        </tr>
                        <tr>
                            <td>Mark Louie</td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt doloremque iure, deleniti quisquam provident velit, debitis magnam soluta error sequi, nobis at excepturi autem asperiores quod facilis eum incidunt. Quas vel non repudiandae perferendis neque at, quia reprehenderit facilis, explicabo incidunt commodi corporis veritatis iusto distinctio aliquam, corrupti consectetur ex?</td>
                            <td>mark.17dullavin@gmail.com</td>
                            <td>2022-03-20 21:26:08</td>
                        </tr>
                        <tr>
                            <td>Mark Louie</td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt doloremque iure, deleniti quisquam provident velit, debitis magnam soluta error sequi, nobis at excepturi autem asperiores quod facilis eum incidunt. Quas vel non repudiandae perferendis neque at, quia reprehenderit facilis, explicabo incidunt commodi corporis veritatis iusto distinctio aliquam, corrupti consectetur ex?</td>
                            <td>mark.17dullavin@gmail.com</td>
                            <td>2022-03-20 21:26:08</td>
                        </tr>
                    </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://kit.fontawesome.com/8d98474fa5.js" crossorigin="anonymous"></script>
    <script src="app.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
  </body>
</html>
<?php } else {
    header("Location: JS-PHP-Carousel/index.php");
    exit;
}?>
