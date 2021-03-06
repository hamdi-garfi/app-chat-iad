<?php

namespace App\Util;

use App\Util\Session;

/**
 *
 * @description: Class Redirect 
 *
 */
class Redirect {

    /**
     * To: Redirects to a specific path.
     * @access public
     * @param string $location [optional]
     * @return void
     *  
     */
    public function to($location = ""): void {
        if ($location) {
            if ($location === 404) {
                header('HTTP/1.0 404 Not Found');
                include VIEW_PATH . DEFAULT_404_PATH;
            } else {
                header("Location: /?p={$location}");
            }
            exit();
        }
    }

    /**
     * To: Redirects to a chat page if logged.
     * @access public
     * @param NULL (Not defined)
     * @return void
     * 
     */
    public function ifLogged(): void {

        if (Session::exists("auth")) {
            $this->redirect->to("chat.index");
        }
    }

}
