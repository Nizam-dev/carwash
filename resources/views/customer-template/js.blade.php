<script src="{{asset('public/landingpage/js/jquery.min.js')}}"></script>
<script src="{{asset('public/landingpage/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('public/landingpage/js/popper.min.js')}}"></script>
<script src="{{asset('public/landingpage/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/landingpage/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('public/landingpage/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('public/landingpage/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('public/landingpage/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('public/landingpage/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('public/landingpage/js/aos.js')}}"></script>
<script src="{{asset('public/landingpage/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{asset('public/landingpage/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('public/landingpage/js/jquery.timepicker.min.js')}}"></script>
<script src="{{asset('public/landingpage/js/scrollax.min.js')}}"></script>
<script src="{{asset('public/landingpage/js/main.js')}}"></script>

<script>
    function validateForm(el){
          let form = el
          $(el).find(".is-invalid").removeClass("is-invalid")
            if($(form)[0].checkValidity()){
              return true;
            }else{
                $(form+" :invalid").each(function(i, obj) {
                    $(obj).addClass("is-invalid")
                });
                $(form+" :invalid").first().focus()
                return false;
            }
        }

        function resetvalidateForm(el){
          let form = el
          $(el).find(".is-invalid").removeClass("is-invalid")
        }
</script>

@yield('js')