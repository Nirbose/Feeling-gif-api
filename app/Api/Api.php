<?php

namespace Api;

class Api {

    protected $path = "https://enzia.toile-libre.org/cdn/feeling/";
    public $rmin = 1;
    public $rmax = 50;
    protected $random;
    
    public function id(int $id = null) {
        if(is_null($id)) {
            return rand($this->rmin, $this->rmax);
        } else {
            return $id;
        }
    }

    public function check(string $feeling, int $id) {
        $url = "https://enzia.toile-libre.org/cdn/feeling/script.php";
        $rep = json_decode(file_get_contents($url . "?feeling=".$feeling."&id=".$id));
        if($rep->success == 200) {
            return $rep->exist;
        } else {
            return false;
        }        

    }

    public function hug(int $id = null) {

        $imageID = $this->id($id);
        if($this->check("hug", $imageID)) {

            header('Content-Type: application/json');

            $json = [];
            $json['success'] = 200;
            $json['feeling'] = "Hug";
            $json['link'] = $this->path . "hug/" . $imageID . ".gif";

            $this->show($json);

        } else {
            $this->hug(rand($this->rmin, $this->rmax));
        }
    }

    public function kiss(int $id = null) {

        $imageID = $this->id($id);

        if($this->check("kiss", $imageID)) {

            header('Content-Type: application/json');

            $json = [];
            $json['success'] = 200;
            $json['feeling'] = "kiss";
            $json['link'] = $this->path . "kiss/" . $imageID . ".gif";

            $this->show($json);
        } else {
            $this->kiss(rand($this->rmin, $this->rmax));
        }
    }

    public function pat(int $id = null)
    {
        $imageID = $this->id($id);

        if($this->check("pat", $imageID)) {

            header('Content-Type: application/json');

            $json = [];
            $json['success'] = 200;
            $json['feeling'] = "kiss";
            $json['link'] = $this->path . "pat/" . $imageID . ".gif";

            $this->show($json);
        } else {
            $this->pat(rand($this->min, $this->max));
        }
    }

    public function cry(int $id = null)
    {
        $imageID = $this->id($id);

        if($this->check("cry", $imageID)) {

            header('Content-Type: application/json');

            $json = [];
            $json['success'] = 200;
            $json['feeling'] = "kiss";
            $json['link'] = $this->path . "cry/" . $imageID . ".gif";

            $this->show($json);

        } else {
            $this->cry(rand($this->min, $this->max));
        }

    }


    public function eat(int $id = null)
    {
        $imageID = $this->id($id);

        if($this->check("eat", $imageID)) {

            header('Content-Type: application/json');

            $json = [];
            $json['success'] = 200;
            $json['feeling'] = "kiss";
            $json['link'] = $this->path . "eat/" . $imageID . ".gif";

            $this->show($json);
        } else {
            $this->eat(rand($this->min, $this->max));
        }
    }

    public function show(array $json) {
        echo json_encode($json);
    }

}
