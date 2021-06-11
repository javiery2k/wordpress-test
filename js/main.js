

(function ($) {
    $(".read-more").click(function () {
        alert($(this).data("id"))
        $("#modal-post").addClass("is-active");

        
    })

    $(document).on("click", ".modal-close", function () {
        $(".modal").removeClass("is-active");
    });
})(jQuery);