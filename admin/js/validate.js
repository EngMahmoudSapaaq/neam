// validate
/*------ validate jquery --------*/
$.validator.addMethod("custommaxsize", function( value, element, param ) {
	if ( this.optional( element ) ) {
		return true;
	}

	if ( $( element ).attr( "type" ) === "file" ) {
		if ( element.files && element.files.length ) {
			for ( var i = 0; i < element.files.length; i++ ) {
				if ( element.files[ i ].size > param * 1024 ) {
					return false;
				}
			}
		}
	}

	return true;
}, $.validator.format( "File size must not exceed {0} KB each." ) );

$('.form').validate({
  rules: {
    phone: {
      minlength: 10,
      pattern: "^05[0-9]{8}$"
    },
    username: {
      minlength: 3
    },
    password: {
      minlength: 8
    },
    password_confirmation: {
      equalTo: 'input[name=password]'
    },
    name: {
      minlength: 3
    },
    location: {
      minlength: 3
    },
    info: {
      minlength: 10
    }
  },
  messages: {},  
//   errorPlacement: function (err, elem) {
//     if (elem.attr('name') === 'attachment')
//       err.insertAfter($('.attachment-contint'))
//     else
//       err.insertAfter(elem)
//   }
});