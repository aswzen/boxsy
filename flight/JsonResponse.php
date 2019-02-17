<?php
class JsonResponse {

    private $status;
    private $message;
    private $data;

    public function __construct($status = false, $message = "Something wrong", $data = null){
    	$this->status = $status;
        $this->message = $message;
    	$this->data = $data;
    }

    public function __toString() {
	    return json_encode(array(
	    	'status' 	=> $this->status,
            'message'   => $this->message,
	    	'data' 	    => $this->data,
	    ));
	}

    public function getStatus() {
        return $this->status;
    }
    public function setStatus($status) {
        $this->status = $status;
    }
    public function getMessage() {
        return $this->message;
    }
    public function setMessage($message) {
        $this->message = $message;
    }
    public function getData() {
        return $this->data;
    }
    public function setData($data) {
        $this->data = $data;
    }
}