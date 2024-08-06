<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> @yield('title') - EShopper</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    {{--
    <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('client/assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('client/assets/css/style.css') }}" rel="stylesheet">

    <!-- Toast.js Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    @yield('css')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <!-- Slick CSS -->


<body>
    @include('client.layouts.header')
    @yield('content')
    @include('client.layouts.footer')
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('client/assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('client/assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Contact Javascript File -->
    @yield('scripts')
    <script src="{{ asset('client/assets/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('client/assets/mail/contact.js') }}"></script>
    <!-- Template Javascript -->
    <script src="{{ asset('client/assets/js/main.js') }}"></script>
    <!-- Toast.js Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        // Call ajax thêm giỏ hàng
        $(document).ready(function() {
            $('.addToCart').on('click', function(e) {
                e.preventDefault();
                let productId = $(this).data('id');

                $.ajax({
                    url: '{{ route('cart.store') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: productId,
                    },
                    success: function(response) {
                        toastr.success(response.success);
                        $('#cart-count').text(response.totalProducts);
                    },
                    error: function(xhr) {
                        let errorMessage = 'Đã xảy ra lỗi. Vui lòng thử lại.';

                        if (xhr.responseJSON && xhr.responseJSON.error) {
                            errorMessage = xhr.responseJSON.error;
                        }

                        toastr.error(errorMessage);
                    }
                });
            });
        });



        // Slider
        $(document).ready(function() {
            $('.category-slider').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: true,
                dots: true,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
    </script>


</body>

</html>
