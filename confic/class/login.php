<?php
class Login
{

    public static function resxUP($username, $password): bool
    {
        if (md5((new Config)->resx().getUserName()) == $username && hash("sha224", hash("sha256", md5((new Config)->resx().getPassword()))) == $password) {
            return true;
        }
        return false;
    }

    public function getLoginSite(): bool|string
    {
        return file_get_contents("confic/exsite/login.html");
    }

}
