<?php
// This page defines a WriteToFile and a FileException class.

/* The FileException class.
 * The class creates one new method: getDetails().
 */
class FileException extends Exception {

    // For returning more detailed error messages:
    function getDetails() {

        // Return a different message based upon the code:
        switch ($this->code) {
            case 0:
                return 'No filename was provided';
                break;
            case 1:
                return 'The file does not exist.';
                break;
            case 2:
                return 'The file is not a file.';
                break;
            case 3:
                return 'The file is not writable.';
                break;
            case 4:
                return 'An invalid mode was provided.';
                break;
            case 5:
                return 'The data could not be written.';
                break;
            case 6:
                return 'The file could not be closed.';
                break;
            default:
                return 'No further information is available.';
                break;
        } // End of SWITCH.
    
    } // End of getDetails() method.
    
} // End of FileException class.

/* The RWFile class.
 * The class contains three attributes: $_fp,$_nfp and $data.
 * The class contains three methods: __RWFile(), getData(), writeData, close(), and __destruct().
 */
class RWFile{
private $_fp;
private $_nfp;
private $data;

public function RWFile($file = null, $mode = null){
    
    // Make sure a file name was provided:
        if (empty($file)) throw new FileException($this->_message, 0);

        // Make sure the file exists:
        if (!file_exists($file)) throw new FileException($this->_message, 1);

        // Make sure the file is a file:
        if (!is_file($file)) throw new FileException($this->_message, 2);

        // Make sure the file is writable, when necessary
        if (!is_writable($file)) throw new FileException($this->_message, 3);

        // Validate the mode:
        if (!in_array($mode, array('a', 'a+', 'w', 'w+'))) throw new FileException($this->_message, 4);
                
        // Open the file:
        $this->_fp = new SplFileObject($file, $mode);

}

function getData(){
   
    while(feof($this->_fp)==false){
        
     $data = fgets($this->_fp);
     
    }
    
    return $data;
    
} // End of getData Method.


 // This method writes data in a new file:
 
function writeData($file,$mode){
    
        $this->_nfp = new SplFileObject($file,$mode);
        
        // Confirm the write:
        if (@!fwrite($this->_nfp, $data . "\n")) throw new FileException($this->_message . " Data: $data", 5);

    } // End of write() method.
    
function close(){
    
     if ($this->_fp) {
            if (@!fclose($this->_fp)) throw new FileException($this->_message, 6);
            $this->_fp = NULL;
        } 
        
      if ($this->_nfp) {
            if (@!fclose($this->_nfp)) throw new FileException($this->_message, 6);
            $this->_nfp = NULL;
        } 
}

//destructor call to close just in case and as reforcement destroy both objects _fp and _nfp.
function __destruct(){
    $this->close();
    unset($_fp,$_nfp);
}//End of destructor
}//End of class 

?>