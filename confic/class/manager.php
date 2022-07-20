<?php
class Manager
{
    public function getManagerSite()
    {
        return (new Render())->renderManager(
            (new Render)->renderFileVariables(
                file_get_contents("confic/exsite/manager.html")
            )
        );
    }
}