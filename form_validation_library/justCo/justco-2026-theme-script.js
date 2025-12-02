window.addEventListener("load", () => {
  $(".justco_form_mv select").each(function () {
    $(this).select2({
      allowClear: false,
      dropdownParent: $(this).parent(),
      minimumResultsForSearch: Infinity,
    });
  });
  document.querySelectorAll(".justco_form_mv form").forEach((formEl) => {
    new FormValidator(formEl, {
      onSuccess: function (formData, formElement) {
        const formId = formElement.id;
        console.log("Form Submitted:", formId);

        if (formId === "talktous") {
          console.log("talktous Form Success Logic");
        }
      },
    });
  });
});
