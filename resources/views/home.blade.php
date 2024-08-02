<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>
<style>
    .dropdown-menu {
        min-width: 150px;
        /* Điều chỉnh độ rộng của menu nếu cần */
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">LAXSHOP</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Giới thiệu</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @auth
                                @if (Auth::user()->role === 'admin')
                                    <li><a class="dropdown-item" href="{{ route('admin.index') }}">Admin</a></li>
                                @endif
                                <li><a class="dropdown-item" href="{{ route('profile') }}">Hồ sơ</a></li>
                                <li><a class="dropdown-item" href="{{ route('changePassword') }}">Đổi mật khẩu</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a></li>
                            @else
                                <li><a class="dropdown-item" href="{{ route('register') }}">Đăng ký</a></li>
                                <li><a class="dropdown-item" href="{{ route('login') }}">Đăng nhập</a></li>
                            @endauth

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1 class="display-4">Chào Mừng Đến Với LAXSHOP</h1>
            <p class="lead">Khám phá các dịch vụ và sản phẩm của chúng tôi</p>
            <a href="#" class="btn btn-light btn-lg">Tìm Hiểu Thêm</a>
        </div>
    </header>
    <main class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="https://web.hn.ss.bfcplatform.vn/muadienmay/content/article2/0878913035-1620532649.jpg"
                        class="card-img-top" alt="Hình ảnh">
                    <div class="card-body">
                        <h5 class="card-title">Tiêu Đề 1</h5>
                        <p class="card-text">Một số nội dung mô tả về chủ đề này.</p>
                        <a href="#" class="btn btn-primary">Tìm Hiểu Thêm</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://minhduongads.com/wp-content/uploads/2017/09/phan-biet-file-anh-jpg-va-png2.png"
                        class="card-img-top" alt="Hình ảnh">
                    <div class="card-body">
                        <h5 class="card-title">Tiêu Đề 2</h5>
                        <p class="card-text">Một số nội dung mô tả về chủ đề này.</p>
                        <a href="#" class="btn btn-primary">Tìm Hiểu Thêm</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://thuthuatnhanh.com/wp-content/uploads/2022/12/hinh-anh-ho-ly-9-duoi-hung-du.jpg"
                        class="card-img-top" alt="Hình ảnh">
                    <div class="card-body">
                        <h5 class="card-title">Tiêu Đề 3</h5>
                        <p class="card-text">Một số nội dung mô tả về chủ đề này.</p>
                        <a href="#" class="btn btn-primary">Tìm Hiểu Thêm</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            <p>&copy; 2024 Công Ty Bạn. Tất cả các quyền được bảo lưu.</p>
        </div>
    </footer>
    ư
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
