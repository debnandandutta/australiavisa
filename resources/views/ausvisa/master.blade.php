<!DOCTYPE html>
<html lang="en">
<head>
    <title>Australia Visa Malaysia</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <meta name="keywords" content="blog, business, clean, clear, cooporate, creative, design web, flat, marketing, minimal, portfolio, shop, shopping, unique">
    <meta name="author" content="Australia Visa Malaysia">
    <link rel="stylesheet" href="{{asset('/ausvisa')}}/css/style.css">
    <link rel="stylesheet" href="{{asset('/ausvisa')}}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('/ausvisa')}}/css/custom_bootstrap.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i&amp;display=swap">
    <link rel="stylesheet" href="{{asset('/ausvisa')}}/css/fontawesome.css">
    <link rel="stylesheet" href="{{asset('/ausvisa')}}/css/elegant.css">
    <link rel="stylesheet" href="{{asset('/ausvisa')}}/css/slick.css">
    <link rel="stylesheet" href="{{asset('/ausvisa')}}/css/animate.css">
    <link rel="stylesheet" href="{{asset('/ausvisa')}}/css/icomoon.css">
    <link rel="shortcut icon" href="{{asset('/ausvisa')}}/images/fav.png">
</head>
<body>
@include('ausvisa.include.header')



@yield('body')


