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
