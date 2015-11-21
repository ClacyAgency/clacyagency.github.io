<?php
	// Start session.
	session_start();
	
	// Set a key, checked in mailer, prevents against spammers trying to hijack the mailer.
	$security_token = $_SESSION['security_token'] = uniqid(rand());
	
	if ( ! isset($_SESSION['formMessage'])) {
		$_SESSION['formMessage'] = '<h2>Send us a message</h2>
We always look for new and exciting projects! Fill in the form below to send us a message and hopefully we can work on a project together!';	
	}
	
	if ( ! isset($_SESSION['formFooter'])) {
		$_SESSION['formFooter'] = '<br /><h5>We get back to you as soon as possible</h5>
We will do our best to get back to you with in 48 hours after receiving your message.';
	}
	
	if ( ! isset($_SESSION['form'])) {
		$_SESSION['form'] = array();
	}
	
	function check($field, $type = '', $value = '') {
		$string = "";
		if (isset($_SESSION['form'][$field])) {
			switch($type) {
				case 'checkbox':
					$string = 'checked="checked"';
					break;
				case 'radio':
					if($_SESSION['form'][$field] === $value) {
						$string = 'checked="checked"';
					}
					break;
				case 'select':
					if($_SESSION['form'][$field] === $value) {
						$string = 'selected="selected"';
					}
					break;
				default:
					$string = $_SESSION['form'][$field];
			}
		}
		return $string;
	}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="generator" content="Jekyll" />
		
		<!-- Meta tags -->
	  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

		<title>Clacy | contact us</title>

		<!-- Load some fonts from Google's Font service -->
		<link href='http://fonts.googleapis.com/css?family=Raleway:300' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open Sans:400,300,800|Noto Serif' rel='stylesheet' type='text/css'>

		<!-- CSS stylesheets reset -->
	  <link rel="stylesheet" type="text/css" media="all" href="../css/home.css" />

	  <!-- Loads Font Awesome v4.0.3 CSS from CDN -->
	  <link href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">		

		<!-- Base RapidWeaver javascript -->
		<script type="text/javascript" src="../js/theme.js"></script>

		<!-- jQuery 1.8 is included in the theme internally -->
	  <script src="../js/jquery.min.js"></script>

	  <!-- Theme specific javascript, along with jQuery Easing and a few other elements -->
	  <script src="../js/elixir.js"></script>
	</head>	

	<body>

			<header role="banner">

				<div id="lang">
					<a href="../pt/" title="Visualizar em Português">Português</a>
				</div>
				
				<div id="title_wrapper">
						<!-- Site Title -->
						<h1 id="site_title" data-0="opacity: 1; top:0px;" data-600="opacity: 0; top: 80px;" data-anchor-target="#site_title">
							Clacy
						</h1>

						<!-- Site Slogan -->
						<h2 id="site_slogan" data-0="opacity: 1; top:0px;" data-600="opacity: 0; top: 80px;" data-anchor-target="#site_slogan">
							Changing lives with one app at a time
						</h2>

						<!-- Scroll down button -->
						<div id="scroll_down_button" data-0="opacity: 1; top:0px;" data-400="opacity: 0; top: 100px;" data-anchor-target="#scroll_down_button">
							<i class="fa fa-angle-down"></i>
						</div>
				</div>
				
				<!-- Top level navigation -->
				<div id="navigation_bar">
					<div id="brand" data-0="opacity: 0" data-600="opacity: 1">
						Clacy
					</div>

					<div class="row site_width">
						<div class="large-12 columns">
							<nav id="top_navigation">
							<ul>
								<li><a href="../index.html#navigation_bar" rel="">Agency</a></li>
								<li><a href="../work/index.html#navigation_bar" rel="">Work</a></li>
								<li><a href="../team/index.html#navigation_bar" rel="">Team</a></li>
								<li><a href="./" rel="" id="current">Contact us</a></li>
								<li><!-- Fix --></li>
							</ul>
							</nav>
						</div>
					</div>
				</div>

			</header>

		<!-- Mobile Navigation -->
		<div id="mobile_navigation_toggle">
			<i id="mobile_navigation_toggle_icon" class="fa fa-bars"></i>
		</div>
		<nav id="mobile_navigation">
			<ul>
			<li><a href="../index.html#mobile_navigation_toggle" rel="">Agency</a></li>
			<li><a href="../work/index.html#mobile_navigation_toggle" rel="">Work</a></li>
			<li><a href="../team/index.html#mobile_navigation_toggle" rel="">Team</a></li>
			<li><a href="./" rel="" id="current">Contact us</a></li>
			</ul>
		</nav>

		<div id="mobile_brand" data-0="opacity: 0" data-600="opacity: 1">
			Clacy
		</div>

		<!-- Main Content area and sidebar -->
		<div class="row site_width" id="container">

			<section id="content"class="large-8 columns">
				<div class="message-text"><?php echo $_SESSION['formMessage']; unset($_SESSION['formMessage']); ?></div><br />

				<form action="./files/mailer.php" method="post" enctype="multipart/form-data">
					 <div>
						<label>Your Name</label> *<br />
						<input class="form-input-field" type="text" value="<?php echo check('element0'); ?>" name="form[element0]" size="40"/><br /><br />

						<label>Your Email</label> *<br />
						<input class="form-input-field" type="text" value="<?php echo check('element1'); ?>" name="form[element1]" size="40"/><br /><br />

						<label>Subject</label> *<br />
						<input class="form-input-field" type="text" value="<?php echo check('element2'); ?>" name="form[element2]" size="40"/><br /><br />

						<label>Estimated Budget:</label> <br />
						<select name="form[element3]">			<option <?php echo check('element3', 'select','Not sure'); ?> value="Not sure">Not sure</option>
							<option <?php echo check('element3', 'select','€50 - €100'); ?> value="€50 - €100">€50 - €100</option>
							<option <?php echo check('element3', 'select','€100 - €500'); ?> value="€100 - €500">€100 - €500</option>
							<option <?php echo check('element3', 'select','€500 - €1,000'); ?> value="€500 - €1,000">€500 - €1,000</option>
							<option <?php echo check('element3', 'select','€1,000 - €5,000'); ?> value="€1,000 - €5,000">€1,000 - €5,000</option>
							<option <?php echo check('element3', 'select','€5,000 +'); ?> value="€5,000 +">€5,000 +</option>
						</select><br /><br />

						<label>Message</label> *<br />
						<textarea class="form-input-field" name="form[element4]" rows="8" cols="38"><?php echo check('element4'); ?></textarea><br /><br />

						<div style="display: none;">
							<label>Spam Protection: Please don't fill this in:</label>
							<textarea name="comment" rows="1" cols="1"></textarea>
						</div>
						<input type="hidden" name="form_token" value="<?php echo $security_token; ?>" />
						<input class="form-input-button" type="reset" name="resetButton" value="Reset" />
						<input class="form-input-button" type="submit" name="submitButton" value="Submit" />
					</div>
				</form>

				<br />
				<div class="form-footer"><?php echo $_SESSION['formFooter']; unset($_SESSION['formFooter']); ?></div><br />

				<?php unset($_SESSION['form']); ?>
			</section>

			<aside id="sidebar" class="large-4 columns">
				<!-- Sidebar content -->
				<h4 id="sidebar_title">Direct message</h4>
				<div id="sidebar_content">
					<span class="avatar_item">Skype:</span>
					coming soon
					<!-- a href="callto:ClacyAgency">ClacyAgency</a -->
					<br />
					<span class="avatar_item">Twitter:</span>
					<a href="https://twitter.com/ClacyAgency">@ClacyAgency</a>
					<br />
					<span class="avatar_item">Slack Channels:</span>
					coming soon
					<br />
				</div>
				<div id="archives">
					<!-- Empty -->
				</div>
			</aside>
		</div>

		<div class="separator"></div>
		<!-- Links -->
		<div id="footer_links_container" class="row site_width">
			<div class="links large-3 columns">
				<ul>
					<li></li>
				</ul>
			</div>
			<div class="links large-3 columns">
				<ul>
					<li></li>
				</ul>
			</div>
			<div class="links large-3 columns">
				<ul>
					<li></li>
				</ul>
			</div>
			<div class="links large-3 columns">
				<ul>
					<li><a href="https://twitter.com/ClacyAgency">Twitter</a></li>
					<li><a href="./">Support</a></li>
				</ul>
			</div>
		</div>

		<!-- Footer -->
		<footer class="row site_width">
			<div id="footer_content" class="large-12 columns">
				&copy; 2015 Clacy, made in Coimbra, Portugal
			</div>
		</footer>

		<!-- Scroll up button -->
		<div id="scroll_up_button"><i class="fa fa-angle-up"></i></div>

		<!-- Handles loading Skrollr, which helps in animating portions of the header area. -->
		<!-- We check to see if the user is on an mobile device or not, and only serve up -->
		<!-- the animations on non-mobile devices. -->
		<script>
			$elixir(window).load(function() {
			  if(!(/Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i).test(navigator.userAgent || navigator.vendor || window.opera)){
			      skrollr.init({
			          forceHeight: false
			      });
			  }
			});
		</script>

	</body>

</html>
