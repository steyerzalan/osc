<?php

require_once("restKezelo.php");
require("oscarpdo.php");

class OscarrestKezelo extends RestKezelo
{
    function getAllOscars()
    {
        $oscars = new Oscar();
        $sorAdat = $oscars->getAllOscars();

        if(empty($sorAdat))
        {
            $statusCode=404;
            $sorAdat= array('error' => 'No Oscars found!');
        }
        else
        {
            $statusCode=200;
        }
        $this->sethttpFejlec($statusCode);
        header('Content-Type: application/json; charset=UTF-8');

        $result["Oscars"] = $sorAdat;

        $response = $this->encodeJson($result);
        $file_path = "Oscars.json";
        $this->printfile($response, $file_path);
        echo $response;

    }

    function getOscarById($m_ID)
    {
        $oscars = new Oscar();
        $sorAdat = $oscars->getOscarsById($m_ID);

        if(empty($sorAdat))
        {
            $statusCode=404;
            $sorAdat= array('error' => 'No Oscars found by id!');
        }
        else
        {
            $statusCode=200;
        }
        $this->sethttpFejlec($statusCode);
        header('Content-Type: application/json; charset=UTF-8');

        $result["OscarsById"] = $sorAdat;

        $response = $this->encodeJson($result);
        $file_path = "OscarsByID.json";
        $this->printfile($response, $file_path);
        echo $response;
    }

    function getOscarsByType($Mt_name)
    {
        $oscars = new Oscar();
        $sorAdat = $oscars->getOscarsByType($Mt_name);

        if(empty($sorAdat))
        {
            $statusCode=404;
            $sorAdat= array('error' => 'No Oscars found by this type!');
        }
        else
        {
            $statusCode=200;
        }
        $this->sethttpFejlec($statusCode);
        header('Content-Type: application/json; charset=UTF-8');

        $result["Oscars"] = $sorAdat;

        $response = $this->encodeJson($result);
        $file_path = "OscarsByType.json";
        $this->printfile($response, $file_path);
        echo $response;
    }

    function getFault()
    {
        $statusCode = 400;
        $this ->sethttpFejlec($statusCode);
        header('Content-Type: application/json; charset=UTF-8');
        $sorAdat = array('error' => 'Bad Request!');
        $result["Fault"] = $sorAdat;

        $response = $this->encodeJson($result);
        $file_path = "Fault.json";
        $this->printfile($response, $file_path);
        echo $response;
    }

    function encodeJson($responseData)
    {
        return json_encode($responseData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    function printfile($responseData, $file_path)
    {
        file_put_contents($file_path,  $responseData, LOCK_EX);
    }
}
