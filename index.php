<?php
    $role = $_GET["role"]; 
    if(!isset($role)) {
        header('Location: ?role=user');
    }else {
        if($role == "admin") {
            include_once "controllers/admin/AdminController.php";
            $adminController = new AdminController();
            if(!isset($_GET["page"])) {
                if(!isset($_SESSION["display_name"])) header('Location: ?role=admin&page=dangnhap');
                else header('Location: ?role=admin&page=sanpham');
            }
            else {
                switch ($_GET["page"]) {
                    case 'dangnhap' : {
                        $adminController->dangNhap();
                        break;
                    }
                    case 'dangxuat' : {
                        echo "
                        <script>
                            if (confirm('Bạn chắc chắn muốn đăng xuất?')) {
                                window.location.href = '?role=admin&page=dangxuat_confirm';
                            } else {
                                window.location.href = '?role=admin&page=sanpham';
                            }
                        </script>
                        ";
                        break;
                    }
                    case 'dangxuat_confirm' : {
                        $adminController->dangXuat();
                        break;
                    }
                    case 'sanpham' : {
                        if(!isset($_SESSION["display_name"])) header('Location: ?role=admin&page=dangnhap');
                        if(!isset($_GET["action"])) {
                            $adminController->quanLySanPham();
                        }
                        else {
                            switch ($_GET["action"]) {
                                case 'them' : {
                                    $adminController->themSanPham();
                                    break;
                                }
                                case 'sua' : {
                                    $adminController->suaSanPham();
                                    break;
                                }
                                case 'xoa' : {
                                    $adminController->xoaSanPham();
                                    break;
                                }
                            }
                        }
                        break;
                    }
                    case 'loai' : {
                        if(!isset($_SESSION["display_name"])) header('Location: ?role=admin&page=dangnhap');
                        if(!isset($_GET["action"])) {
                            $adminController->quanLyLoai();
                        }
                        else {
                            switch ($_GET["action"]) {
                                case 'them' : {
                                    $adminController->themLoai();
                                    break;
                                }
                                case 'sua' : {
                                    $adminController->suaLoai();
                                    break;
                                }
                                case 'xoa' : {
                                    $adminController->xoaLoai();
                                    break;
                                }
                            }
                        }
                        break;
                    }
                    case 'hoadon' : {
                        if(!isset($_SESSION["display_name"])) header('Location: ?role=admin&page=dangnhap');
                        if(!isset($_GET["action"])) {
                            $adminController->quanLyHoaDon();
                        }
                        else {
                            switch ($_GET["action"]) {
                                case 'duyet' : {
                                    $adminController->duyetHoaDon();
                                    break;
                                }
                                case 'xoa' : {
                                    $adminController->xoaHoaDon();
                                    break;
                                }
                                case 'chitiet' : {
                                    $adminController->chiTietHoaDon();
                                    break;
                                }
                            }
                        }
                        break;
                    }
                    case 'binhluan' : {
                        if(!isset($_SESSION["display_name"])) header('Location: ?role=admin&page=dangnhap');
                        if(!isset($_GET["action"])) {
                            $adminController->quanLyBinhLuan();
                        }
                        else {
                            switch ($_GET["action"]) {
                                case 'duyet' : {
                                    $adminController->duyetBinhLuan();
                                    break;
                                }
                                case 'xoa' : {
                                    $adminController->xoaBinhLuan();
                                    break;
                                }
                            }
                        }
                        break;
                    }
                    case 'thongke':
                    {
                        if(!isset($_SESSION["display_name"])) header('Location: ?role=admin&page=dangnhap');
                        if(!isset($_GET["action"])) {
                            $adminController->thongke();
                        }

                        break;

                    }
                    case 'tonkho':
                    {
                        if(!isset($_SESSION["display_name"])) header('Location: ?role=admin&page=dangnhap');
                        if(!isset($_GET["action"])) {
                            $adminController->tonKho();
                        }

                        break;

                    }
                    case 'muanhieu':
                    {
                        if(!isset($_SESSION["display_name"])) header('Location: ?role=admin&page=dangnhap');
                        if(!isset($_GET["action"])) {
                            $adminController->muaNhieu();
                        }
                        break;

                    }
                }
            }
        }
        else if($role == "user") {
            include_once "controllers/user/UserController.php";
            $userController = new UserController();
            if(!isset($_GET["action"])) {
                $userController->home();
            }
            else {
                switch ($_GET["action"]) {
                    case 'timkiem' : {
                        $userController->timKiem();
                        break;
                    }
                    case 'chitiet' : {
                        $userController->chiTiet();
                        break;
                    }
                    case 'binhluan' : {
                        $userController->themBinhLuan();
                        break;
                    }
                    case 'giohang' : {
                        $userController->gioHang();
                        break;
                    }
                    case 'themgiohang' : {
                        $userController->themGioHang(); 
                        break;
                    }
                    case 'xoagiohang' : {
                        $userController->xoaGioHang();
                        break;
                    }
                    case 'muahang' : {
                        $userController->muaHang();
                        break;
                    }
                    case 'tang' : {
                        $userController->tangGiamsl();
                        break;
                    }
                    case 'giam' : {
                        $userController->tangGiamsl();
                        break;
                    }
                    case 'sanpham' : {  
                        $userController->sanpham();
                        break;
                    }
                }
            }

        }
    }
?>