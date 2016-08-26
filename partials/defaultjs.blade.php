        <!-- JS Part Start-->
        {{ generate_theme_js('marketshop/assets/js/jquery-2.1.1.min.js') }}
        {{ generate_theme_js('marketshop/assets/js/bootstrap/js/bootstrap.min.js') }}
        {{ generate_theme_js('marketshop/assets/js/jquery.easing-1.3.min.js') }}
        {{ generate_theme_js('marketshop/assets/js/jquery.dcjqaccordion.min.js') }}
        {{ generate_theme_js('marketshop/assets/js/owl.carousel.min.js') }}
        {{ generate_theme_js('marketshop/assets/js/jquery.elevateZoom-3.0.8.min.js') }}
        {{ generate_theme_js('marketshop/assets/js/swipebox/lib/ios-orientationchange-fix.js') }}
        {{ generate_theme_js('marketshop/assets/js/swipebox/src/js/jquery.swipebox.min.js') }}
        {{ generate_theme_js('marketshop/assets/js/custom.js') }}
        <script type="text/javascript">
        // Elevate Zoom for Product Page image
        $("#zoom_01").elevateZoom({
            gallery:'gallery_01',
            cursor: 'pointer',
            galleryActiveClass: 'active',
            imageCrossfade: true,
            zoomWindowFadeIn: 500,
            zoomWindowFadeOut: 500,
            lensFadeIn: 500,
            lensFadeOut: 500,
            loadingIcon: 'image/progress.gif'
        }); 
        // pass the images to swipebox
        $("#zoom_01").bind("click", function(e) {
            var ez =   $('#zoom_01').data('elevateZoom');
                $.swipebox(ez.getGalleryList());
            return false;
        });
        </script>
        <!-- JS Part End-->
