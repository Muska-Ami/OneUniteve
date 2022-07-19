<?php
class Login
{

    public static function resxUP($username, $password): bool
    {
        if (md5((new Config)->getresxUserName()) === $username && hash("sha224", hash("sha256", md5((new Config)->getresxPassword()))) === $password) {
            return true;
        }
        return false;
    }

    public function getLoginSite(): bool|string
    {
        return file_get_contents("confic/exsite/login.html");
    }
    public function getLoginedSite(): bool|string
    {
        return file_get_contents("confic/exsite/logined.html");
    }

    public function getLoginFailedSite()
    {
        return file_get_contents("confic/exsite/loginfailed.html");
    }
}
