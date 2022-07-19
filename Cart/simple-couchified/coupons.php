<?php require_once 'couch/cms.php'; ?>

    <cms:template title='Coupons' clonable='1' executable='0'>

        <cms:editable name='desc' label='Description' type='textarea' height='70' /> 
        
        <cms:editable name='code' label='Code' width='155' required='1' type='text' />  
        
        <cms:editable 
            name='discount' 
            label='Discount' 
            search_type='decimal'
            validator='non_negative_decimal'
            width='155'
            type='text' 
        />  
        
        <cms:editable 
            name='type' 
            label='Type' 
            opt_values='Percentage=0 | Fixed Amount=1'
            type='dropdown'
        />
        
        <cms:editable 
            name='min_amount' 
            label='Minimum Amount' 
            desc='Minimum cart value required after which this disount applies'
            search_type='decimal'
            validator='non_negative_decimal'
            width='155'
            type='text' 
        /> 
        
        <cms:editable 
            name='free_shipping' 
            label='Free Shipping' 
            opt_values='Yes=1 | No=0'
            opt_selected = '0'
            type='radio'
        />
        
        <cms:editable 
            name='end_date'
            label='End Date'
            desc='Enter date in yyyy-mm-dd format e.g. 2012-12-31'
            type='text'
            validator='regex=/(?:19|20)\d\d-(?:0[1-9]|1[012])-(?:0[1-9]|[12][0-9]|3[01])/'
            separator='#'
            validator_msg='regex=Incorrect date format'
            required='1'
            width='155'
        />   
       
       <cms:editable name='datepicker' type='message'>
          <link rel="stylesheet" type="text/css" media="all" href="<cms:show k_couch_link />addons/datepicker/datepicker.css" />
          <script type="text/javascript" src="<cms:show k_couch_link />addons/datepicker/datepicker.js"></script>
          <script type="text/javascript">
             window.addEvent('domready',
                function(){
                   $('f_end_date').addEvent('click', function(e){
                   displayDatePicker('f_end_date');
                   });
                }
             );
          </script>
       </cms:editable>
   
    </cms:template>

    
<?php COUCH::invoke(); ?>



