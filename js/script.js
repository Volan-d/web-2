$(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});

$(function() {
    //Сохраняем цвет
    // localStorage.setItem('colors', $(this).val());

    //Загружаеми цвета
    let colors;
    let theme;

    //Выбор темы (загрузка)
    if ($('#cat-page').length == 1) {
        theme = localStorage.getItem('themes-cat');
        colors = localStorage.getItem('colors-cats');
    }
    if ($('#homka-page').length == 1) {
        theme = localStorage.getItem('themes-homka');
        colors = localStorage.getItem('colors-homka');
    }
    if (colors != null) {
        $('nav').css('backgroundColor', colors);
        $('.shadow-lg-cat').css('boxShadow', '0 0 20px ' + colors);
        $('.shadow-lg-homka').css('boxShadow', '0 0 20px ' + colors);
        $('footer div').css('backgroundColor', colors);
        $('#changeItemColor').val(colors);
    }

    if (theme != null) {
        if (theme == 'dark') {
            $('body').removeClass('bg-light');
            $('body').addClass('bg-dark');
            $('#check-theme').prop('checked', true);
        } else {
            $('body').removeClass('bg-dark');
            $('body').addClass('bg-light');
            $('#check-theme').prop('checked', false);
        }
    }

    $('#changeItemColor').change(function () {
        /*
        $('body').removeClass('bg-light');
        $('body').removeClass('bg-dark');*/
        $('nav').css('backgroundColor', $(this).val());
        $('nav').css('backgroundColor', $('#changeItemColor').val());
        if ($('.shadow-lg-cat').length) {
            $('.shadow-lg-cat').css('boxShadow', '0 0 20px ' + $(this).val());
        }
        if ($('.shadow-lg-homka').length) {
            $('.shadow-lg-homka').css('boxShadow', '0 0 20px ' + $(this).val());
        }
        $('footer div').css('backgroundColor', $(this).val());
        if ($('#cat-page').length == 1) {
            localStorage.setItem('colors-cats', $(this).val());
        }
        if ($('#homka-page').length == 1) {
            localStorage.setItem('colors-homka', $(this).val());
        }
    })

    // Выбор темы
    $('#check-theme').on('change', function () {
        if ($('#check-theme').prop('checked')) {
            $('body').removeClass('bg-light');
            $('body').addClass('bg-dark');
            if ($('#cat-page').length == 1) {
                localStorage.setItem('themes-cat', 'dark');
            }
            if ($('#homka-page').length == 1) {
                localStorage.setItem('themes-homka', 'dark');
            }
        } else {
            $('body').removeClass('bg-dark');
            $('body').addClass('bg-light');
            if ($('#cat-page').length == 1) {
                localStorage.setItem('themes-cat', 'light');
            }

            if ($('#homka-page').length == 1) {
                localStorage.setItem('themes-homka', 'light');
            }
        }
    })
})



