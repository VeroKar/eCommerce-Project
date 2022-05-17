<?php require APPROOT . '/views/includes/header.php';  ?>

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
              <h2 class="text-uppercase text-center mb-2">Update Passsword</h2><br>
              <form class="px-4 py-3" method="post" action="/WebsiteMVC/Profile/updatePassword">
                <div class="form-group">
                  <label for="password">Please enter current password:</label>
                  <input type="password" class="form-control <?php echo (!empty($data['password_error'])) ? 'is-invalid' : ''; ?>" id="password" name="password" alt="Current password">
                  <span class="invalid-feedback"><?php echo $data['password_error']; ?> </span><br>
                </div>

                <div class="form-group">
                  <label for="new_password">Please enter new password</label>
                  <input type="password" class="form-control <?php echo (!empty($data['new_password_error'])) ? 'is-invalid' : ''; ?>" id="new_password" name="new_password" alt="New password">
                  <span class="invalid-feedback"><?php echo $data['new_password_error']; ?> </span><br>
                </div>

                <div class="form-group">
                  <label for="new_password_re-enter">Please re-enter new password</label>
                  <input type="password" class="form-control <?php echo (!empty($data['new_password_re-enter_error'])) ? 'is-invalid' : ''; ?>" id="new_password_re-enter" name="new_password_re-enter" alt="Re-enter new password">
                  <span class="invalid-feedback"><?php echo $data['new_password_re-enter_error']; ?> </span><br>
                </div>

                <div class="d-flex justify-content-center align-items-center mt-3 mb-3">
                <button type="submit" name="updatePassword" class="btn btn-dark mt-2">Update Password</button>
                </div>

                <!-- <?php
                if (!empty($data['msg'])) {
                  echo '<div class="alert alert-danger" role="alert">' .
                    $data['msg'] . '
                  </div>';
                }
                ?> -->
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