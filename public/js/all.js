var channel = Echo.channel('my-channel');
channel.listen('.my-event', function (data) {
    var div;
    var dt = new Date(data.task.expire_at);
    var dt_toString = dateFormat(dt, 'HH:MM');
    div += '<tr>';
    div += '<td>' + data.task.name + '</td>';
    div += '<td>' + data.task.vendor_name + '</td>';
    div += '<td>' + data.task.model + '</td>';
    div += '<td><strong>' + dt_toString + '</strong></td>';
    div += '</tr>';
    $('#table_content').append(div);
});
// dt = new Date();
// var dt_toString = dateFormat(dt, 'HH:MM');
// console.log(dt_toString);

/* Russian (UTF-8) initialisation for the jQuery UI date picker plugin. */
/* Written by Andrew Stromnov (stromnov@gmail.com). */
( function( factory ) {
    if ( typeof define === "function" && define.amd ) {

        // AMD. Register as an anonymous module.
        define( [ "../widgets/datepicker" ], factory );
    } else {

        // Browser globals
        factory( jQuery.datepicker );
    }
}( function( datepicker ) {

    datepicker.regional.ru = {
        closeText: "Закрыть",
        prevText: "&#x3C;Пред",
        nextText: "След&#x3E;",
        currentText: "Сегодня",
        monthNames: [ "Январь","Февраль","Март","Апрель","Май","Июнь",
            "Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь" ],
        monthNamesShort: [ "Янв","Фев","Мар","Апр","Май","Июн",
            "Июл","Авг","Сен","Окт","Ноя","Дек" ],
        dayNames: [ "воскресенье","понедельник","вторник","среда","четверг","пятница","суббота" ],
        dayNamesShort: [ "вск","пнд","втр","срд","чтв","птн","сбт" ],
        dayNamesMin: [ "Вс","Пн","Вт","Ср","Чт","Пт","Сб" ],
        weekHeader: "Нед",
        dateFormat: "dd.mm.yy",
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: "" };
    datepicker.setDefaults( datepicker.regional.ru );

    return datepicker.regional.ru;

} ) );
$(document).ready(function () {
    $.datepicker.setDefaults($.datepicker.regional["ru"]);
    $("#datepicker").datepicker($.datepicker.regional["ru"]);
});
