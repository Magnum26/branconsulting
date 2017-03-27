$(document).ready(function()
{
	$('#contactform').bootstrapValidator(
	{
		fields:
		{
			contactformname:
			{
				validators:
				{
					stringLength:
					{
						min: 2,
					},
					notEmpty:
					{
						message: 'Please input your name'
					}
				}
			},
			contactformemail:
			{
				validators:
				{
					notEmpty:
					{
						message: 'Please input your email address'
					},
					emailAddress:
					{
						message: 'Please input a valid email address'
					}
				}
			},
			contactformphone:
			{
				validators:
				{
					notEmpty:
					{
						message: 'Please input your phone number'
					},
				}
			},
			contactformmessage:
			{
				validators:
				{
					stringLength:
					{
						min: 10,
						max: 200,
						message: 'Please enter at least 10 characters and no more than 200'
					},
					notEmpty:
					{
						message: 'Please input a message'
					}
				}
			}
		}
	});

});
