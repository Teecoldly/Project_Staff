$(document).ready(function () {
    $(document).on("click", "#reload", function (e) {
        e.preventDefault();
        window.location.reload()
    });
    $(document).on("click", "#print", function (e) {
        e.preventDefault();
        window.print();
    });
});