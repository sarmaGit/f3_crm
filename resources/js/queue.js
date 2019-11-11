var saved = Echo.channel('saved-channel');
saved.listen('.saved-event', function (data) {
    var tr = '';
    var dt = new Date(data.task.expire_at);
    var dt_toString = dateFormat(dt, 'HH:MM');
    tr += '<tr id="' + data.task.id + '">';
    tr += '<td>' + data.task.name + '</td>';
    tr += '<td>' + data.task.vendor.vendor_name + '</td>';
    tr += '<td>' + data.task.model + '</td>';
    tr += '<td><strong>' + dt_toString + '</strong></td>';
    tr += '</tr>';
    $('#table_content').append(tr);
    // console.log(data.task);
});

// var deleted = Echo.channel('deleted-channel');
// deleted.listen('.deleted-event', function (data) {
//     $('#' + data.task.id + '').remove();
//     console.log('deleted');
// });

// var updated = Echo.channel('updated-channel');
// updated.listen('.updated-event', function (data) {
//     var div;
//     var dt = new Date(data.task.expire_at);
//     var dt_toString = dateFormat(dt, 'HH:MM');
//     div += '<tr>';
//     div += '<td>' + data.task.name + '</td>';
//     div += '<td>' + data.task.vendor_name + '</td>';
//     div += '<td>' + data.task.model + '</td>';
//     div += '<td><strong>' + dt_toString + '</strong></td>';
//     div += '</tr>';
//     $('#table_content').append(div);
// });
