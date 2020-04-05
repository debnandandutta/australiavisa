@extends('ausvisa.master')
@section('body')
    <section class="contact-us">
        <div class="contact-infomation">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3690.0563861645855!2d91.8202308147878!3d22.351499685296993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd899dbf98d15%3A0xb23da7ef7b7094a1!2sChittagong%20WASA!5e0!3m2!1sen!2sbd!4v1579884527785!5m2!1sen!2sbd" width="100%" height="550" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            <div class="azir-container">
                <div class="infomation-box_wrapper">
                    <div class="infomation-box">
                        <h5 class="mb-20 h5">Infomation</h5>
                        <ul class="ul-16">
                            <li> <i class="fas fa-phone-alt"></i>001-1234-88888</li>
                            <li> <i class="fas fa-map-marker-alt"></i>350 5th Ave, New York</li>
                            <li> <i class="fas fa-envelope"></i>info.deerceative@gmail.com</li>
                        </ul>
                        <h5 class="mb-20 h5">Opening Hours</h5>
                        <ul class="opening-hours">
                            <li>Monday - Friday<span>10:00 - 22:00</span></li>
                            <li>Saturday<span>10:00 - 17:00</span></li>
                            <li>Sunday<span>10:00 - 13:00</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-content">
            <div class="azir-container">
                <div class="layout-2col-ti">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-6">
                            <div class="layout-2col-ti_left">
                                <div class="contact-content_left">
                                    <div class="section-header-style-2">
                                        <h1 class="h1">Let me help you</h1>
                                        <p class="p-16">If you have any questions, please fill in the box below, We will reply to you as soon as possible</p>
                                        <form>
                                            <input class="input-form" type="text" placeholder="Name">
                                            <input class="input-form" type="text" placeholder="Phone">
                                            <input class="input-form" type="text" placeholder="Subject">
                                            <textarea class="textarea-form" name="" cols="30" rows="5" placeholder="Message"></textarea>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="layout-2col-ti_right">
                                <div class="contact-content_right"><img class="img-fluid" src="{{asset('/ausvisa')}}/images/pages/approach/illus-1.svg" alt="conact image"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

