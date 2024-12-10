<div class="header">
    <h2>BicCamera - Quản lý bán thiết bị điện tử</h2>
    <div class="user-info">
        Xin chào, <?php echo $_SESSION["display_name"]?>
        <a href="?role=admin&page=dangxuat" onclick="return confirmLogout()"><i class="fa fa-sign-out"></i></a>
        <script>
            function confirmLogout() {
                return confirm("Bạn chắc chắn muốn đăng xuất?");
            }
        </script>
    </div>
</div>