@include('ausvisa.include.footer')
<script src="{{asset('/ausvisa')}}/js/jquery-3.4.0.min.js"></script>
<script src="{{asset('/ausvisa')}}/js/jquery-ui.min.js"></script>
<script src="{{asset('/ausvisa')}}/js/slick.min.js"></script>
<script src="{{asset('/ausvisa')}}/js/jquery.scrollUp.min.js"></script>
<script src="{{asset('/ausvisa')}}/js/numscroller-1.0.js"></script>
<script src="{{asset('/ausvisa')}}/js/chart.js"></script>
<script src="{{asset('/ausvisa')}}/js/masonry.pkgd.min.js"></script>
<script src="{{asset('/ausvisa')}}/js/jquery.countdown.min.js"></script>
<script src="{{asset('/ausvisa')}}/js/main.js"></script>
<script>

    jQuery(document).ready(function ($) {

        $("#visa_type").change(function(){

            $.ajax({

                url: "{{ route('visa.get_by_visa_type') }}?visa_type=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('#visa').html(data.html);
                }
            });
        });


    });
    jQuery(document).ready(function ($) {

        $("#servicedata-instant").on("click", function(){
            $(".service-box").removeClass("active ")
            $(this).addClass(" active");
            $(this).css("opacity", "0.9");
            var dataId = $(this).attr("data-price");
            var dataCurrency = $(this).attr("data-currency");
            var dataService = $(this).attr("data-service");
            var detail = $(this).attr("data-detail");
            var dataPerson = $(this).attr("data-person");
            var dataTotalOne = (dataId*dataPerson);
            var dataTotal = "RM ".concat(dataTotalOne.toFixed(2)).concat(dataCurrency);
            var dataCharge = $(this).attr("data-charge");
            var grandTotalOne = dataTotalOne + (dataTotalOne / 100 * dataCharge);
            var transactionCharge = "RM ".concat((dataTotalOne / 100 * dataCharge).toFixed(2)).concat(dataCurrency);
            var dataOrder = $(this).attr("data-order") +" - "+ $(this).attr("data-service-2");
            var dataName = $(this).attr("data-order") + $(this).attr("data-service-2");


            var grandTotal = "RM ".concat(grandTotalOne.toFixed(2)).concat(dataCurrency);
            $( ".unit-price" ).html( dataId );
            $( ".requested-service" ).html( dataService );
            $( ".product-price" ).html( dataTotal );
            $( ".visa-transaction-charge" ).html( transactionCharge );
            $( ".grand-total" ).html( grandTotal );
            $( "#grand-total-One" ).val( grandTotalOne );
            $( "#order-id" ).val( dataOrder );
            $( "#name" ).val( dataName );
            $.ajax({

                url: "{{ route('payment-hash') }}?detail=" + detail+"&&amount="+grandTotalOne+"&&orderId="+dataOrder,
                method: 'GET',
                success: function(data) {
                    $( "#hash" ).val( data );
                }
            });

        });
        $("#servicedata-express").on("click", function(){
            $(".service-box").removeClass("active ")
            $(this).addClass(" active");
            $(this).css("opacity", "0.9");
            var dataId = $(this).attr("data-price");
            var dataCurrency = $(this).attr("data-currency");
            var dataService = $(this).attr("data-service");
            var detail = $(this).attr("data-detail");
            var dataPerson = $(this).attr("data-person");
            var dataTotalOne = (dataId*dataPerson);
            var dataTotal = "RM ".concat(dataTotalOne.toFixed(2)).concat(dataCurrency);
            var dataCharge = $(this).attr("data-charge");
            var grandTotalOne = dataTotalOne + (dataTotalOne / 100 * dataCharge);
            var transactionCharge = "RM ".concat((dataTotalOne / 100 * dataCharge).toFixed(2)).concat(dataCurrency);
            var dataOrder = $(this).attr("data-order") +" - "+ $(this).attr("data-service-2");
            var dataName = $(this).attr("data-order") + $(this).attr("data-service-2");


            var grandTotal = "RM ".concat(grandTotalOne.toFixed(2)).concat(dataCurrency);
            $( ".unit-price" ).html( dataId );
            $( ".requested-service" ).html( dataService );
            $( ".product-price" ).html( dataTotal );
            $( ".visa-transaction-charge" ).html( transactionCharge );
            $( ".grand-total" ).html( grandTotal );
            $( "#grand-total-One" ).val( grandTotalOne );
            $( "#order-id" ).val( dataOrder );
            $( "#name" ).val( dataName );
            $.ajax({

                url: "{{ route('payment-hash') }}?detail=" + detail+"&&amount="+grandTotalOne+"&&orderId="+dataOrder,
                method: 'GET',
                success: function(data) {
                    $( "#hash" ).val( data );
                }
            });

        });
        $("#servicedata-standard").on("click", function(){
            $(".service-box").removeClass("active ")
            $(this).addClass(" active");
            $(this).css("opacity", "0.9");
            var dataId = $(this).attr("data-price");
            var dataCurrency = $(this).attr("data-currency");
            var dataService = $(this).attr("data-service");
            var detail = $(this).attr("data-detail");
            var dataPerson = $(this).attr("data-person");
            var dataTotalOne = (dataId*dataPerson);
            var dataTotal = "RM ".concat(dataTotalOne.toFixed(2)).concat(dataCurrency);
            var dataCharge = $(this).attr("data-charge");
            var grandTotalOne = dataTotalOne + (dataTotalOne / 100 * dataCharge);
            var transactionCharge = "RM ".concat((dataTotalOne / 100 * dataCharge).toFixed(2)).concat(dataCurrency);
            var dataOrder = $(this).attr("data-order") +" - "+ $(this).attr("data-service-2");
            var dataName = $(this).attr("data-order") + $(this).attr("data-service-2");


            var grandTotal = "RM ".concat(grandTotalOne.toFixed(2)).concat(dataCurrency);
            $( ".unit-price" ).html( dataId );
            $( ".requested-service" ).html( dataService );
            $( ".product-price" ).html( dataTotal );
            $( ".visa-transaction-charge" ).html( transactionCharge );
            $( ".grand-total" ).html( grandTotal );
            $( "#grand-total-One" ).val( grandTotalOne );
            $( "#order-id" ).val( dataOrder );
            $( "#name" ).val( dataName );
            $.ajax({

                url: "{{ route('payment-hash') }}?detail=" + detail+"&&amount="+grandTotalOne+"&&orderId="+dataOrder,
                method: 'GET',
                success: function(data) {
                    $( "#hash" ).val( data );
                }
            });

        });
        $("#servicedata-general").on("click", function(){
            $(".service-box").removeClass("active ")
            $(this).addClass(" active");
            $(this).css("opacity", "0.9");
            var dataId = $(this).attr("data-price");
            var dataCurrency = $(this).attr("data-currency");
            var dataService = $(this).attr("data-service");
            var detail = $(this).attr("data-detail");
            var dataPerson = $(this).attr("data-person");
            var dataTotalOne = (dataId*dataPerson);
            var dataTotal = "RM ".concat(dataTotalOne.toFixed(2)).concat(dataCurrency);
            var dataCharge = $(this).attr("data-charge");
            var grandTotalOne = dataTotalOne + (dataTotalOne / 100 * dataCharge);
            var transactionCharge = "RM ".concat((dataTotalOne / 100 * dataCharge).toFixed(2)).concat(dataCurrency);
            var dataOrder = $(this).attr("data-order") +" - "+ $(this).attr("data-service-2");
            var dataName = $(this).attr("data-order") + $(this).attr("data-service-2");


            var grandTotal = "RM ".concat(grandTotalOne.toFixed(2)).concat(dataCurrency);
            $( ".unit-price" ).html( dataId );
            $( ".requested-service" ).html( dataService );
            $( ".product-price" ).html( dataTotal );
            $( ".visa-transaction-charge" ).html( transactionCharge );
            $( ".grand-total" ).html( grandTotal );
            $( "#grand-total-One" ).val( grandTotalOne );
            $( "#order-id" ).val( dataOrder );
            $( "#name" ).val( dataName );
            $.ajax({

                url: "{{ route('payment-hash') }}?detail=" + detail+"&&amount="+grandTotalOne+"&&orderId="+dataOrder,
                method: 'GET',
                success: function(data) {
                    $( "#hash" ).val( data );
                }
            });
        });
        // on modal hide

    });

</script>
</body>
</html>
