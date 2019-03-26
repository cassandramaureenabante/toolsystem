$(document).ready(function () {
    $("#add").click(function () {
        var $toolname = $("select[name$='toolname']:first").clone();
        $("form").append("<br/>").append($toolname);
    });
});