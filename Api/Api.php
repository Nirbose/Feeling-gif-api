<?php

namespace Api;

class Api {

    protected $path;
    public $rmin = 1;
    public $rmax = 50;

    public function __construct()
    {
        $this->path = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'];
    }

    public function show($test) {
        echo $test;
    }

    public function hug() {
        header('Content-Type: application/json');

        $random = rand($this->rmin, $this->rmax);

        $json = [];
        $json['success'] = 200;
        $json['feeling'] = "Hug";
        $json['link'] = $this->path . "/imgs/hug/" . $random . ".gif";

        $this->encode($json);
    }

    public function kiss() {
        header('Content-Type: application/json');

        $random = rand($this->rmin, $this->rmax);

        $json = [];
        $json['success'] = 200;
        $json['feeling'] = "kiss";
        $json['link'] = $this->path . "/imgs/kiss/" . $random . ".gif";

        $this->encode($json);
    }

    public function encode(array $json) {
        echo json_encode($json);
    }

}