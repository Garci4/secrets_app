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

        $link = sha1(md5($key_word));

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
    public function get_secret($con, $_link)
    {
        //Me llega un link -> busco secreto que tenga ese link, chequeo que no haya expirado, marco como visto segun corresponda, devuelvo el secreto
        $query = "SELECT * FROM SECRETS WHERE link = '$_link'";

        $data = mysqli_query($con, $query);

        $json = null;

        if(mysqli_num_rows($data) == 1) {
            $row = mysqli_fetch_array($data);
            $update_query = null;
            
            if($row['viewed']<1){
                //no fue visto, lo marco como visto
                $_viewed = 1;
                $_expired = 0;
                $_current_date = date("Y-m-d H:i:s");
                if($row['expires'] > $_current_date){
                    //no expiró
                    $json = array("message" => $row['message'], "key_word" => $row['key_word']);
                }
                else {
                    $_expired = 1;
                    $json = array("message" => "El secreto ha expirado");
                }
                $update_query = "UPDATE SECRETS SET viewed='$_viewed', expired='$_expired' WHERE link='$_link'";
                $upd = mysqli_query($con, $update_query);
            }
            else {
                $json = array("message" => "El secreto ya fue visto");
            }
        }
        else {
            $json = array("Error" => "No pudimos encontrar ese secreto");
        }

        return $json;
    }

}
