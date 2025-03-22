jQuery(document).ready(function ($) {
  $(".view-details").on("click", function () {
    var postId = $(this).data("post-id");

    $.ajax({
      url: ajax_object.ajax_url, // admin-ajax.php ko dynamically fetch karna
      type: "POST",
      data: {
        action: "fetch_post_details",
        post_id: postId,
      },
      success: function (response) {
        var data = JSON.parse(response);
        $(".popup-content h2").text(data.title);
        $(".popup-content .popup-body").html(data.content);
        $(".popup-overlay").fadeIn();
      },
    });
  });

  $(".popup-close").on("click", function () {
    $(".popup-overlay").fadeOut();
  });
});
