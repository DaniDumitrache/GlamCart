$(document).ready(function () {
  $("#PlaceDelivery").click(function (e) {
    e.preventDefault();

    PhoneNumber = $("#PhoneNumber");
    CountryAndRegion = $("#CountryAndRegion");
    Adress = $("#Adress");
    ApartmentAndSuite = $("#ApartmentAndSuite");
    PostalCode = $("#PostalCode");
    city = $("#city");

    if (
      PhoneNumber.val() &&
      CountryAndRegion.val() &&
      Adress.val() &&
      ApartmentAndSuite.val() &&
      PostalCode.val() &&
      city.val()
    ) {
      $.ajax({
        url: "../assets/php/action.php",
        method: "POST",
        data:
          "PhoneNumber=" +
          PhoneNumber.val() +
          "&CountryAndRegion=" +
          CountryAndRegion.val() +
          "&Adress=" +
          Adress.val() +
          "&ApartmentAndSuite=" +
          ApartmentAndSuite.val() +
          "&PostalCode=" +
          PostalCode.val() +
          "&city=" +
          city.val() +
          "&action=Delivery",
        success: function (response) {
          console.log(response);
        },
      });
    }
  });
});
