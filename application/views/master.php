<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view("include/header"); ?>
<?php $this->load->view("include/navbar"); ?>
<?php $this->load->view($page); ?>
<?php $this->load->view("include/sidebar"); ?>
<?php $this->load->view("include/footer"); ?>