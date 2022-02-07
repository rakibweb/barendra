<?php
    include "head.php";
   
    include "innermenu.php";
    
    
?>
			</div>
		</div>
	</header>
	<div class="main-content shop-page contact-page">
		<div class="container">
			<div class="breadcrumbs">
				<a href="http://shop.barendro.com/">Home</a> / <span class="current">contact</span>
			</div>
			<div class="row content-form ">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 map-content">
					
					
					<div class="map-sec">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3634.4535067982097!2d88.60251271499315!3d24.365522284289803!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fbef013a3013ef%3A0xeafe0096b9753268!2sBarendro+Dot+Com!5e0!3m2!1sen!2sbd!4v1564372943166!5m2!1sen!2sbd" width="600" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
					<div class="information-form">
						<h4 class=" main-title">Stay Contact Us</h4>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<h5 class="title">Store 1</h5>
								<ul class="list-info">
									<li>
										<div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
										<div class="info">
											<h5 class="subtitle">Email</h5>
											<a href="contact.php" class="des">hello@barendro.com</a>
										</div>
									</li>
									<li>
										<div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
										<div class="info">
											<h5 class="subtitle">Phone</h5>
											<p class="des">09-669-966-888</p>
										</div>
									</li>
									<li>
										<div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
										<div class="info">
											<p class="des">367-Anuranan, Boyalia Thanar More Alupotti, Rajshahi- 6100.</p>
										</div>
									</li>
								</ul>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<h5 class="title">Hours Of Opening</h5>
								<ul class="time-work">
									<li><div class="day">Monday:</div><div class="time">08.30 AM</div></li>
									<li><div class="day">Tuesday:</div><div class="time">08.30 AM</div></li>
									<li><div class="day">Wendnesday:</div><div class="time">08.30 AM</div></li>
									<li><div class="day">Thursday:</div><div class="time">08.30 AM</div></li>
									<li><div class="day">Friday:</div><div class="time">08.30 AM</div></li>
									<li><div class="day">Saturday:</div><div class="time">08.30 AM</div></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 info-content">
					<div class="contact-form">
						<h4 class="main-title">SEND US A MESSAGE</h4>
						<p align="justify" class="des">Wherever and whenever you need us. We are here for you - contact us for all your support needs, be it technical, general queries or information support. Our hotline numbers and e-mail are open 24x7 for your needs.</p>
						<div class="row">
						    <form action="#" method="POST">
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							    <span class="label-text">Your Name</span>
								<input type="text" class="input-info" name="name" id="name">
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<span class="label-text">Email Address</span>
								<input type="text" class="input-info" name="mail" id="mail">	
							</div>
						</div>
						<span class="label-text">Phone Number</span>
						<input type="number" class="input-info" name="phone" id="phone">	
						<span class="label-text">Subject</span>
						<input type="text" class="input-info" name="subject" id="subject">	
						<span class="label-text">Your Message</span>
						<textarea rows="8"  class="input-info input-note" name="message" id="message"></textarea>
						<div class="group-button">
						<input type="submit" name="mailsubmit" value="Submit"  id="mailsubmit">
							
							<?php
                            	 if(isset($_POST["mailsubmit"])){
                            
                                	$name = $_POST["name"];
                                	$mail = $_POST["mail"];
                                	$phone = $_POST["phone"];
                                	$subject = $_POST["subject"];
                                	
                                	$message = $_POST["name"];
                                	$message .= $_POST["phone"];
                                	$message .= $_POST["mail"];
                                	$message .= $_POST["message"];
                                	
                                    //email sending
                                    $from = 'moshiurbci@gmail.com';
                                    $to = "moshiurbci@gmail.com";
                                    
                                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                                    $headers .= 'From: '.$from."\r\n". 'Reply-To: '.$from."\r\n" . 'X-Mailer: PHP/' . phpversion();
                                    
                                    
                                    if(mail($to, $subject, $message, $headers)){   
                                        echo "Email sent successfully.";
                                    }
                            	 }
                                 ?>
							
							</form>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<?php
	    include "footer.php";
    ?>