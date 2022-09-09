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
    $("#addsection").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            section_name: "required", 
            section_type: "required", 
            
            section_name: {
                required: true,
            },
            section_type: {
                required: true, 
            },
      
             
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            section_name: "The section name field is required.", 
            section_type: "The section type field is required.",
           
        }
    });
    $("#addCategory").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            category_name: "required", 
            meta_title: "required", 
            meta_keywords: "required",
            meta_description: "required",
            
            
            category_name: {
                required: true,
            },
            meta_title: {
                required: true, 
            },
            meta_keywords: {
                required: true,
            },
            meta_description: {
                required: true, 
            },
      
             
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            category_name: "The category name field is required.", 
            meta_title: "The meta title field is required.", 
            meta_keywords: "The meta keywords field is required.",
            meta_description: "The meta description field is required.",
           
        }
    });
    $("#editCategory").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            category_name: "required", 
            meta_title: "required", 
            meta_keywords: "required",
            meta_description: "required",
            
            
            category_name: {
                required: true,
            },
            meta_title: {
                required: true, 
            },
            meta_keywords: {
                required: true,
            },
            meta_description: {
                required: true, 
            },
      
             
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            category_name: "The category name field is required.", 
            meta_title: "The meta title field is required.", 
            meta_keywords: "The meta keywords field is required.",
            meta_description: "The meta description field is required.",
           
        }
    });
     $("#addService").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            service_title: "required", 
            meta_title: "required", 
            meta_keywords: "required",
            service_category_id: 'required',
            meta_description: "required",
            service_description: "required",
            service_image: "required",
            
            
            service_title: {
                required: true,
            },
            meta_title: {
                required: true, 
            },
            meta_keywords: {
                required: true,
            },
            meta_description: {
                required: true, 
            },
            service_description: {
                required: true, 
            },
            service_category_id: {
                required: true, 
            },
            service_image: {
                required: true, 
            },
      
             
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            service_title: "The service title field is required.", 
            meta_title: "The meta title field is required.", 
            meta_keywords: "The meta keywords field is required.",
            meta_description: "The meta description field is required.",
            service_description: "The meta description field is required.",
            service_category_id: "The Service Category field is required.",
            service_image: "The service image field is required.",
        }
    });
    $("#editService").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            service_title: "required", 
            meta_title: "required", 
            meta_keywords: "required",
            meta_description: "required",
            service_description: "required",
            
            
            service_title: {
                required: true,
            },
            meta_title: {
                required: true, 
            },
            meta_keywords: {
                required: true,
            },
            meta_description: {
                required: true, 
            },
            service_description: {
                required: true, 
            },
             
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            service_title: "The service title field is required.", 
            meta_title: "The meta title field is required.", 
            meta_keywords: "The meta keywords field is required.",
            meta_description: "The meta description field is required.",
            service_description: "The meta description field is required.",
           
        }
    });
    $("#addpartner").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            partner_name: "required",
            partner_category: "required",
            partner_image: "required", 
            
            
            
            partner_name: {
                required: true,
            },
            partner_category: {
                required: true,
            },
            partner_image: {
                required: true, 
            },
      
             
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            partner_name: "The service title field is required.",  
            partner_image: "The service image field is required.",
           
        }
    });
    $("#editpartner").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            partner_name: "required", 
            partner_category: "required", 
            
            
            partner_name: {
                required: true,
            }, 
            partner_category: {
                required: true,
            },
      
             
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            partner_name: "The partner name field is required.",  
            partner_category: "The partner category field is required.",
           
        }
    });
    $("#addTestimonial").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            user_name: "required", 
            user_comment: "required",
            user_image: "required", 
            user_rating: "required",
            
            
            user_name: {
                required: true,
            },
            user_comment: {
                required: true,
            },
            user_image: {
                required: true,
            },
            user_rating: {
                required: true, 
            },
      
             
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            user_name: "The user name field is required.", 
            user_comment: "The user comment field is required.",
            user_image: "The user image field is required.", 
            user_rating: "The user rating field is required.",
           
        }
    });
    $("#editTestimonial").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            user_name: "required", 
            user_comment: "required",
            user_rating: "required",
            
            
            user_name: {
                required: true,
            },
            user_comment : {
                required: true,
            },
            user_rating: {
                required: true, 
            },
      
             
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            user_name: "The user name field is required.", 
            user_comment: "The user comment field is required.", 
            user_rating: "The user rating field is required.",
           
        }
    });
    $("#addteam").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            member_name: "required", 
            member_position: "required",
            member_image: "required", 
           
            
            
            partner_name: {
                required: true,
            }, 
            partner_image: {
                required: true, 
            },
      
             
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            member_name: "The member name field is required.", 
            member_position: "The member position field is required.",
            user_image: "The member image field is required.",  
           
        }
    });
    
    $("#editteam").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            member_name: "required", 
            member_position: "required",
           
            
            
            partner_name: {
                required: true,
            }, 
            member_position: {
                required: true, 
            },
      
             
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            member_name: "The member name field is required.", 
            member_position: "The member position field is required.",
           
        }
    });
     $("#formFaq").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            faq_question: "required", 
            faq_answare: "required", 
            
            faq_question: {
                required: true,
            }, 
            faq_answare: {
                required: true, 
            },
      
             
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            faq_question: "The Question field is required.", 
            faq_answare: "The Answare field is required.", 
           
        }
    });
    $("#addContact").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            country: "required", 
            //address: "required", 
            //phone: "required",
            //email: "required",
           // location_image: "required",
            
            country: {
                required: true,
            }, 
            // phone: {
            //     required: true, 
            // },
            // email: {
            //     required: true, 
            // },
            // location_image: {
            //     required: true, 
            // },
      
             
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            country: "The country field is required.", 
            // address: "The address field is required.", 
            // phone: "The phone field is required.",
            // email: "The email field is required.",
            // location_image: "The image field is required.",
            
        }
    });
    $("#editContact").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            country: "required", 
            // address: "required", 
            // phone: "required",
            // email: "required",
            
            country: {
                required: true,
            }, 
            // phone: {
            //     required: true, 
            // },
            // email: {
            //     required: true, 
            // },
      
             
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            country: "The country field is required.", 
            // address: "The address field is required.", 
            // phone: "The phone field is required.",
            // email: "The email field is required.",
            
        }
    });
    $("#createuser").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            user_name: "required", 
            email: "required", 
            user_phone: "required",
            user_role: "required",
            profile_image: "required",
            user_password: "required",
            
            user_name: {
                required: true,
            }, 
            email: {
                required: true, 
            },
            user_phone: {
                required: true, 
            },
            user_role: {
                required: true, 
            },
            profile_image: {
                required: true, 
            },
            user_password: {
                required: true, 
            },
      
             
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            user_name: "The user name field is required.", 
            email: "The email field is required.", 
            user_phone: "The user phone field is required.",
            user_role: "The user role field is required.",
            profile_image: "The profile image field is required.",
            user_password: "The user password field is required.",
        }
    });
     $("#formBlog").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            blog_title: "required", 
            meta_title: "required", 
            meta_keywords: "required",
            meta_description: "required",
            blog_category_id: "required",
            blog_description: "required",
            blog_image: "required",
            blog_title: {
                required: true,
            }, 
            meta_title: {
                required: true, 
            },
            meta_keywords: {
                required: true, 
            },
            meta_description: {
                required: true, 
            },
            blog_category_id: {
                required: true, 
            },
            blog_description: {
                required: true, 
            },
            blog_image: {
                required: true, 
            },
             
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            blog_title: "The blog title field is required.", 
            meta_title: "The meta title field is required.", 
            meta_keywords: "The meta keywords field is required.",
            meta_description: "The meta description field is required.",
            blog_category_id: "The blog category field is required.",
            blog_description: "The blog description field is required.",
            blog_image: "The blog image field is required.",
        }
    });
     $("#formBlogedit").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            blog_title: "required", 
            meta_title: "required", 
            meta_keywords: "required",
            meta_description: "required",
            blog_category_id: "required",
            blog_description: "required",
           
            blog_title: {
                required: true,
            }, 
            meta_title: {
                required: true, 
            },
            meta_keywords: {
                required: true, 
            },
            meta_description: {
                required: true, 
            },
            blog_category_id: {
                required: true, 
            },
            blog_description: {
                required: true, 
            },
         
             
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            blog_title: "The blog title field is required.", 
            meta_title: "The meta title field is required.", 
            meta_keywords: "The meta keywords field is required.",
            meta_description: "The meta description field is required.",
            blog_category_id: "The blog category field is required.",
            blog_description: "The blog description field is required.",
            
        }
    });
    
    
});
