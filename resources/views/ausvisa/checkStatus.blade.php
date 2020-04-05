@extends('ausvisa.master')
@section('body')
    <style>
        .content-boxed {
            position: relative;
            background-color: #FFF;
            padding: 40px 80px;
        }
        .search-form {
            display: block;
            position: relative;
            max-width: 540px;
            margin: 0 auto;
            margin-bottom: 35px;
        }
        form {
            display: inline-block;
            vertical-align: top;
            width: 100%;
        }
        .search-result {
            max-width: 640px;
            margin: 0 auto;
        }
        .search-list__item:last-child {
            border-bottom: 0;
        }
        .search-list__item {
            padding: 26px 0;
            border-bottom: 1px solid #e8e8e8;
            font-weight: 300;
        }
        .search-form__input {
            color: #213c79;
            padding: 14px 20px;
            padding-top: 16px;
            height: auto;
            padding-right: 130px;
            margin-bottom: 0;
            border: none;
            width: 100%;
            border-bottom: 1px solid #dfdfdf;
        }
        .search-form__button {
            position: absolute;
            right: 0;
            top: 5px;
            padding: 12px 67px 9px 34px;
            background-color: #e9aa13;
        }
        .btn--circle {
            border-radius: 30px !important;
        }
        h2, .h2 {
            font-size: 24px;
            line-height: 1.2;
            color: #213c79;
            font-weight: 300;
        }
    </style>
    <section class="blog">
        <div class="azir-container">
            <div class="blog-detail">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12"><a id="sidebar-opener" href="#"> <i class="icon_menu"></i>Open sidebar</a></div>
                            <div class="col-12 col-lg-12">

                                <div class="content-boxed search-page">
                                    <h2 class="text-center" style="margin-bottom: 50px;">
                                        What is your ETA <br>
                                        Application Reference Number?
                                    </h2>
                                    <form action="#" method="post" class="search-form">
                                        <input type="text"  name="search" class="search-form__input" placeholder="Enter your ETA reference number" required="">
                                        <div class="search-form__input-bottom"></div>
                                        <button class="btn-yellow btn--circle search-form__button">Go!</button>
                                    </form>
                                    <div class="search-result">
                                        <div class="search-list">
                                            <div class="search-list__item">
                                                <a class="search-list__link"><h3 class="mb-0">About ETA Visa Status Check</h3></a> <br>
                                                <p class="p-16" style="display:inline;">
                                                    Please enter the <strong>Unique</strong> Application Reference number (<strong>Our Reference number start with ETA and like as ETA00000001 or AUSETA00000001</strong>) that we were given you when you applied for </p><h3 style="font-size:14px;color:#434343;font-weight:400;display:inline;">ETA Visa</h3> with our website. If you have misplaced your Reference number you cannot use this system to check on your ETA Visa status. In that case, you can email us at  for assistance. <br>
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
