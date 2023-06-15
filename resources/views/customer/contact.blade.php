@extends('customer.master')
@section('judul', 'UMKM Malang')
@section('isi')

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>UMKM Malang</h2>
                <ol>
                    <li><a href="">Home</a></li>
                    <li><a href="">Contact Us</a></li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Contact Us</h2>
                <p>You can contact us through some of our contact information. We are waiting for communication from you.
                </p>
            </div>

            <div>
                <iframe style="border:0; width: 100%; height: 270px;"
                    src="https://www.google.com/maps/d/embed?mid=18a6YQvnaHgW60YUfn5jfThhr81o&ie=UTF8&hl=en&msa=0&ll=-7.976617999999985%2C112.63320900000001&spn=0%2C0&t=h&output=embed&s=AARTsJrjkABOks00kyY6wuIBo4Ydmp2Z1g&z=17"
                    frameborder="0" allowfullscreen>
                  </iframe>
            </div>

            <div class="row mt-5">

                <div class="col-lg-4">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Location:</h4>
                            <p>Soekarno Hatta Street No. 49, Malang</p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>umkmMalang@gmail.com</p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p>+62 857 6983 1267</p>
                        </div>

                    </div>

                </div>

                <div class="col-lg-8 mt-5 mt-lg-0">

                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row gy-2 gx-md-3">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Your Email" required>
                            </div>
                            <div class="form-group col-12">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" required>
                            </div>
                            <div class="form-group col-12">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3 col-12">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center col-12"><button type="submit">Send Message</button></div>
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

@endsection
