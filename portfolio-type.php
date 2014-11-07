<?php
/* -- Creating a New Post Type -- */
add_action('init', 'portfolio_register');  
   
function portfolio_register() {  
    $args = array(  
        'label' => __('Portfolio', 'wedesign'),  
        'singular_label' => __('Project', 'wedesign'),  
        'public' => true,  
        'show_ui' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => true,  
        'supports' => array('title', 'editor', 'thumbnail')  
       );  
   
    register_post_type( 'portfolio' , $args );  
}

/* -- Adding a Custom Taxonomy -- */
register_taxonomy("project-type", 
	array("portfolio"), 
	array(
		"hierarchical" => true, 
		"label" => "Project Types", 
		"singular_label" => "Project Type", 
		"rewrite" => true
		));


/* -- Creating the Custom Field Box -- */
add_action("admin_init", "portfolio_meta_box");   
  
function portfolio_meta_box(){  
    add_meta_box("projInfo-meta", "Project Options", "portfolio_meta_options", "portfolio", "side", "low");  
}  
   
 
function portfolio_meta_options(){  
        global $post;  
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
        $custom = get_post_custom($post->ID);  
        $link = $custom["projLink"][0]; 
        $client = $custom["client"][0]; 
        
?>  
	<label>Client:</label><input name="client" value="<?php echo $client; ?>" /> 
    <label>Link:</label><input name="projLink" value="<?php echo $link; ?>" />  
<?php  
    }

/* -- Saving the Custom Data -- */
add_action('save_post', 'save_project_link'); 
   
function save_project_link(){  
    global $post;  
     
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){ 
        return $post_id;
    }else{
    	update_post_meta($post->ID, "client", $_POST["client"]);
        update_post_meta($post->ID, "projLink", $_POST["projLink"]);  
    } 
}

/* -- Customizing Admin Columns -- */
add_filter("manage_edit-portfolio_columns", "project_edit_columns");   
   
function project_edit_columns($columns){  
        $columns = array(  
            "cb" => "<input type=\"checkbox\" />",  
            "title" => "Project",  
            "client" => "Client",  
            "link" => "Link",  
            "type" => "Type of Project",  
        );  
   
        return $columns;  
}  
 
add_action("manage_posts_custom_column",  "project_custom_columns"); 
   
function project_custom_columns($column){  
        global $post;  
        switch ($column)  
        {  
            case "client":
                echo $custom["client"][0];
                break;  
            case "link":  
                $custom = get_post_custom();  
                echo $custom["projLink"][0];  
                break;  
            case "type":  
                echo get_the_term_list($post->ID, 'project-type', '', ', ','');  
                break;  
        }  
}
/*=========End of Portifolio CPT==================*/


/* -- Creating a New Post Type -- */
add_action('init', 'testimonial_register');  
   
function testimonial_register() {  
    $args = array(  
        'label' => __('Testimonial', 'wedesign'),  
        'singular_label' => __('Testimonial', 'wedesign'),  
        'public' => true,  
        'show_ui' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => true,  
        'supports' => array('title', 'editor', 'thumbnail')  
       );  
   
    register_post_type( 'testimonial' , $args );  
}

/* -- Creating the Custom Field Box -- */
add_action("admin_init", "testimonial_meta_box");   
  
function testimonial_meta_box(){  
    add_meta_box("TestInfo-meta", "Testimonial Options", "testimonial_meta_options", "testimonial", "side", "low");  
}  
   
 
function testimonial_meta_options(){  
        global $post;  
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
        $custom = get_post_custom($post->ID);  
        $company = $custom["company"][0]; 
        
?>  
    <label>Company:</label><input name="company" value="<?php echo $company; ?>" />  
<?php  
    }

/* -- Saving the Custom Data -- */
add_action('save_post', 'save_testimonial'); 
   
function save_testimonial(){  
    global $post;  
     
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){ 
        return $post_id;
    }else{
        update_post_meta($post->ID, "company", $_POST["company"]);  
    } 
}

/* -- Customizing Admin Columns -- */
add_filter("manage_edit-testimonial_columns", "testimonial_edit_columns");   
   
function testimonial_edit_columns($columns){  
        $columns = array(  
            "cb" => "<input type=\"checkbox\" />",  
            "title" => "Client Name",  
            "description" => "Description",
            "company" => "Company",    
        );  
   
        return $columns;  
}  
 
add_action("manage_posts_custom_column",  "testimonial_custom_columns"); 
   
function testimonial_custom_columns($column){  
        global $post;  
        switch ($column)  
        {  
            case "description":
                the_excerpt();
                break;  
            case "company":  
                $custom = get_post_custom();  
                echo $custom["company"][0];  
                break;  

        }  
}