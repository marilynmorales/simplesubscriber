# simplesubscriber
A small simple subscriber I built that can be further customized. Simply init by sending your GET request to simplesubscriber.php file.

## Basic Set Up
This will create a table called "subscribers" in your specified database. The table will create 3 rows: ID Unique, email VarChar, and Date. 
In order for the mailing list work, you must specifiy the database credentials.
```php
$mail = new MailingList(
	array(
		'host'		=> 'localhost',
		'name'		=> 'test_db',
		'username'	=> 'root',
		'password'	=> ''
	)
);
```

## Customization
If you wish to have the table be a different name or timezone, simply pass the mailing a new array. Timezones are based on PHP supported timezones.
```php
$mail = new MailingList(
	array(
		'host'		=> 'localhost',
		'name'		=> 'test_db',
		'username'	=> 'root',
		'password'	=> ''
	),
	array(
		'table_name'=> 'newTableOfSubscribers',
		'timezone'	=> 'Arctic/Longyearbyen'
	)
);
```

## Javascript Functionality 
The form ajax responses were built utilizing bootstrap modals. You can opt to have it display anywhere on the page besides a pop up. 
Validation is handled by jquery-validation plugin by Jörn Zaefferer. You can opt to use your own javascript methods of validation.
All that is important is the following possible data returns.
```js
$.ajax({
	data: $("#form-subscribe").serialize(),
	dataType: 'json',
	method: 'GET',
	url: $(form).attr('action')
}).done(function(data){
	if(data.isAccepted === true) {
		// their email is valid and has been added to the database.
		$('#form-contact-thank-you-modal').modal({
			show: true
		});
	} 
	if(data.alreadyRegistered === true){
		// the email supplied is already in the database.
		$('#modal-already-signed-up').modal({
			show: true
		});	
	} 
	if(data.deleted === true){
		// the user has chosen to take the email out of the mailing list.
		$('#modal-unsubscribe').modal({
			show: true
		});							
	}
});
```

## Installation
```html
	// subscribe
	<form id="form-subscribe" method="POST" action="backend/simplesubscriber.php?action=subscribe">
	
	// unsubscribe
	<form id="form-subscribe" method="POST" action="backend/simplesubscriber.php?action=unsubscribe">	
```