<?php
	require('_header.php');
?>

<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
				<h2>Sign Up For Our Newsletter</h2>
				<p>Sign up to receive updates on when we're open. Who knows, you might get invited to beta test the site and get ahead of the job searching competition!</p>
				<form id="form-subscribe" method="POST" action="backend/simplesubscriber.php?action=subscribe">
					<div class="form-group">
						<label>
							<p>Email</p>
							<input placeholder="you@email.com" name="email" id="email" type="email" required class="form-control">
						</label>
					</div>
					<button class="btn" type="submit">Sign Me Up!</button>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- Modal -->
<div class="modal fade" id="form-contact-thank-you-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Awesome!</h4>
			</div>
			<div class="modal-body">
				<p>Thanks for signing up for our newsletter. We will let you know when we're live!</p>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal-already-signed-up" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Hold On</h4>
			</div>
			<div class="modal-body">
				<p>Looks like you're already signed up. Don't worry, we'll send you an email when we're live.</p>
			</div>
		</div>
	</div>
</div>
<?php 
	require('_footer.php');
?>