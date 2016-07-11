<?php # Script 2.4 - index.php 
 
/*  
 *  This is the main page. 
 *  This page includes the configuration file,  
 *  the templates, and any content-specific modules. 
 */ 
 
// Require the configuration file before any PHP code: 
require('./includes/config.inc.php'); 
 
// Validate what page to show: 
if (isset($_GET['p']))  { 
    $p = $_GET['p']; 
 } elseif (isset($_POST['p']))  { // Forms 
    $p = $_POST['p']; 
 } else  { 
    $p = NULL; 
 } 
 
// Determine what page to display: 
switch ($p)  { 
 
    case 'about': 
        $page = 'about.inc.php'; 
        $page_title = 'About This Site'; 
        break; 
     
    case 'contact': 
        $page = 'contact.inc.php'; 
        $page_title = 'Contact Us'; 
        break; 
     
    case 'search': 
        $page = 'search.inc.php'; 
        $page_title = 'Search Results'; 
        break; 
 
    case 'register': 
        $page = 'register.inc.php'; 
        $page_title = 'User Register System'; 
        break; 
   
    case 'setit':
        $page = 'settest.inc.php';
        $page_title = 'Set a New Exam';
        break;
        	 
    case 'takeit':
        $page = 'getthetest.inc.php';
        $page_title = 'Search Results';
        break;

    case 'login':
        $page = 'login.inc.php';
        $page_title = 'Search Results';
        break;
        
    case 'logout':
        $page = 'logout.inc.php';
        $page_title = 'Logged Out';
        break;
        
    case 'view':
        $page = 'view.inc.php';
        $page_title = 'View users';
        break;
        
    case 'update':
        $page = 'update.inc.php';
        $page_title = 'Updating users data';
        break;
        
    case 'stdb':
        $page = 'sdashboard.inc.php';
        $page_title = 'Student Dashboard';
        break;
    
    case 'ftdb':
        $page = 'fdashboard.inc.php';
        $page_title = 'Chapters already studied';
        break;
        
    case 'current':
        $page = 'chapter.inc.php';
        $page_title = 'Chapters already studied';
        break;
        
    // Default is to include the main page. 
    default: 
        $page = 'main.inc.php'; 
        $page_title = 'Site Home Page'; 
        break; 
        
         
 } // End of main switch. 
 
// Make sure the file exists: 
if (!file_exists('./modules/' . $page))  { 
    $page = 'main.inc.php'; 
    $page_title = 'Site Home Page'; 
 } 
 
// Include the header file: 
include('./includes/header.html'); 
 
// Include the content-specific module: 
// $page is determined from the above switch. 
include('./modules/' . $page); 
 
// Include the footer file to complete the template: 
include('./includes/footer.html'); 
 
?> 
}
