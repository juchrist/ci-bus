<?php

class Bus extends CI_Controller{
  public $tableName;
  function __construct(){
    parent::__construct();
    $this->load->database();
    $this->load->model("BusModel");
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->library("session");
    
  }

  public function index(){
    $this->load->view('header');
    $this->load->view('user_login');
    $this->load->view('footer');
  }

  public function sign_up(){
    $this->load->view('header');
    $this->load->view('sign_up');
    $this->load->view('footer');
    
  }

  public function register(){
  $data = array(
    'name' => $this->input->post('fullname'),
    'email' => $this->input->post('email'),
    'password' => $this->input->post('password'),
    'gender' => $this->input->post('gender'),
    'phone' => $this->input->post('phone')
    
  );    
  $this->BusModel->insert($data,"passengers");
  redirect("?msg=Signup+Successfull+Login");
  }

  public function login_action(){
  $email = $this->input->post('email');
  $password = $this->input->post('password');

  $data = array(
    'email' => $this->input->post('email'),
    'password' => $this->input->post('password')
  );

  $query4 = $this->db->query("SELECT * FROM `passengers` WHERE email='$email' AND password='$password'");
  $row = $query4->row();
  $count = $query4->num_rows();
  if($count!=0){
    $this->session->set_userdata('name',$row->name);    
    redirect('user_panel');
  }else{
    redirect('?msg=Invalid+Username+or+password');
  }

  }

  public function user_panel(){
  if($this->session->userdata('name')){ 
    $u = $this->session->userdata('name');
    $query = $this->db->query("SELECT * FROM `booked` WHERE booker='$u'");
    $data['info'] = $query->result();       
    $query2 = $this->db->get("vehicle");
    $data2['infor'] = $query2->result();
    $query3 = $this->db->get("routes");
    $data3['inform'] = $query3->result();
    $query4 = $this->db->query("SELECT * FROM `passengers` WHERE name='$u'");
    $data4['informa'] = $query4->result();       
    $all = array_merge($data,$data2,$data3,$data4);
    $this->load->view("header");
    $this->load->view('user_dashboard',$all);
    $this->load->view('footer');
  }else{
    redirect('?msg=You+must+first+be+login');
  }

  }

  public function admin_panel(){
  if($this->session->userdata('admin_name')){    
    $query = $this->db->get("booked");
    $data['info'] = $query->result();
    $query2 = $this->db->get("vehicle");
    $data2['infor'] = $query2->result();
    $query3 = $this->db->get("routes");
    $data3['inform'] = $query3->result();    
    $all = array_merge($data,$data2,$data3);
    $this->load->view("header");
    $this->load->view('admin_dashboard',$all);     
    $this->load->view("footer");
    }else{
    redirect('admin?msg=You+must+first+be+login');
    }

  }

  public function admin_login(){
    $this->load->view('header');
    $this->load->view('admin_login');
    $this->load->view('footer');
  }

  public function admin_login_action(){
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    if($username == "admin" && $password == "admin"){
      $this->session->set_userdata('admin_name',"Administrator");    
      redirect('admin_panel');
    }else{
      redirect('admin?msg=Invalid+Username+or+password');
    }

    }

  public function edit_profile(){
    $this->load->view('edit_profile');
  }

  public function category_view(){
    $this->load->view('view_cat');
  }
  public function add_vehicle(){
    $data = array(
    'name' => $this->input->post('vehicle'),
    'seat_nos' => $this->input->post('seats'),
    'type' => $this->input->post('type')
  );     //$this->tableName = "elections_cat";

    for($i=1;$i<=$this->input->post('seats');++$i){
    $data2 = array(
    'bus_name' => $this->input->post('vehicle'),
    'seat_number' => $i,
    'booked' => false
  );
    $this->BusModel->insert($data2,"booking");
    }
  $this->BusModel->insert($data,"vehicle");
   // for($i=1;$i<$this->input->post('seats');$i++)
    $query = $this->db->get("vehicle");
    $data['info'] = $query->result();
    redirect("/admin_panel");
//    $this->load->view('#!manage_elections',$data);
/*    echo '<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-check"></i> Alert!</h4>
    <b>'.$this->input->get('name').'</b> Bus added successfully!</div>';
    */

  }

