@extends('layouts.core')

@section('content')
    <div class="container">
        <div class="my-5 ps-5 py-3 pe-3 contact-form">
            <div class="row">
                <div class="col-lg-4 ps-5 ps-3 mt-5">
                    <h2 class="text-light fw-bold">Contact Us</h2>

                    <p class="mt-3">Send us a message. <br> You'd receive our
                        feedback
                        within 72hours.</p>

                    <p class="fw-bold">Email: <a href="mailto:support@derivtraderx.com"
                            class="text-decoration-none">support@derivtraderx.com</a></p>

                </div>
                <div class="col-lg-8">
                    <form>
                        <div class="mb-3">
                            <label for="fullName" class="form-label fs-5 mb-0">Your Name</label>
                            <input type="text" class="form-control" name="fullName" id="fullName" />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fs-5 mb-0">Email address</label>
                            <input type="email" class="form-control" name="email" id="email"
                                aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-4">
                            <label for="message" class="form-label fs-5 mb-0">How can we help?</label>
                            <textarea class="form-control" name="message" id="message" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-outline-primary border-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <section class="p-0 m-0">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2909.229687474071!2d-76.30398468498092!3d43.183691190682!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d9e5c494d08c73%3A0xe97f417a3055c58b!2sSumac%20Dr%2C%20Lysander%2C%20NY%2013027%2C%20USA!5e0!3m2!1sen!2sng!4v1663233113564!5m2!1sen!2sng"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" class="w-100"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
@endsection
