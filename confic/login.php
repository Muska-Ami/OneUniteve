<?php
class Login
{

    public function getLoginSite(): bool|string
    {
        return file_get_contents("confic/exsite/login.html");
    }

}
