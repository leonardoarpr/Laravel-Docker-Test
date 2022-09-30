let createTable = (distance) => {
    fetch('http://localhost/affiliates/distance/'+distance).then(function (response) {
        return response.json();
    }).then(function (affiliates) {
        let html = ''
        for (let i in affiliates) {
            html += '<tr>';
            html += '    <td>' + affiliates[i]["affiliate_id"] + '</td>';
            html += '    <td>' + affiliates[i]["name"] + '</td>';
            html += '    <td>' + affiliates[i]["distance"] + '</td>';
            html += '<tr>';
        }
        $('#affiliates tbody').html(html);
    }).catch(function (e) {
        console.log(e);
    });
}
function alterDistance () {
    let distance = $('#distance').val();
    createTable(distance);
}

$(function () {
    let distance = $('#distance').val();
    createTable(distance);
});
