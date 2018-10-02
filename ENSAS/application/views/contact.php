<!--contact form-->
<div id="slider" class="flexslider">
        <ul class="slides">
            <li>
            	<img src="/ENSAS/public/images/ensas.jpg"/>
            </li>
        </ul>
    </div>
		<div id="contact">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
						<div class="contact-heading">
							<h2>Contact</h2> 
							<p>Pour plus d'informations et pour partager avec nous vos points de vues</p>
						</div>
					</div>
				</div>   	
	    	</div>

	    	<div id="google-map" data-latitude="32.326829" data-longitude="-9.263611"></div>
            
		</div>

		<div id="get-touch">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
						<div class="get-touch-heading">
							<h2>Envoi de vos points de vue</h2> 
						
						</div>
					</div>
				</div>   

				<div class="content">
	                <div class="row">
                        <div id="sendmessage">Your message has been sent. Thank you!</div>
                        <div id="errormessage"></div>
                        
                         <form action="" method="post" role="form" class="form contactForm">
	                        <div class="col-md-4">
	                            <div class="form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <div class="validation"></div>
                                </div>
	                        </div>
	                        <div class="col-md-4">
	                            <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                    <div class="validation"></div>
                                </div>
	                        </div>
	                        <div class="col-md-4">
	                            <div class="form-group">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                    <div class="validation"></div>
                                </div>
	                        </div>
	                        <div class="col-md-12">
	                            <div class="form-group">
                                    <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                    <div class="validation"></div>
                                </div>
	                        </div>
	                        <div class="submit">
	                            <button class="btn btn-default" type="submit">Send Now</button>
	                        </div>
	                    </form>
	                </div>
            </div>	
	    	</div>
		</div>
