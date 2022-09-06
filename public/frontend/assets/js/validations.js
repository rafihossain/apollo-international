$().ready(function () {
    $("#contact_us").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            name: "required", 
            email: "required",
            phone: "required",
            about_enquiry: "required",
            city: "required",
            subject: "required",
            message: "required",
            
            name: {
                required: true,
            },
            email: {
                required: true, 
            },
            phone: {
                required: true,
            },
            city: {
                required: true, 
            },
            about_enquiry: {
                required: true,
            },
            subject: {
                required: true,
            },
            message: {
                required: true,
            },
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            
            name: "The name field is required.", 
            email: "The email field is required.",
            phone: "The phone field is required.",
            city: "The city field is required.", 
            about_enquiry: "The subject field is required.",
            subject: "The subject field is required.",
            message: "The message field is required.", 
        }
    });
    $("#subscriptions").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
             
            email: "required",  
            email: {
                required: true, 
            },
          
        },
        // in 'messages' user have to specify message as per rules
        messages: {  
            email: "The email field is required.", 
        }
    });
    $("#bookingform").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
             
            choselocation: "required",  
            choselocation: {
                required: true, 
            },
            date: "required",  
            date: {
                required: true, 
            },
            selecttime: "required",  
            selecttime: {
                required: true, 
            },
            firstname: "required",  
            firstname: {
                required: true, 
            },
            lastname: "required",  
            lastname: {
                required: true, 
            },
            email: "required",  
            email: {
                required: true, 
            },
            phone: "required",  
            phone: {
                required: true, 
            },
            message: "required",  
            message: {
                required: true, 
            },
          
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            choselocation: "The chosse location field is required.", 
            date: "The date field is required.",
            selecttime: "The Time field is required.",
            firstname: "The first name field is required.",
            lastname: "The last name field is required.",
            email: "The email field is required.",
            phone: "The phone field is required.",
            message: "The message field is required.",
        }
    });
    
    
    
    
});