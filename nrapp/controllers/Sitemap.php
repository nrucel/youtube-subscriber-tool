<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends NR_Controller {

	function __construct(){
		parent::__construct();
	}

	function index(){

		$this->output->set_content_type('application/xml');

		$blogs = array();
        $blogs = array_merge($blogs, glob(APPPATH.'views/blog/yazi/*.json', GLOB_BRACE));

        foreach ($blogs as $blog) {

            preg_match('/yazi\/(.*).json/', $blog, $Ad);

            $data["blogs"][] = array(
                'Ad' => $Ad[1]
            );
        }

		$this->load->view("sitemap", $data);
	}

}