  public function add_route(){
    $data = array(
    'city' => $this->input->post('route'),
  );     //$this->tableName = "elections_cat";

  $this->BusModel->insert($data,"routes");
   // for($i=1;$i<$this->input->post('seats');$i++)
    $query = $this->db->get("vehicle");
    $data['info'] = $query->result();
    redirect("/admin_panel?msg=Route+added");
//    $this->load->view('#!manage_elections',$data);
/*    echo '<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-check"></i> Alert!</h4>
    <b>'.$this->input->get('name').'</b> Bus added successfully!</div>';
    */

  }

  public function set_price(){
    $data = array(
    'source' => $this->input->post('from'),
    'destination' => $this->input->post('to'),
    'price' => $this->input->post('price')
  );     //$this->tableName = "elections_cat";
    $data2 = array(
    'source' => $this->input->post('to'),
    'destination' => $this->input->post('from'),
    'price' => $this->input->post('price')
  );     //$this->tableName = "elections_cat";

  $this->BusModel->insert($data,"prices");
  $this->BusModel->insert($data2,"prices");
   // for($i=1;$i<$this->input->post('seats');$i++)
    $query = $this->db->get("vehicle");
    $data['info'] = $query->result();
    redirect("/admin_panel?msg=Price+added");
//    $this->load->view('#!manage_elections',$data);
/*    echo '<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-check"></i> Alert!</h4>
    <b>'.$this->input->get('name').'</b> Bus added successfully!</div>';
    */

  }

  public function book_bus(){
    $from = $this->input->post('from');
    $to = $this->input->post('to');
    $bus = $this->input->post('bus');
/*    $condition1 = "source ="."'".$from."'";
    $condition2 = "destination ="."'".$to."'";
    $this->db->select('*');
    $this->db->from('prices');
    $this->db->where($condition1." AND ".$condition2);
    $this->db->limit(1);
    $query = $this->db->get();
    $price = $query->result();*/

    $query = $this->db->query("SELECT * FROM `prices` WHERE source='$from' AND destination='$to'");
    $row = $query->row();
    $price = $row->price;

    $query2 = $this->db->query("SELECT * FROM `booking` WHERE booked='0' AND bus_name='$bus'");
    $row = $query2->row();
    $count = $query2->num_rows();
    if($count!=0)
    $seats['seats'] = $query2->result();
    else{
    $seats['seats'] = array(
    'seat_number' => "There is no available seat, Please <a onclick='window.history.back()'>go back</a>"  
    );
    }
    $data = array(
        'bus' => $this->input->post('bus'),
        'from' => $this->input->post('from'),
        'to' => $this->input->post('to'),
        'date' => $this->input->post('date'),
        'price' => $price,
    );
    $all = array_merge($data,$seats);
    $this->load->view("header");
    $this->load->view("check_bus",$all);
    $this->load->view("footer");
  }

  public function book(){
    $bus = $this->input->post('bus');
    $seat = $this->input->post('seat');
    $ticket = rand(11111111,99999999);
    $data = array(
        'bus_id' => $this->input->post('bus'),
        'source' => $this->input->post('from'),
        'destination' => $this->input->post('to'),
        'date' => $this->input->post('date'),
        'price' => $this->input->post('price'),
        'seat_nos' => $this->input->post('seat'),
        'ticket_id' => $ticket,
        'booker' => $this->session->userdata('name')
    );

  $this->BusModel->insert($data,"booked");
  $query = $this->db->query("UPDATE booking SET booked= '1' WHERE bus_name='$bus' AND seat_number='$seat'");
   // for($i=1;$i<$this->input->post('seats');$i++)
    //$query = $this->db->get("booked");
   // $data['info'] = $query->result();
    //redirect("/admin_panel?msg=Route+added");
    $this->load->view('header');
    $this->load->view('booked',$data);
    $this->load->view('footer');  
/*    echo '<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-check"></i> Alert!</h4>
    <b>'.$this->input->get('name').'</b> Bus added successfully!</div>';
    */

  }

public function reset_all(){
  $this->db->query("UPDATE booking SET booked = '0'");
  redirect("/admin_panel?msg=All+Buses+Resetted");
}
  }




 ?>
