<?php  
    session_start();

    // Check if Session is set
    function errorMsg(){
        if (isset($_SESSION['error_msg'])) {
            $output = "<div class=\"alert bg-danger position-fixed float-end text-white rounded-0 alert-dismissible d-inline-block fade show\" style=\"top: 15%; right:10px; z-index: 999999999 !important;\" role=\"alert\">
            <strong>";
     
            $output .= htmlentities($_SESSION['error_msg']);
            $output .= "</strong> 
                 <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
             </div>";
             $_SESSION['error_msg'] = null;
             return $output;
         }     
    }
    function successMsg(){
        if (isset($_SESSION['success_msg'])) {
            $output = "<div class=\"alert bg-success position-fixed float-end text-white rounded-0 alert-dismissible d-inline-block fade show\" style=\"top: 15%; right:10px; z-index: 999999999 !important;\" role=\"alert\">
            <strong>";
     
            $output .= htmlentities($_SESSION['success_msg']);
            $output .= "</strong> 
                 <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
             </div>";
             $_SESSION['success_msg'] = null;
             return $output;
         }     
    }

    function auth(){
        if (!isset($_SESSION['id'])) {
            header("Location: ../login");
        }
    }