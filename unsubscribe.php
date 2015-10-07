<?php
	require('_header.php');
?>
<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
				<h2>UnSubscribe From Our Newsletter</h2>
				<form id="form-subscribe" method="POST" action="backend/simplesubscriber.php?action=unsubscribe">
					<div class="form-group">
						<label>
							<p>Email</p>
							<input placeholder="you@email.com" name="email" id="email" type="email" required class="form-control">
						</label>
					</div>
					<button class="btn" type="submit">Unsubscribe</button>
				</form>
			</div>
		</div>
	</div>
</section>

<!-- Modal -->
<div class="modal fade" id="modal-unsubscribe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Awwww</h4>
			</div>
			<div class="modal-body">
				<p>We're sorry to see you go. If you want to resubscribe, go to <a href="/">our homepage</a> a sign up for our newsletter again!</p>
			</div>
		</div>
	</div>
</div>
<?php 
	require('_footer.php');
?>