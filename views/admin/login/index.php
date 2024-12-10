<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./views/assets/css/admin.css">
    <title>Đăng nhập</title>
</head>
<body>
    <div class="wrapper box-login">
        <div class="login">
            <p class="login-title">Đăng nhập</p>
            <form action="" method="post">
                <div class="login-item">
                    <label for="">Tài khoản</label>
                    <input type="text" name="username" required>
                </div>
                <div class="login-item">
                    <label for="">Mật khẩu</label>
                    <input type="password" name="password" required>
                </div>
                <div class="login-item login-btn">
                    <button>Đăng nhập</button>
                </div>
            </form>
        </div>
    </div>
    <a href="?role=admin&page=dangxuat" onclick="return confirmLogout()">Đăng xuất</a>

    <script>
        function confirmLogout() {
            return confirm("Bạn chắc chắn muốn đăng xuất?");
        }
    </script>

</body>
</html>