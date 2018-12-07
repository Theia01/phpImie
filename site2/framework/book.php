<?php 
namespace framework;
class Book{
	private $id;
	
	private $book;

	public function __construct($id, $book){
		$this->id = $id;
		$this->book = $book;
	}

	public function getId(){
		return $this->id;
	}

	public function getBook(){
		return $this->book;
	}
}