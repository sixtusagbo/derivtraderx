@extends('layouts.core')

@section('content')
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
@endsection
