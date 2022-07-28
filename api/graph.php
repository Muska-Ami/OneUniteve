<?php
class Graph
{
    public function startadddiskLoginUrl(): string
    {
        return 'https://login.microsoftonline.com/common/oauth2/v2.0/authorize?client_id=' . $this->getclientid() . '&scope=' . $this->getscope() . '&response_type=token&redirect_uri=' . $this->getadddiskredirecturi();
    }

    private function getclientid(): string
    {
        return '1a2cb21b-c21a-4875-9652-260f42d46e3a';
    }

    private function getscope(): string
    {
        return urlencode('https://graph.microsoft.com/Files.ReadWrite.All https://graph.microsoft.com/Sites.ReadWrite.All offline_access');
    }

    private function getadddiskredirecturi(): string
    {
        return urlencode('https://magra.huahuo-cn.tk');
    }
}
