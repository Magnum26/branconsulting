<?php
require_once('include/phpmailer/class.phpmailer.php');
$mail = new PHPMailer();
$mail->SMTPDebug = 0; //verbode debug
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->Username = "info@branconsulting.co.uk";
$mail->Password = "VOG#1966";

if( isset( $_POST['contactformsubmit'] ) AND $_POST['contactformsubmit'] == 'submit' ) {
    if( $_POST['contactformname'] != '' AND $_POST['contactformemail'] != '' AND $_POST['contactformmessage'] != '' ) {

        $name = $_POST['contactformname'];
        $email = $_POST['contactformemail'];
        $phone = $_POST['contactformphone'];
        $message = $_POST['contactformmessage'];

        $subject = isset($subject) ? $subject : 'New Message From Your Contact Form';

        $botcheck = $_POST['contactformbotcheck'];

        $toemail = 'info@branconsulting.co.uk'; // Your Email Address
        $toname = 'Robert Woolcock'; // Your Name

        if( $botcheck == '' ) {

            $mail->SetFrom( $email , $name );
            $mail->AddReplyTo( $email , $name );
            $mail->AddAddress( $toemail , $toname );

            $name = isset($name) ? "Name: $name<br><br>" : '';
            $email = isset($email) ? "Email: $email<br><br>" : '';
            $phone = isset($phone) ? "Phone: $phone<br><br>" : '';
            $message = isset($message) ? "Message: $message<br><br>" : '';

            $referrer = $_SERVER['HTTP_REFERER'] ? '<br><br><br>This Form was submitted from: ' . $_SERVER['HTTP_REFERER'] : '';

            $body = "$name $email $phone $message $referrer";

            $mail->MsgHTML( $body );
            $sendEmail = $mail->Send();

            if( $sendEmail == true ):
                $sent = '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
                    <p class="alert alert-success" id="hide">We have <strong>successfully</strong> received your Message and will get back to you as soon as possible.</p>
                    <script type="text/javascript">
                    $(function(){
                    $("#hide").delay(6000).fadeOut(3000);
                    });
                    </script>
                    ';
            else:
                echo '<p class="alert alert-warning" data-fade="1000">Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>Reason:</strong><br />' . $mail->ErrorInfo . '</p>';
            endif;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Bran Consulting Ltd | Contact Us</title>
    <meta name="keywords" content="Bran Consulting Ltd, branconsulting, m&amp;e building services, building services, mechanical enginerring, electrical enginerring" />
    <meta name="description" content="" />
    <meta name="author" content="humans.txt">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    <link href="stylesheets/styles.css" rel="stylesheet">
    </head>
        <body>
            <header>
                <div class="container">
                    <div class="row">
                        <div class="col-md-1 col-sm-2">
                            <img src="images/raven.png" alt="raven" />
                        </div>
                        <div class="col-md-8 logo col-sm-7">
                            <a href="index.html">
                                <h1>Bran Consulting Ltd</h1>
                                <h3>M &amp; E Building Services</h3>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-3">
                        <img src="images/logos.gif" alt="Accreditation logos" class="img-rounded logos img-responsive" />
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <nav>
                                <ul class="nav nav-pills nav-justified">
                                    <li role="presentation"><a href="index.html">Home</a></li>
                                    <li role="presentation"><a href="about.html">About</a></li>
                                    <li role="presentation" class="active"><a href="#">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </header>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Contact</h1>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Send us an Email</h3>
                        <form class="nobottommargin" id="contactform" name="contactform" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="form-process"></div>
                                <div class="form-group">
                                    <div id="contact-form-result" data-notify-type="success"></div>
                                    <label class="control-label" for="contactformname">Name <small>*</small></label>
                                    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
                                    <input type="text" id="contactformname" name="contactformname" value="" class="sm-form-control form-control required" />
                                </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="contactformemail">Email <small>*</small></label>
                                    <div class="input-group">
       <span class="input-group-addon"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i></span>
                                    <input type="email" id="contactformemail" name="contactformemail" value="" class="required email sm-form-control form-control" />
                                </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="contactformphone">Phone <small>*</small></label>
                                    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i></span>
                                    <input type="text" id="contactformphone" name="contactformphone" value="" class="required sm-form-control form-control" />
                                </div>
                            </div>
                                <div class="form-group">
                                    <label class="control-label" for="contactformmessage">Message <small>*</small></label>
                                    <textarea class="required sm-form-control form-control" id="contactformmessage" name="contactformmessage" rows="6" cols="30"></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 hidden">
                                        <input type="text" id="contactformbotcheck" name="contactformbotcheck" value="" class="sm-form-control form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="margintopmed">
                                        <p><small>* Required</small></p>
                                        <button class="btn btn-secondary" type="submit" id="contactformsubmit" name="contactformsubmit" value="submit">Send Message</button>
                                    </div>
                                </div>
                                <?php echo $sent ?>
                            </form>
                    </div>
                </div>
            </div>
            <section class="contactbar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center center-block">
                            <h4>Call us today on <span>07789 408 120</span> or Email us at <span>info@branconsulting.co.uk</span></h4>
                            <a href="contact_us.html" class="btn btn-default">Contact Us</a>
                        </div>
                    </div>
                </div>
            </section>
            <footer>
                <div class="container copyright">
                    <div class="row">
                        <div class="col-md-12">
                            <p>&copy; 2017 <a href="http://www.everylastbyte.co.uk">Every Last Byte Ltd</a></p>
                        </div>
                    </div>
                </div>
            </footer>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
            <script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
            <script src="javascripts/validation.js"></script>
        </body>

</html>
