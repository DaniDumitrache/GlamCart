$(document).ready(function () {
  $("#ApplyCupon").click(function (e) {
    e.preventDefault();

    Cupon = $("#Cupon");
    TotalCart = $("#CartTotal");
    SubTotalCart = $("#CartSubTotal");

    if (Cupon.val()) {
      $.ajax({
        url: "assets/php/action.php",
        method: "POST",
        data: "Cupon=" + Cupon.val() + "&action=GetDataCupon",
        success: function (response) {
          console.log(response);
          if (response != "DataNotFound") {
            response = JSON.parse(response);
            if (response.Code) {
              // console.log((1000 * (100 - 20)) / 100);
              currency = Load.currency;
              Total = Load.Total;
              SubTotal = Load.SubTotal;
              Discount = response.Discount;

              switch (currency) {
                case "RON":
                  $.ajax({
                    url: "assets/php/action.php",
                    method: "POST",
                    data:
                      "Cupon=" +

                      Cupon.val() +
                      "&ip=" +
                      ClientIp +
                      "&action=SetCupon",
                    success: function (resp) {
                      console.log(resp);
                      switch (resp) {
                        case "CouponSet":
                          $("#CuponError").show();
                          $("#CuponError").text(
                            "you have already used this promo code"
                          );
                          break;

                        case "CupponUsedSuccess":
                          $("#CuponError").hide();
                          $("#CuponError").text("");
                          Eur = 4.9;
                          CalculateTotal = Eur * Total;
                          ToTotal =
                            (CalculateTotal.toFixed(2) * (100 - Discount)) /
                            100;
                          TotalCart.text(ToTotal.toFixed(2) + " " + currency);

                          CalculateSubTotal = Eur * SubTotal;
                          ToSubTotal =
                            (CalculateSubTotal.toFixed(2) * (100 - Discount)) /
                            100;
                          SubTotalCart.text(
                            ToSubTotal.toFixed(2) + " " + currency
                          );
                          break;
                      }
                    },
                  });
                  break;

                case "EUR":
                  $.ajax({
                    url: "assets/php/action.php",
                    method: "POST",
                    data:
                      "Cupon=" +
                      Cupon.val() +
                      "&ip=" +
                      ClientIp +
                      "&action=SetCupon",
                    success: function (resp) {
                      console.log(resp);
                      switch (resp) {
                        case "CouponSet":
                          $("#CuponError").show();
                          $("#CuponError").text(
                            "you have already used this promo code"
                          );
                          break;

                        case "CupponUsedSuccess":
                          CalculateTotal = Total;
                          ToTotal =
                            (CalculateTotal.toFixed(2) * (100 - Discount)) /
                            100;
                          TotalCart.text(ToTotal.toFixed(2) + "€");

                          CalculateSubTotal = SubTotal;
                          ToSubTotal =
                            (CalculateSubTotal.toFixed(2) * (100 - Discount)) /
                            100;
                          SubTotalCart.text(ToSubTotal.toFixed(2) + "€");
                          break;
                      }
                    },
                  });

                  break;
              }
            }
          } else {
            $("#CuponError").show();
            $("#CuponError").text("Code not working");
          }
        },
      });
    } else {
      $("#CuponError").show();
      $("#CuponError").text("Please fill in the coupon code");
    }
  });
});