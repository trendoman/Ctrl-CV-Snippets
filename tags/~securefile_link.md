cms:securefile_link

id
thumbnail
physical_path


```php


        // Handles 'cms:securefile_link' tag
        static function link_handler( $params, $node ){
            global $FUNCS, $DB, $Config;
            if( count($node->children) ) {die("ERROR: Tag \"".$node->name."\" is a self closing tag");}

            extract( $FUNCS->get_named_vars(
                        array(
                              'id'=>'',
                              'thumbnail'=>'0',
                              'physical_path'=>'0',
                              ),
                        $params)
                   );

            $id = trim( $id );
            if( !$FUNCS->is_non_zero_natural($id) ) return;
            $is_thumb = ( $thumbnail==1 ) ? 1 : 0;
            $physical_path = ( $physical_path==1 ) ? 1 : 0;

            $link = '';
            $rs = $DB->select( K_TBL_ATTACHMENTS, array('file_real_name', 'file_disk_name','file_extension'), "attach_id='" . $DB->sanitize( $id ). "'" );
            if( count($rs) ){
                $file_name = $rs[0]['file_disk_name'];
                if( $is_thumb ) $file_name .= '_t';
                $file_name .= '.' . $rs[0]['file_extension'];

                if( $physical_path ){
                    $link = $Config['UserFilesAbsolutePath'] . 'attachments/';
                }
                else{
                    $link = $Config['k_append_url'] . $Config['UserFilesPath'] . 'attachments/';
                }

                $link .= $file_name;
            }

            return $link;
        }
    }
    $FUNCS->register_udf( 'securefile', 'SecureFile', 0/*repeatable*/ );
    $FUNCS->register_tag( 'show_securefile', array('SecureFile', 'show_handler'), 1, 0 ); // The helper tag that shows the variables via CTX
    $FUNCS->register_tag( 'securefile_link', array('SecureFile', 'link_handler'), 0, 0 ); // outputs link to the physical file

```
