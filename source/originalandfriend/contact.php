<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>


<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

        <?php include 'includes/navbar.php'; ?>

        <div class="content-wrapper">


            <!-- Main content blog -->
            <section id="contact" class="contact">
                <div class="container">

                    <div class="row justify-content-center" data-aos="fade-up">

                        <div class="col-lg-12">

                            <div class="info-wrap">
                                <div class="row">
                                    <div class="col-lg-4 info">
                                        <i class="fa fa-address-card py-2 fa-4x text-info" aria-hidden="true"></i>
                                        <p style = "font-size: 30px; color:black;">ที่อยู่</p>
                                        <p>114 ซอยสุขุมวิท 23 เขตวัฒนา<br>กรุงเทพมหานคร 10110</p>
                                    </div>

                                    <div class="col-lg-4 info mt-4 mt-lg-0">
                                        <i class="fa fa-envelope  py-2 fa-4x text-info" aria-hidden="true"></i>
                                        <p style = "font-size: 30px; color:black;">อีเมลล์</p>
                                        <p>originalandfriend@gmail.com<br><br></p>
                                    </div>

                                    <div class="col-lg-4 info mt-4 mt-lg-0">
                                        <i class="fa fa-phone-square py-2 fa-4x text-info" aria-hidden="true"></i>
                                        <p style = "font-size: 30px; color:black;">เบอร์ติดต่อ</p>
                                        <p>0969418899<br><br></p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="row mt-5 justify-content-center" data-aos="fade-up">
                        <div class="col-lg-12">
                            <form action="contact_send.php" method="post" role="form"
                                class="php-email-form has-feedback">
                                <div class="form-row">
                                    <div class="col-md-6 form-group">
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Your Name" data-rule="minlen:4"
                                            data-msg="Please enter at least 4 chars" required />
                                        <div class="validate"></div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Your Email" data-rule="email"
                                            data-msg="Please enter a valid email" required />
                                        <div class="validate"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" id="subject"
                                        placeholder="Subject" data-rule="minlen:4"
                                        data-msg="Please enter at least 8 chars of subject" required />
                                    <div class="validate"></div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="message" rows="5" data-rule="required"
                                        data-msg="Please write something for us" placeholder="Message"
                                        required></textarea>
                                    <div class="validate"></div>
                                </div>
                                <div class="text-center"><button type="submit">ส่งข้อความ</button></div>



                            </form>
                        </div>

                    </div>

                </div>
            </section><!-- End Contact Section -->


        </div>

        <?php include 'includes/footer.php'; ?>
    </div>

    <?php include 'includes/scripts.php'; ?>
</body>

</html>