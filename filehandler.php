<?php


include_once("UserInputs.php");
class FileHandlingPHP{
    private $filename;

    /**
     * @param $filename
     */
    public function __construct($filename)
    {
        $this->filename = $filename;
    }



    /**
     * @param $filename
     */
    function deleteData($filename){
        if (isset($_POST['delete'])) {
            $pos = $_POST["delete"];

            // Read existing users from file
            $users = array();
            // Read existing users from file
            $file = fopen($filename, "r");
            while (!feof($file)) {
                $line = fgets($file);
                if ($line) {
                    $user = unserialize($line);
                    $users[] = $user;
                }
            }
            fclose($file);

            // Remove item at position $pos from $users array
            unset($users[$pos]);

            // Save remaining users back to file
            $file = fopen($filename, "w");
            foreach ($users as $user) {
                fwrite($file, serialize($user) . PHP_EOL);
            }
            fclose($file);

        }


    }
    /**
     *
     * This function reads data from a file and prints it out to the scree from the file
     * @param $filename
     */
    function ReadData($filename) {
        // Read existing users from file
        $users = array();
        // Read existing users from file
        $file = fopen($filename, "r");
        while (!feof($file)) {
            $line = fgets($file);
            if ($line) {
                $user = unserialize($line);
                $users[] = $user;
            }
        }
        fclose($file);
        $index  = 0;
        // Foreach key in the value data do so
        foreach ($users as $data) {
            echo '<h2>' . htmlspecialchars($data->getName()) . "</h2>";
            echo "<p>" . htmlspecialchars($data->getEmail()) . "</p>";
            echo  "<p>" . htmlspecialchars($data->getCity()) . "</p>";
            echo '<form method="POST">';
            echo '<input type="hidden" name="delete" value="' . $index . '">';  // The key is here
            echo '<input type="submit" value="Delete">';
            echo '</form>';
            $index++;
        }
    }


    function AddData($filename) {
        if (isset($_POST['submit'])) {
            // Get form data
            $name = $_POST['name'];
            $email = $_POST['email'];
            $city = $_POST['city'];

            // Create new user instance and save data to file
            $user = new User($name, $email, $city);
            $file = fopen($filename, "a");
            fwrite($file, serialize($user) . PHP_EOL);
            fclose($file);
        }
    }

}