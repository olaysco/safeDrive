

<?php
            
            $page_title = '';
            $page_include = '';
            $page = filter_input(INPUT_GET, "page", FILTER_SANITIZE_STRING);
        if($uid != "MTK-001"){ 
            $expected_pages = ["personal","department", "trash","profile"];
            $goto_pages = ["pages/Personal_files.php","pages/Department_files.php","pages/trash.php","pages/profile.php"];
            if($page != FALSE && $page !=NULL ){
                        switch ($page) {
                            case $expected_pages[0]:
                               // $page_title = '<i class="fa fa-edit fa-fw"></i> Personal Files';
                                $page_include = $goto_pages[0];
                                break;
                            case $expected_pages[1]:
                                //$page_title = '<i class="fa fa-users fa-fw"></i> Department Files';
                                $page_include = $goto_pages[1];
                                break;
                            case $expected_pages[2]:
                                //$page_title = '<i class="fa fa-users fa-fw"></i> Department Files';
                                $page_include = $goto_pages[2];
                                break;  
                            case $expected_pages[3]:
                                //$page_title = '<i class="fa fa-users fa-fw"></i> Department Files';
                                $page_include = $goto_pages[3];
                                break;
                            default:
                                //$page_title = '<i class=""></i>Welcome';
                                $page_include = $goto_pages[0];
                        }
            }
        else{
            //$page_title = '<i class=""></i>Welcome';
            $page_include = $goto_pages[0];
            }
                        
        }else{
            $expected_pages = ["profile","all_resource", "trash","users","history","c_user"];
            $goto_pages = ["pages/profile.php","pages/all_resource.php","pages/trash.php","pages/users.php","pages/history.php","pages/c_user.php"];
            if($page != FALSE && $page !=NULL ){
                        switch ($page) {
                            case $expected_pages[0]:
                               // $page_title = '<i class="fa fa-edit fa-fw"></i> Personal Files';
                                $page_include = $goto_pages[0];
                                break;
                            case $expected_pages[1]:
                                //$page_title = '<i class="fa fa-users fa-fw"></i> Department Files';
                                $page_include = $goto_pages[1];
                                break;
                            case $expected_pages[2]:
                                //$page_title = '<i class="fa fa-users fa-fw"></i> Department Files';
                                $page_include = $goto_pages[2];
                                break;  
                            case $expected_pages[3]:
                                //$page_title = '<i class="fa fa-users fa-fw"></i> Department Files';
                                $page_include = $goto_pages[3];
                                break;
                            case $expected_pages[4]:
                                //$page_title = '<i class="fa fa-users fa-fw"></i> Department Files';
                                $page_include = $goto_pages[4];
                                break;
                            default:
                                //$page_title = '<i class=""></i>Welcome';
                                $page_include = $goto_pages[0];
                        }
            }
        else{
            //$page_title = '<i class=""></i>Welcome';
            $page_include = $goto_pages[0];
            }
        }        
            
            ?>


