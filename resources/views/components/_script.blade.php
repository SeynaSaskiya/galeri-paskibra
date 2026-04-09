    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script>
        $('.main-carousel').flickity({
            cellAlign: 'left',
            contain: true,
            prevNextButtons: false,
            pageDots: false,
            autoPlay: 4000,
            wrapAround: true
        });
        var $carousel = $('.main-carousel').flickity();
        $('.button--previous').on('click', function() { $carousel.flickity('previous'); });
        $('.button--next').on('click', function() { $carousel.flickity('next'); });
    </script>