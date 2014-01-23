<?php
class Pagination {
	
	protected $data = array();
	protected $response = array();

	public function __construct() {
		
	}

	public function data($data) {
		$this->data = $data;
	}
		
	public function create($start_page = 1, $limit = 10, $range = 8) {

		$pages = count($this->data) / $limit;
		
		$start = $start_page * $limit - $limit;
		$end = $start_page * $limit;

		$this->response['pages'][] = $start;

		for($i = $start; $i < $end; $i++) {

			$this->response['pages'][] = $i;

			$this->response['data'] = $this->data[$i];

		}

		$this->response['next'] = $start_page + 1;
		$this->response['prev'] = $start_page - 1;
		$this->response['start'] = $start;
		$this->response['end'] = $end;

		return $this->response;
	}

}
?>
