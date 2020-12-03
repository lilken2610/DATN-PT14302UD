<footer>
    <div id="footer">
        <div class="container">
            <div class="row text-center text-xs-center text-sm-left text-md-left">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Giới thiệu</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="javascript:void();">Chào mừng bạn đến với F Luxury! Tại đây, mỗi sản phẩm chúng tôi mang đến đều chất lượng bằng tiền các bạn bỏ ra. </a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Địa chỉ</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="javascript:void();">137 Nguyễn Thị Thập, Thanh Khê Tây, Liên Chiểu, Đà Nẵng</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Liên hệ</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="javascript:void();">0336751070</a></li>
                        <li><a href="javascript:void();">thinhltpd02874@fpt.edu.vn</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
                    <ul class="list-unstyled list-inline social text-center">
                        <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-address-card" aria-hidden="true"></i></a></li>
                        <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-bath" aria-hidden="true"></i></a></li>
                        <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-user-circle" aria-hidden="true"></i></a></li>
                        <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-id-card" aria-hidden="true"></i></a></li>
                        <li class="list-inline-item"><a href="javascript:void();" target="_blank"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('shoes/js/main.js')}}"></script>
    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace("active", "");
            }
            document.getElementById(cityName).style.display = "block";
            // evt.currentTarget.className = "active";
        }
        // window.onscroll = function() {scrollFunction()};
    </script>
    {{--flickity--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.pkgd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.pkgd.min.js"></script>
    {{--fancybox--}}
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    {{--gg map--}}
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    @yield('src-public')
</footer>
</div>
</body>
</html>
