<?php 
	class favorite {
    public $film_id, $title, $description, $rating;

    public function __construct($film_id, $title, $description, $rating) {
        $this->film_id = $film_id;
        $this->title = $title;
        $this->description = $description;
        $this->rating = $rating;
    }
}

class favoriteList {
	public $list = array();

    public function __construct() {}
	
	public function addFav($fav) {
        $this->list[] = $fav;
    }
	
	public function getFav($id) {
        if ($id < count($this->list)) {
            return $this->list[$id];
        } else {
            return null;
        }
    }

    public function delFav($id) {
        unset($this->list[$id]);
        $this->list=array_values($this->list);
    }

	public function nbFav() {
        return count($this->list);
    }
	public function getList(){
		return $this->list;
	}
}
?>




