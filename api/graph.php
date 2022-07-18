<?php
class Graph
{
    public function startLoginUrl(): string
    {
        return 'https://login.live.com/oauth20_authorize.srf?client_id=' . $this->getclientid() . '&scope=' . $this->getsocpe() . '&response_type=token&redirect_uri=' . $this->getredirecturi();
    }

    private function getclientid(): string
    {
        return '1a2cb21b-c21a-4875-9652-260f42d46e3a';
    }

    private function getsocpe(): string
    {
        return urlencode('https://graph.microsoft.com/Files.ReadWrite.All https://graph.microsoft.com/Sites.ReadWrite.All https://graph.microsoft.com/offline_access');
    }

    private function getredirecturi(): string
    {
        return urlencode('https://magra.huahuo-cn.tk');
    }
}
