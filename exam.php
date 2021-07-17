<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <?php include_once("view/header.php");
    if(isset($_SESSION['profile']) && $_SESSION['profile'] === "Student"){
        $theID = $_SESSION['userMatricNo'];
        $tablename = "users";
        echo $title = "<title> Module Examination: ". $load_data->getFirstname($theID, $tablename)." ". $load_data->getLastname($theID, $tablename)." (u".$theID .")</title>";
        $studentCourse = $load_data->getCourse($theID, $tablename);
        include_once("model/uploadParse.php");
    }
    else{
        $helper->redirect_to("account");
    }
?>
    
    <div id="mainContent">
    <div class="topContent">

        <div class="aboutDescSide">
            <article>

                <header>
                    <h4><strong><?php echo $load_data->getFirstname($theID, $tablename) ?></strong></h4><br/>
                </header>

                <content>
                    <div id="profile">
                        <?php echo $load_data->profileBtn()?>
                        <?php echo $load_data->changeProfileForm($theID) ?>
                        <?php echo $load_data->getProfilePic($theID) ?>
                    </div>
                    <p style="color: #ff0000;"> <?php if(isset($result)) echo $result; ?></p>
                    <div class="displayCourses blue" style="width: 84%;"><a class="loaduser" id="statclose" title="Site Statistics" onclick="toggleElements('stat', 'stats')">View Site Statistics</a></div>
                    <div id="stat">
                        <table width="97%" border="0" cellpadding="1" style="overflow: hidden;">
                            <tr>
                                <td>
                                    <label>Registered On:</label>
                                    <?php echo $load_data->getDateRegistered($theID, $tablename) ?>
                            </tr>
                            <tr>
                                <td >
                                    <label>Last Login Date:</label>
                                    <?php echo $load_data->getLastLoginDate($theID, $tablename) ?>
                                </td>
                            </tr>
                            <tr>
                                <td >
                                    <label>Registered from IP:</label>
                                    <?php echo $load_data->getRegistrationIP($theID, $tablename) ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label >Last Logged IP:</label>
                                    <?php echo $load_data->getLastLoginIP($theID, $tablename) ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </content>

            </article>
        </div>

        <div class="aboutDesc">
        	<article>
            
            <header>
           		<h4><strong>Module Examination </strong></h4>
            </header>

           <footer><h5><?php echo $load_data->getCourse($theID, $tablename)?></h5> </footer>

                <content>
                <div id="success">
                    <img src="images/check.png" width="70" height="70">
                </div>
                <div class="featured"> </div>

             <form class="enrollform">
                <div id="personalInfo">
                <fieldset>
                <legend><strong>Select Subject</strong></legend>
                <table width="100%" border="0" cellpadding="1">
                <tr>
                    <td class="enrollNormal enrollfirstTd">Modules: *</td>
                    <td class="enrollsecondTd">
                        <label class="enrollMobile">Modules: *</label>
                        <select name="txtExamModules" id="txtExamModules" onchange="getExam()">
                          <option value=""></option>
                          <?php echo $helper->getExamlist($studentCourse); ?>
                        </select>
                    </td>
                    </tr>
                        </table>
                    </fieldset>
                    </div>
               <div id="examDiv">

                   <p><strong>Please select module for which you want to take exam from the drop down list above.</strong></p>.
               </div>

             </form>
            </content><br/><br/>
            </article>
            <p style="width:97%;"><a href="<?php if(isset($back)) echo $back; ?>" class="readMore orange" title="Back to previous Page">Back to previous Page</a></p>
         </div>

        </div>
 
        <div id="fade"></div>
        	<div id="modal">
          <img id="loader" src="images/loading.gif" />
       </div>
            
		<div class="mainFooter" style="width:99%; margin-left:5px;">
 				
        <div class="topContent" > <?php include_once('view/footer.php'); ?> </div>
              
        <div class="spacer" style="clear: both;"></div>
           
        </div><!--Top Content end here-->     

</div>
</body>

</html>