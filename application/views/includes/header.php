
<div class ="header">
	
	
		
    	<div class = "logo"></div>

         <div class = "search_bar">
        	<a><input type="text" name="search" class = "search square"/>
            <input type="submit" value="Go"/></a>
        </div>
        <div class="header_sign_in">
            <ul >
            	<li><a href ="#">Shopping Cart(<?php echo $this->cart->total();?>)</a></li>
	         	<?php
	         		$CI =& get_instance();
	         		$params = array('user_islog');
	         		$this->sessionbrowser->getInfo($params);
	         		$arr = $this->sessionbrowser->mData;

	         		if($arr['user_islog'] == 1):
	         	?>
			     	<li  class="sign_up" ><a href ="<?php echo base_url() . 'login/logout';?>">Logout</a></li>
	         	<?php else:?>
		         	<li><a href="<?php echo base_url ('login');?>"> Login </a></li>
			     	<li class="sign_up" ><a href ="<?php echo base_url ('login/validateregister');?>">Sign Up!</a></li>
		     	<?php endif;?>
	   		</ul>
        </div>
       
        
</div>

