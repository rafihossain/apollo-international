$().ready(function () {
    $("#addpage").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            page_name: "required", 
            page_title: "required",
            meta_title: "required",
            meta_key_word: "required", 
            meta_description: "required", 
            
            page_name: {
                required: true,
            },
            page_title: {
                required: true, 
            },
            meta_title: {
                required: true,
            },
            meta_key_word: {
                required: true, 
            },
            meta_description: {
                required: true,
            },    
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            page_name: "The page name field is required.", 
            page_title: "The page title field is required.",
            meta_title: "The meta title field is required.",
            meta_key_word: "The meta key word field is required.", 
            meta_description: "The meta description field is required.", 
        }
    });
});