<?php

class Notification_F{

    public function notificationRouge($message){
        
        echo <<<HTML
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {$message}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            HTML;
    }

    public function notificationVert($message){
        
        echo <<<HTML
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {$message}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            HTML;
    }
}

?>