<!-- Core JavaScript Files -->
    <script src="{{ asset('public/frontend/js/jquery-2.1.1.js') }}"></script>
    <script src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.easing.min.js') }}"></script>	
	<script src="{{ asset('public/frontend/js/jquery.scrollTo.js') }}"></script>
	<script src="{{ asset('public/frontend/js/wow.min.js') }}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('public/frontend/js/custom.js') }}"></script>
    <script src="{{ asset('public/frontend/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('public/frontend/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('public/frontend/js/inspinia.js') }}"></script>
    <script src="{{ asset('public/frontend/js/plugins/pace/pace.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/plugins/slick/slick.min.js') }}"></script>

    <script src="{{ asset('public/frontend/js/jquery.magnify.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.magnify-mobile.js') }}"></script>

	<script>
	    $(document).ready(function(){
	        $('.product-images').slick({
	            dots: true
	        });

	        $('.slick_demo_2').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                centerMode: true,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
	    });
	</script>	
	<script>
		$(document).ready(function() {
		  $('.zoom').magnify();
		});
	</script>