// print btn functionality start for publications page

$(".publications_filter_wrap  .printBtn").click(function (e) {
    var publicationTypes = [];
    $('#publication-type input[type="checkbox"]:checked').each(function () {
        publicationTypes.push($(this).val());
        console.log(publicationTypes);
    });
    var publicationTopics = [];
    $('#publication-topics input[type="checkbox"]:checked').each(function () {
        publicationTopics.push($(this).val());
        console.log(publicationTopics);
    });
    e.preventDefault();
    console.log("publicationTypes " + publicationTypes);
    console.log("publicationTopics " + publicationTopics);
    var form = $("<form>").attr({
        method: "POST",
        action: "publications_post_print",
    });

    // Create input fields and set their values
    var publicationTypes = $("<input>").attr({
        type: "hidden",
        name: "publicationtypes",
        value: publicationTypes,
    });
    var publicationTopics = $("<input>").attr({
        type: "hidden",
        name: "publicationtopics",
        value: publicationTopics,
    });

    // Append input fields to the form
    form.append(publicationTypes, publicationTopics);

    // Append form to the body and submit it
    $("body").append(form);
    form.submit();
});

//trigger the print btn
setTimeout(function () {
    $(".publications_filter_wrap  .print_btn_here").click();
}, 2000);

// print button functionality
$(document).on(
    "click",
    ".publications_filter_wrap  .print_btn_here",
    function (e) {
        e.preventDefault();

        // print callback function
        printFunction();

        function printFunction() {
            $(".publications_filter_wrap .results_wrapper ").print({
                globalStyles: true, //Whether or not the styles from the parent document should be included
                stylesheet: null, //URL of an external stylesheet to be included
                noPrintSelector: ".no-print", //A selector for the items that are to be excluded from printing
                append: null, //Adds custom HTML before (prepend) or after (append) the selected content
                prepend:
                    "<img class='my-4' src='/wp-content/uploads/2024/04/logo.svg'>", //Adds custom HTML before (prepend) or after (append) the selected content
                timeout: 1000, //To change the amount of max time to wait for the content, etc to load before printing the element from the new window/iframe created,
                title: null, //To change the printed title
                printable: "invoice-print-div",
                type: "html",
                style: [
                    "@page { size: A4; margin-top: 0.94mm; margin-bottom: 2.1mm;} body {margin: 0;} h4 {margin:0}",
                ],
                targetStyles: ["*"],
            });
        }
    }
);
// print btn functionality end for publications page