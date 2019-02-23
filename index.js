document.addEventListener("DOMContentLoaded", function(event) {
  var natAvgMale = new Array(
    100,
    140,
    4.45,
    101,
    26,
    1.025,
    5.2,
    10.5,
    0.85,
    189,
    175,
    13.15
  );
  var natAvgMaleLeniencies = new Array(
    10,
    3.85,
    16.85,
    4.95,
    11.54,
    18.05,
    35,
    10,
    11.76,
    10,
    28.57,
    30.04
  );
  var natAvgFemale = new Array(
    100,
    140,
    4.45,
    101,
    26,
    1.025,
    4.2,
    10.5,
    0.85,
    189,
    175,
    13.15
  );
  var natAvgFemaleLeniencies = new Array(
    10,
    3.85,
    16.85,
    4.95,
    11.54,
    18.05,
    42.86,
    10,
    11.76,
    10,
    28.57,
    30.04
  );

  var natAvg;
  var leniencies;

  if ($("#exampleFormControlSelect1").val() == "Male") {
    natAvg = natAvgMale;
    leniencies = natAvgMaleLeniencies;
  } else if ($("#exampleFormControlSelect1").val() == "Female") {
    natAvg = natAvgFemale;
    leniencies = natAvgFemaleLeniencies;
  }

  var overallHealth;
  var sum = 0;
  var counter = 0;

  $(".progress-bar").each(function(i, obj) {
    if (
      ($(this).width() /
        $(this)
          .parent()
          .width()) *
        100 <
        50 - leniencies[i] / natAvg[i] ||
      ($(this).width() /
        $(this)
          .parent()
          .width()) *
        100 >
        50 + leniencies[i] / natAvg[i]
    ) {
      $(this).addClass("bg-danger");
    }

    sum +=
      ($(this).width() /
        $(this)
          .parent()
          .width()) *
      100;
    counter++;
  });

  overallHealth = 100 - 2 * Math.abs(sum / counter - 50);
  alert(overallHealth);
});
