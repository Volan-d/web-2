//Объявляем глобальну переменную
var class_img


//Ждем загрузки всей страницы и теперь наши скрипты могут работать
$(function(){
    //Обработка нажатий на все ссылки, кроме тех, которые имеют класс lightbox
    $("a:not(.lightbox)").click(function () {
        //Сохранили класс элемента, по которому кликнули
        class_img = this.className
        //Показали lightbox с id = class_img
        $("#"+class_img).css({
            width: 'auto',
            height: 'auto',
            bottom: '0',
            right: '0', //При таком формате запятая у последнего свойства нужна бязательно!
        })
        $("#"+class_img+" img").css("opacity", "1") //Пробел в " img" ОБЯЗАТЕЕН!
        $("#"+class_img+" img").css("margin-top", Math.round((window.innerHeight - $("#"+class_img+" img").height())/2)+`px`)

    })

    //Закрытие lightbox
    $("a.lightbox").click(function () {
        $("#"+class_img).css({
            width: '0',
            height: '0',
        })
        $("#"+class_img+" img").css("opacity", "0")
    })

    //Центруем изображение при изменении размеров окна браузера
    $(window).resize(function () {
        $("#"+class_img+" img").css("margin-top", Math.round((window.innerHeight - $("#"+class_img+" img").height())/2)+`px`)
    })

    //hover для каждой буквы
    //Забрали содержимое .title
    let text = $('.title').text()
    //Разбиваем на массив символов
    textArr = text.split('')
    //Очистили содержимое
    $('.title').html('')
    //Перебираем массив символов
    $.each(textArr, function (i, v) {
        //если это пробел, то заменяем его на "пробельный" span
        if (v==' ') {
            $('.title').append('<span class="space"></span>')
        //иначе - на <span>Символ</span>
        } else {
            $('.title').append('<span>'+v+'</span>')
        }
    })
})
