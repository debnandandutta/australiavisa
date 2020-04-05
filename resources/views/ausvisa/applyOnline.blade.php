@extends('ausvisa.master')
@section('body')

    <section class="services-detail">
        <div class="azir-container">
            <div class="row">
                <div class="col-12 col-lg-4 col-xl-3">
                    <div class="services-detail_sidebar" id="sidebar">
                        <div class="sidebar_section">
                            <div class="our-services">
                                <h3 class="sidebar-title">Our Sevices</h3>
                                <ul class="services-list">
                                    <li><a href="">Strategy & Planning</a></li>
                                    <li><a href="">Finance & Restructuring</a></li>
                                    <li><a href="">Estate Planning</a></li>
                                    <li><a href="">Consumer Markets</a></li>
                                    <li><a href="">Taxes & Efficiency</a></li>
                                    <li><a href="">Audit & Evaluation</a></li>
                                    <li><a href="">Financial Services</a></li>
                                    <li><a href="">Communications</a></li>
                                </ul>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-12 col-lg-8 col-xl-9">
                    <div class="services-detail_contents ">
                        <div class="col-12">
                            <p class="p-16 mb-15">And since you want to be competitive you want to come up with a material that will make you stand out and recognizable.</p>
                            <p class="p-16 mb-50">But because of the high rise and increase of commodities businesses find it hard and expensive to develop extravagant materials for advertising. Brochures as among the most preferred marketing tools used at present are among the excellent material that helps businesses effectively.</p>
                        </div>

                        <div class="col-12">
                         <form class="billing-detail_form">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="input-group">
                                        <label for="first-name">First name *</label>
                                        <input class="input-form" id="first-name" type="text" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="input-group">
                                        <label for="last-name">Last name *</label>
                                        <input class="input-form" id="last-name" type="text" required>
                                    </div>
                                </div>
                                <div class="col-12">

                                    <div class="input-group">
                                        <label for="address">Address*</label>
                                        <input class="input-form" id="address" type="text" required placeholder="Street Address">
                                        <input class="input-form" id="appartment" type="text" required placeholder="Apartment, suite, unite ect (optinal)">
                                    </div>
                                    <div class="input-group">
                                        <label for="city">Town/City*</label>
                                        <input class="input-form" id="city" type="text" required>
                                    </div>
                                    <div class="input-group">
                                        <label for="state">Country/States*</label>
                                        <input class="input-form" id="state" type="text" required>
                                    </div>
                                    <div class="input-group">
                                        <label for="postcode">Postcode/Zip*</label>
                                        <input class="input-form" id="postcode" type="text" required>
                                    </div>
                                    <div class="input-group">
                                        <label for="email">Email Address*</label>
                                        <input class="input-form" id="email" type="email" required>
                                    </div>
                                    <div class="input-group">
                                        <label for="phone">Phone*</label>
                                        <input class="input-form" id="phone" type="text" required>
                                    </div>
                                    <div class="input-group">
                                        <label for="note">Order notes (optional)</label>
                                        <textarea class="textarea-form" id="note" name="note" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
