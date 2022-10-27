<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Cart</title>
  <link href="img/OIP (2).jpeg" rel="icon">

    <!-- Favicon -->
   

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />

    <!-- Customized Bootstrap Stylesheet -->
    <!-- Customized Bootstrap Stylesheet -->
<link rel="stylesheet" href="css/style.css">
  <style>
                                .na{
                                  
                                    margin-left: 22px;
                                    border-radius: 6px;
                                } 
                                .na:hover{
                                   background-color: black;
                                } 
                            </style>
</head>

<body style="background-color: lavender;"><br><br>
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
               
        </div>
       

    <!-- Navbar Start -->
    <div class="container-fluid bg-warning mb-30 fixed-top">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block justify-content-center p-2">
            
                <a href="" class="text-decoration-none">
                    <span class="h1 text-uppercase text-warning   px-2" style="background-color: #000;">&nbsp;ingco</span>
                    <span class="h1 text-uppercase text-white px-2 ml-n1" style="background-color: #000;">tools</span>
                </a>
                
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-xl bg-warning   py-3 py-lg-0 px-0  ">
                    <a href="index.php" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-warning bg-dark px-2">INGco</span>
                        <span class="h1 text-uppercase text-white bg-dark px-2 ml-n1">Tools</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse  justify-content-center" id="navbarCollapse" style="text-align: center;">
                        <div class="navbar-nav mr-auto py-0 mt-3">
                            
                            <a href="index.php" class="nav-item na nav-link " style="color: gray;">Home</a>
                            <a href="detail.php" class="nav-item na  nav-link" style="color: gray;">Shop Detail</a>
                            <a href="cart.php" class="nav-item na nav-link border border-dark " style="color: gray;">Cart</a>
                            <a href="checkout.php" class="nav-item na nav-link" style="color: gray;">Checkout</a>
                            <a href="contact.php" class="nav-item na nav-link" style="color: gray;">Contact</a>
                          
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block mt-3">
                            <a href="" class="btn px-0">
                                <i class="fas fa-heart " style="color: black;"></i>
                                <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                            <a href="cart.php" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-dark"></i>
                                <span id="cart-item" class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;"></span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div><br>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script> 
  <div class="container w-100">
    <div class="row justify-content-center w-100 p-0">
      <div class=" w-100">
        <div style="display:<?php if (isset($_SESSION['showAlert'])) {
  echo $_SESSION['showAlert'];
} else {
  echo 'none';
} unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><?php if (isset($_SESSION['message'])) {
  echo $_SESSION['message'];
} unset($_SESSION['showAlert']); ?></strong>
        </div>
        <div class="table-responsive mt-2">
          <table class=" table-striped table-bordered text-center w-100  bg-warning ">
            <thead>
              <tr>
                <td colspan="7">
                  <h4 class="text-center text-black h3 m-0">Products in your cart!</h4>
                </td>
              </tr>
              <tr class="text-light bg-dark">
                <th>ID</th>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>
                  <a href="action.php?clear=all" class="badge-danger badge p-1" onclick="return confirm('Are you sure want to clear your cart?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
                require 'config.php';
                $stmt = $conn->prepare('SELECT * FROM cart');
                $stmt->execute();
                $result = $stmt->get_result();
                $grand_total = 0;
                while ($row = $result->fetch_assoc()):
              ?>
              <tr class="text-dark">
                <td><?= $row['id'] ?></td>
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <td><img src="<?= $row['product_image'] ?>"  width="80px" style="border-radius: 30px;"></td>
                <td ><?= $row['product_name'] ?></td>
                <td>
                  Rs. &nbsp;&nbsp;<?= number_format($row['product_price'],2);  ?>
                </td>
                <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                <td>
                  <input type="number" class="  itemQty" value="<?= $row['qty'] ?>" style="width:50px" disabled>
                </td>
                <td>Rs. &nbsp;&nbsp;<?= number_format($row['total_price'],2); ?></td>
                <td>
                  <a href="action.php?remove=<?= $row['id'] ?>" class="text-danger lead" onclick="return confirm('Are you sure want to remove this item?');"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
              <?php $grand_total += $row['total_price']; ?>
              <?php endwhile; ?>
              <tr>
                <td colspan="3">
                  <a href="index.php" class="btn btn-dark w-100"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue
                    Shopping</a>
                </td>
                <td colspan="2" class="bg-light"><b>Grand Total</b></td>
                <td><b>Rs. &nbsp;&nbsp;<?= number_format($grand_total,2); ?></b></td>
                <td>
                  <a href="checkout.php" class="btn btn-dark w-100 <?= ($grand_total > 1) ? '' : 'disabled'; ?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">INGco Tools</h5>
                <p class="mb-4">No dolore ipsum accusam no lorem. Invidunt sed clita kasd clita et et dolor sed dolor. Rebum tempor no vero est magna amet no</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-warning mr-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-envelope text-warning mr-3"></i>INGcoTools21@outlook.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-warning mr-3"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" style="text-decoration: none;" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" style="text-decoration: none;" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-secondary mb-2"  style="text-decoration: none;" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-secondary mb-2"  style="text-decoration: none;" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-secondary mb-2"  style="text-decoration: none;" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-secondary"  style="text-decoration: none;" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2"  style="text-decoration: none;"href="#"><i class="fa fa-angle-right mr-2"></i>Gmail: sohaibshaikh875@gmail.com</a>
                            <a class="text-secondary mb-2"  style="text-decoration: none;" href="#"><i class="fa fa-angle-right mr-2"></i>Facebook : sohaibshaikh87</a>
                            <a class="text-secondary mb-2"  style="text-decoration: none;" href="#"><i class="fa fa-angle-right mr-2"></i>Twitter : sohaibshaikh235</a>
                            <a class="text-secondary mb-2"  style="text-decoration: none;" href="#"><i class="fa fa-angle-right mr-2"></i>Instagram : sohaibshaikh212</a>
                            <a class="text-secondary mb-2"  style="text-decoration: none;" href="#"><i class="fa fa-angle-right mr-2"></i>outlook : sohaibshaikh765</a>
                           
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
                        <p>Duo stet tempor ipsum sit amet magna ipsum tempor est</p>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Your Email Address">
                                <div class="input-group-append">
                                    <button class="btn btn-warning">Sign Up</button>
                                </div>
                            </div>
                        </form>
                        <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
                        <div class="d-flex">
                            <a class="btn btn-warning btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-warning btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-warning btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-warning btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; <a class="text-warning" href="#">ingco-tools</a>. All Rights Reserved. Designed
                    by
                    <a class="text-warning" href="https://htmlcodex.com">Sohaib Shaikh</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>


  <script type="text/javascript">
  $(document).ready(function() {

    // Change the item quantity
    $(".itemQty").on('change', function() {
      var $el = $(this).closest('tr');

      var pid = $el.find(".pid").val();
      var pprice = $el.find(".pprice").val();
      var qty = $el.find(".itemQty").val();
      location.reload(true);
      $.ajax({
        url: 'action.php',
        method: 'post',
        cache: false,
        data: {
          qty: qty,
          pid: pid,
          pprice: pprice
        },
        success: function(response) {
          console.log(response);
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script><!-- Back to Top -->

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<!-- JavaScript Libraries -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Contact Javascript File -->
<script src="mail/jqBootstrapValidation.min.js"></script>
<script src="mail/contact.js"></script>

<!-- Template Javascript -->
</body>
</html>