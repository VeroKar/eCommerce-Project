<?php require APPROOT . '/views/includes/header.php';  
$user = $data["user"];
?>

<html>
<head>
</head>

<body>

<section class="vh-100 bg-image">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-2">Update Profile Information</h2><br>
              <form class="px-4 py-3" method="post" action="/WebsiteMVC/Profile/updateProfile">
                <div class="form-group">
                  <label for="first_name">First Name</label>
                  <input type="text" class="form-control <?php echo (!empty($data['fname_error'])) ? 'is-invalid' : ''; ?>" id="first_name" name="first_name" value="<?php echo $user->first_name ?>">
                  <span class="invalid-feedback"><?php echo $data['fname_error']; ?> </span><br>
                </div>

                <div class="form-group">
                  <label for="last_name">Last Name</label>
                  <input type="text" class="form-control <?php echo (!empty($data['lname_error'])) ? 'is-invalid' : ''; ?>" id="last_name" name="last_name" value="<?php echo $user->last_name ?>">
                  <span class="invalid-feedback"><?php echo $data['lname_error']; ?> </span><br>
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control <?php echo (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?php echo $user->email ?>">
                  <span class="invalid-feedback"><?php echo $data['email_error']; ?> </span><br>
                </div>

                <div class="d-flex justify-content-center align-items-center mt-3 mb-3">
                <button type="submit" name="updateProfile" class="btn btn-dark mt-2">Update Information</button>
                </div>

                <?php
                if (!empty($data['msg'])) {
                  echo '<div class="alert alert-danger" role="alert">' .
                    $data['msg'] . '
                  </div>';
                }
                ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>

<?php require APPROOT . '/views/includes/footer.php'; ?>