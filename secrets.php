<?php
class Secret
{
    /**
     * Takes a json that comes in post request and stores in database
     */
    public function post_secret($con)
    {
        // Takes raw data from the request
        $raw_json = file_get_contents('php://input');

        // Converts it into a PHP object
        $data = json_decode($raw_json);

        $secret = $data->message;
        $key_word = $data->key_word;
        $expires = $data->expires;

        $viewed = 0;
        $expired = 0;

        $link = 'perro';

        $query = "INSERT INTO SECRETS (message, key_word, link, viewed, expired, expires) VALUES ('$secret', '$key_word', '$link', '$viewed', '$expired', '$expires');";

        $post_data_query = mysqli_query($con, $query);
        if ($post_data_query) {
            $json = array("status" => 1, "Success" => "secret has been added successfully", "Link" => $link);
        } else {
            $json = array("status" => 0, "Error" => "Error adding secret! Please try again!", "secreto" => $post_data_query);
        }

        return $json;
    }


    /**
     * Returns a particular secret based on a given link
     */
    public function get_secret()
    {
        echo "this is a secret by get";
    }

}
