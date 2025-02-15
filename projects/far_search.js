$(".faq_accordion").append($("<p id='noResults' class='alert ' style='display: none; color: red;'>No search results found</p>"));

$(".faq_wrap .form-group input[type='text']").on("keyup", function () {
    var searchText = $(this).val().toLowerCase();
    // console.log(searchText);
    var matchFound = false;


    $(".accordion-item").each(function () {
        var question = $(this).find(".accordion-item-header").text().toLowerCase();

        if (question.includes(searchText)) {
            $(this).show();
            matchFound = true;
        } else {
            $(this).hide();
        }
    });

    // Show "No search results found" message if no matches
    if (!matchFound) {
        $("#noResults").show();
    } else {
        $("#noResults").hide();
    }
});
