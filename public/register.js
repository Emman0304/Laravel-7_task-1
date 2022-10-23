$(function(){
   var $registerForm = $("#myForm");
    if($registerForm.length){
        $registerForm.validate({
            rules:{
               name:{
                required: true
               },
               mname:{
                required: true
               },
               bday:{
                required: true
               },
               bplace:{
                required: true
               },
               contact:{
                required: true
               },
               email:{
                required: true,
                email: true
               },
               address:{
                required: true
               },    
               password:{
                required: true
               },                                
            },
            messages:{
                name:{
                    required: 'Name is required'
                },
                
                mname:{
                    required: 'type (none) if unaplicable'
                },
                bday:{
                    required: 'Birth date is required'
                },
                bplace:{
                    required: 'Birth place is required'
                },
                contact:{
                    required: 'Contact is required'
                },
                email:{
                    required: 'Email is required',
                    email:'Please enter valid email'
                },
                address:{
                    required: 'Address is required'
                },
                password:{
                    required: 'Password is required'
                }
            }
        }) 
    }

})