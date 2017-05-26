<?php

$config = [
          'admin_login_rules'   => [
		                                  [
											 'field'   => 'adminUser',
											 'label'   => 'UserName', 
											 'rules'   => 'required|trim|alpha'
										  ],
										  [
											 'field'   => 'adminPass', 
											 'label'   => 'Password', 
											 'rules'   => 'required'
										  ]
								    ],
			'user_login_rules'   => [
		                                  [
											 'field'   => 'email',
											 'label'   => 'UserName', 
											 'rules'   => 'required|trim|'
										  ],
										  [
											 'field'   => 'password', 
											 'label'   => 'Password', 
											 'rules'   => 'required|trim'
										  ]
								    ],
			'add_product_rules'  => [		  
										  [
											 'field'   => 'productName', 
											 'label'   => 'Product name', 
											 'rules'   => 'required|trim'
										  ],   
										  [
											 'field'   => 'catId', 
											 'label'   => 'Category name', 
											 'rules'   => 'required|trim'
										  ],
										  [
											 'field'   => 'subCatId', 
											 'label'   => 'SubCategory name', 
											 'rules'   => 'required|trim'
										  ],   
										  [
											 'field'   => 'body', 
											 'label'   => 'Product Description', 
											 'rules'   => 'required|trim'
										  ],
										  [
											 'field'   => 'price', 
											 'label'   => 'Price', 
											 'rules'   => 'required|trim'
										  ],
										  
										  [
											 'field'   => 'type', 
											 'label'   => 'Product Type', 
											 'rules'   => 'required|trim'
										  ]
									],
	   'customer_profile_rules'  => [		  
										  [
											 'field'   => 'title', 
											 'label'   => 'Title', 
											 'rules'   => 'required|trim'
										  ],   
										  [
											 'field'   => 'fname', 
											 'label'   => 'First Name', 
											 'rules'   => 'required|trim'
										  ],
										  [
											 'field'   => 'lname', 
											 'label'   => 'Last Name', 
											 'rules'   => 'required|trim'
										  ],   
										  [
											 'field'   => 'email', 
											 'label'   => 'Email Address', 
											 'rules'   => 'required|trim|valid_email'
										  ],
										  [
											 'field'   => 'dob', 
											 'label'   => 'Date Of Birth', 
											 'rules'   => 'required|trim'
										  ],
										  
										  [
											 'field'   => 'address1', 
											 'label'   => 'Address 1', 
											 'rules'   => 'required|trim'
										  ],
										  [
											 'field'   => 'address2', 
											 'label'   => 'Address 2', 
											 'rules'   => 'required|trim'
										  ],
										  [
											 'field'   => 'city', 
											 'label'   => 'City', 
											 'rules'   => 'required|trim'
										  ],
										  [
											 'field'   => 'state', 
											 'label'   => 'State', 
											 'rules'   => 'required|trim'
										  ],
										  [
											 'field'   => 'pin', 
											 'label'   => 'PinCode', 
											 'rules'   => 'required|trim'
										  ],
										  [
											 'field'   => 'country', 
											 'label'   => 'Country', 
											 'rules'   => 'required|trim'
										  ],
										  [
											 'field'   => 'phone', 
											 'label'   => 'Phone', 
											 'rules'   => 'required|trim'
										  ]
									],
	   'user_registraion_rules'  => [		  
										  [
											 'field'   => 'title', 
											 'label'   => 'Title', 
											 'rules'   => 'required|trim'
										  ],   
										  [
											 'field'   => 'fname', 
											 'label'   => 'First Name', 
											 'rules'   => 'required|trim'
										  ],
										  [
											 'field'   => 'lname', 
											 'label'   => 'Last Name', 
											 'rules'   => 'required|trim'
										  ],   
										  [
											 'field'   => 'email', 
											 'label'   => 'Email Address', 
											 'rules'   => 'required|trim|valid_email'
										  ],
										  [
											 'field'   => 'password', 
											 'label'   => 'Password', 
											 'rules'   => 'required|trim'
										  ],
										  [
											 'field'   => 'dob', 
											 'label'   => 'Date Of Birth', 
											 'rules'   => 'required|trim'
										  ],
										  
										  [
											 'field'   => 'address1', 
											 'label'   => 'Address 1', 
											 'rules'   => 'required|trim'
										  ],
										  [
											 'field'   => 'address2', 
											 'label'   => 'Address 2', 
											 'rules'   => 'required|trim'
										  ],
										  [
											 'field'   => 'city', 
											 'label'   => 'City', 
											 'rules'   => 'required|trim'
										  ],
										  [
											 'field'   => 'state', 
											 'label'   => 'State', 
											 'rules'   => 'required|trim'
										  ],
										  [
											 'field'   => 'pin', 
											 'label'   => 'PinCode', 
											 'rules'   => 'required|trim'
										  ],
										  [
											 'field'   => 'country', 
											 'label'   => 'Country', 
											 'rules'   => 'required|trim'
										  ],
										  [
											 'field'   => 'phone', 
											 'label'   => 'Phone', 
											 'rules'   => 'required|trim'
										  ]
									],
	    'change_password_rules'  => [
		                                  [
											 'field'   => 'password',
											 'label'   => 'Old Password', 
											 'rules'   => 'required|trim'
										  ],
										  [
											 'field'   => 'newpassword', 
											 'label'   => 'New Password', 
											 'rules'   => 'required|trim'
										  ],
										  [
											 'field'   => 'new1password', 
											 'label'   => 'Re-Type Password', 
											 'rules'   => 'required|trim'
										  ]
								    ],
            ];

