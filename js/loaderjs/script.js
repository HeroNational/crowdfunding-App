$(document).ready(function() {
    $(".progress-bar").circularProgress({
        line_width: 3,
        color: "#007cf0ce",
        starting_position: 0, // 12.00 o' clock position, 25 stands for 3.00 o'clock (clock-wise)
        percent: 0, // percent starts from
        percentage: true,
        width:"200px",
        text: "Abodah Funding"
    }).circularProgress('animate', 100, 2000);
    $("#load").hide();
    $("#all").show();
});
// Mon loader
    $("body#all").hide();
    $("body#load").show();