<?php session_start();
include_once('website.php');
include_once('library.php');
<<<<<<< HEAD
//$websiteid = $_GET['id'];
=======
$websiteid = $_GET['id'];
>>>>>>> 568a5c63b315b5e70942cdaabf7889f62781f6a9
  $error='';
	if(empty($_POST['pagename'])){
 			$error.= "you have not entered page name<br>";
 	}
 	if(empty($_POST['pagecontent'])){
 			$error.= "you have not entered pagecontent<br>";
 	}	
	if (!empty($error)){	
 	}
 	else{	
 	   		echo " ".$error;  
 	}
 			
 	   if(isset($_POST['btnmodifypage'])){	
 	          $pageid=Mod_addslashes($_POST['pageid']);
            $pagename=Mod_addslashes(trim($_POST['pagename']));
            $pagecontent=Mod_addslashes(trim($_POST['pagecontent']));
            $pagemenu=Mod_addslashes($_POST['pagemenu']);
            $pagestatus=Mod_addslashes($_POST['pagestatus']);

         	  $website=new Website();
 			      $modres=$website->updatepage($pageid,$pagename,$pagecontent,$pagemenu,$pagestatus);
 			    	if($modres>0){ 
            $presubmenu='';
            $submenupages='';
              if(($pagemenu=='Yes')&&(!empty($_POST['arrsubmenu']))){
                  $presubmenu=$_POST['arrsubmenu'];
              }
         
          if(($pagemenu=='Yes')&&(!empty($_POST['submenu']))){                   
              $selsubmenu=Mod_addslashes($_POST['checksubmenu']);
              if($selsubmenu=='Yes'){
                $submenupages=$_POST['submenu'];
              }
            } 

            $res=$website->addsubmenu($pageid,$submenupages,$presubmenu);
            if($res>0)
            {
              //echo "submenu pages added successfully";
            }
   				echo "<script>alert('page info is updated successfuly')</script>";
   				echo "<script>window.location='../viewpages.php?id=$websiteid'</script>";
		   }  	
     else{
 		    	echo "<script>alert('page info not updated.');<script>";
 				  echo "<script>window.location='../viewpages.php?id=$websiteid'</script>";
	      }
 	   }

    if(isset($_POST['addcontents'])){
<<<<<<< HEAD
            $websiteid = $_POST['website_id'];
=======
>>>>>>> 568a5c63b315b5e70942cdaabf7889f62781f6a9
            $pageid=Mod_addslashes($_POST['pageid']);
            $pagecontent=Mod_addslashes(trim($_POST['pagecontent']));
            $pagemenu=Mod_addslashes($_POST['pagemenu']);
            $website=new Website();
            $res=$website->addpagecontent($pageid,$pagecontent,$pagemenu);
            if($res>0) {
                 if(($pagemenu=='Yes')&&(!empty($_POST['checksubmenu']))){
                    $chksubmenu=Mod_addslashes($_POST['checksubmenu']);
                    if($chksubmenu=='Yes'){
                        
                        $presubmenu='';
                        $submenupages=$_POST['submenu'];
                        $res=$website->addsubmenu($pageid,$submenupages,$presubmenu);
                        if($res>0)
                        {
                         // echo "submenu pages added successfully";
                        }
                    }
                  }

                echo "<script>alert('page info is updated successfuly')</script>";
                echo "<script>window.location='../createpage.php?id=$websiteid'</script>";
            }
            else{
              echo "<script>alert('page info not updated.');<script>";
              echo "<script>window.location='../createpage.php?id=$websiteid'</script>";
            }

    }
?>