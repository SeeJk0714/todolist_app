<!DOCTYPE html>
<html>
    <head>
        <title>Login | TODO App</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            />
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
            />
        <style type="text/css">
            body {
                background: #fff;
            }
        </style>
    </head>
    <body>
    <div class="card rounded shadow-sm mx-auto my-4" style="max-width: 500px;">
        <div class="card-body">
            <h3 class="card-title mb-3">Login to your account</h3>
            <?php 
            if(isset( $_SESSION['error'])):?>
                <div class="alert alert-danger" role="alert">
                    <?php
                    echo $_SESSION['error']; 
                    unset ($_SESSION['error']);
                    ?>
                </div>
            <?php endif; ?>
            <form action="do_login.php" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-fu">Login</button>
                </div>
            </form>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <a href="/" class="text-decoration-none "><i class="bi bi-arrow-left-circle"></i> Go Back</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>