<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require(APPPATH.'libraries/REST_Controller.php');

class Api extends REST_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('MysteryShopper_model');
		$this->load->model('Assignment_model');
		$this->load->model('Main_model');
		$this->load->model('Shopper_Assignment');
		$this->load->model('Client_model');
	}

	public function allMysteryShopper_get(){
		try{
			$data = $this->MysteryShopper_model->getAll();
			$length = count($data);
			$this->response(
						array(
							"status"=>true,
							"data"=>$data,
							"length"=>$length
						),200
					);
		}catch (Exception $e){
			$this->response(
						array(
							"status"=>false,
							"error"=>$e->getMessage(),
							"length"=>0
						),400
					);
		}
	}
public function allfood_get(){

        //get all open status assignment

        try{

            $data = $this->Client_model->searchfood();

            $length = count($data);

            $this->response(

                        array(

                            "status"=>true,

                            "data"=>$data,

                            "length"=>$length

                        ),200

                    );

        }catch (Exception $e){

            $this->response(

                        array(

                            "status"=>false,

                            "error"=>$e->getMessage(),

                            "length"=>0

                        ),400

                    );

        }

    }

     public function ReviewAdd_post()
    {
   try{

       $AssignmentReviews= array(
           'mysteryShopper_assignment_id' => $this->input->post('mysteryShopper_assignment_id'),
           'outlet' => $this->input->post('outlet'),
           'date' => $this->input->post('date'),
           'time' => $this->input->post('time'),
           'no_customer' => $this->input->post('no_customer'),
           'no_staff' => $this->input->post('no_staff'),
           'server_name' => $this->input->post('server_name'),
           'manager_on_duty' => $this->input->post('manager_on_duty'),
           'parking_area' => $this->input->post('parking_area'),
           'outside_ambiance' => $this->input->post('outside_ambiance'),
           'greeter' => $this->input->post('greeter'),
           'complimentary_drink' => $this->input->post('complimentary_drink'),
           'table_allotment' => $this->input->post('table_allotment'),
           'feel_of_place' => $this->input->post('feel_of_place'),
           'menu_presentation' => $this->input->post('menu_presentation'),
           'screen' => $this->input->post('screen'),
           'self_ordering' => $this->input->post('self_ordering'),
           'washroom' => $this->input->post('washroom'),
           'service' => $this->input->post('service'),
           'food' => $this->input->post('food'),
           'complaints' => $this->input->post('complaints'),
           'billing' => $this->input->post('billing'),
           'loyalty_program' => $this->input->post('loyalty_program'),
           'bribe' => $this->input->post('bribe'),
           'smiles_while_leaving' => $this->input->post('smiles_while_leaving'),
           'valet_operation' => $this->input->post('valet_operation'),
           'takeaway' => $this->input->post('takeaway'),
           'extra_detail' => $this->input->post('extra_detail'),
           'image1' => $this->input->post('image1'),
           'image2' => $this->input->post('image2'),
           'image3' => $this->input->post('image3'),
           'image4' => $this->input->post('image4'),
		   'image5' => $this->input->post('image5'),
		   'shopper_id'=>$this->input->post('mystery_shopper_id')

	   );

	   $this->Shopper_Assignment->updateAssignmentStatus($this->input->post('mysteryShopper_assignment_id'),'Completed');

        $this->Assignment_model->AssignmentReview($AssignmentReviews);

            $length = count($AssignmentReviews);
            $this->response(
                        array(
                            "status"=>true,
                            "data"=>$AssignmentReviews,
                            "length"=>$length
                        ),200
                    );

        }catch (Exception $e){
            $this->response(
                        array(
                            "status"=>false,
                            "error"=>$e->getMessage(),
                            "length"=>0
                        ),400
                    );
        }

    }
    public function updateReview_post()
	{
		try{


			$Id = $this->post('id');

			$data = array(
           'mysteryShopper_assignment_id' => $this->input->post('mysteryShopper_assignment_id'),
           'outlet' => $this->input->post('outlet'),
           'date' => $this->input->post('date'),
           'time' => $this->input->post('time'),
           'no_customer' => $this->input->post('no_customer'),
           'no_staff' => $this->input->post('no_staff'),
           'server_name' => $this->input->post('server_name'),
           'manager_on_duty' => $this->input->post('manager_on_duty'),
           'parking_area' => $this->input->post('parking_area'),
           'outside_ambiance' => $this->input->post('outside_ambiance'),
           'greeter' => $this->input->post('greeter'),
           'complimentary_drink' => $this->input->post('complimentary_drink'),
           'table_allotment' => $this->input->post('table_allotment'),
           'feel_of_place' => $this->input->post('feel_of_place'),
           'menu_presentation' => $this->input->post('menu_presentation'),
           'screen' => $this->input->post('screen'),
           'self_ordering' => $this->input->post('self_ordering'),
           'washroom' => $this->input->post('washroom'),
           'service' => $this->input->post('service'),
           'food' => $this->input->post('food'),
           'complaints' => $this->input->post('complaints'),
           'billing' => $this->input->post('billing'),
           'loyalty_program' => $this->input->post('loyalty_program'),
           'bribe' => $this->input->post('bribe'),
           'smiles_while_leaving' => $this->input->post('smiles_while_leaving'),
           'valet_operation' => $this->input->post('valet_operation'),
           'takeaway' => $this->input->post('takeaway'),
           'extra_detail' => $this->input->post('extra_detail'),
           );


			if($this->input->post('image1'))
			{
				$data['image1'] = $this->input->post('image1');
			}
			if($this->input->post('image2'))
			{
				$data['image2'] = $this->input->post('image2');
			}
			if($this->input->post('image3'))
			{
				$data['image3'] = $this->input->post('image3');
			}
			if($this->input->post('image4'))
			{
				$data['image4'] = $this->input->post('image4');
			}
			if($this->input->post('image5'))
			{
				$data['image5'] = $this->input->post('image5');
			}

			//print_r($data);

			$data = $this->Assignment_model->review_update($Id,$data);





			$length = count($data);
			$this->response(
				array(
					"status" =>'success',
					"data" =>$data,
					"length"=>$length

				),200
			);

		}catch(Exception $e){

			$this->response(
				array(
					"status" => false,
					"error" =>$e->getMessage(),
					"length"=>0

				),400



			);

		}
	}

	public function updateReviewDelivery_post()
	{
		try{


			$Id = $this->post('id');

			$data= array(
          'mysteryShopper_assignment_id' => $this->input->post('mysteryShopper_assignment_id'),
          'outlet' => $this->input->post('outlet'),
          'date' => $this->input->post('date'),
          'time' => $this->input->post('time'),
          'call_center' => $this->input->post('call_center'),
          'online' => $this->input->post('online'),
          'rider' => $this->input->post('rider'),
          'billing' => $this->input->post('billing'),
          'loyalty' => $this->input->post('loyalty'),
          'bribe' => $this->input->post('bribe'),
          'food_packaging' => $this->input->post('food_packaging'),
          'food_itself' => $this->input->post('food_itself'),
          'extra' => $this->input->post('extra'),
        	);


			if($this->input->post('image1'))
			{
				$data['image1'] = $this->input->post('image1');
			}
			if($this->input->post('image2'))
			{
				$data['image2'] = $this->input->post('image2');
			}
			if($this->input->post('image3'))
			{
				$data['image3'] = $this->input->post('image3');
			}
			if($this->input->post('image4'))
			{
				$data['image4'] = $this->input->post('image4');
			}
			if($this->input->post('image5'))
			{
				$data['image5'] = $this->input->post('image5');
			}

			//print_r($data);

			$data = $this->Assignment_model->review_update_delivery($Id,$data);





			$length = count($data);
			$this->response(
				array(
					"status" =>'success',
					"data" =>$data,
					"length"=>$length

				),200
			);

		}catch(Exception $e){

			$this->response(
				array(
					"status" => false,
					"error" =>$e->getMessage(),
					"length"=>0

				),400



			);

		}
	}

     public function DeliveryReviewAdd_post()
    {


   try{

       $DeliveryAssignmentReviews= array(
          'mysteryShopper_assignment_id' => $this->input->post('mysteryShopper_assignment_id'),
          'outlet' => $this->input->post('outlet'),
          'date' => $this->input->post('date'),
          'time' => $this->input->post('time'),
          'call_center' => $this->input->post('call_center'),
          'online' => $this->input->post('online'),
          'rider' => $this->input->post('rider'),
          'billing' => $this->input->post('billing'),
          'loyalty' => $this->input->post('loyalty'),
          'bribe' => $this->input->post('bribe'),
          'food_packaging' => $this->input->post('food_packaging'),
          'food_itself' => $this->input->post('food_itself'),
          'extra' => $this->input->post('extra'),
          'image1' => $this->input->post('image1'),
           'image2' => $this->input->post('image2'),
           'image3' => $this->input->post('image3'),
           'image4' => $this->input->post('image4'),
		   'image5' => $this->input->post('image5'),
		   'shopper_id'=>$this->input->post('mystery_shopper_id')
        	);

   	// $user_id = $this->input->post('mystery_shopper_id');
    //        $takenAssignment = array(
    //         'takenAssignment' => $this->input->post('takenAssignment'),


    //     );
	// 	$this->User_model->update($user_id,$takenAssignment);



        $this->Assignment_model->DeliveryAssignmentReview($DeliveryAssignmentReviews);

            $length = count($DeliveryAssignmentReviews);
            $this->response(
                        array(
                            "status"=>true,
                            "data"=>$DeliveryAssignmentReviews,
                            "length"=>$length
                        ),200
                    );

        }catch (Exception $e){
            $this->response(
                        array(
                            "status"=>false,
                            "error"=>$e->getMessage(),
                            "length"=>0
                        ),400
                    );
        }

    }





    public function CompletedAssignment_post(){
		try{
			$id = $this->input->post('id'); //assignment_id
			$data = array(
            'mysteryShopper_id' => $this->input->post('mystery_shopper_id'),
            'mysteryShopper_assignment_status' => 'Completed',


        );
			//print_r($data);
        $this->Assignment_model->update($id,$data);

			$length = count($data);
			$this->response(
						array(
							"status"=>true,
							"data"=>$data,
							"length"=>$length
						),200
					);
		}catch (Exception $e){
			$this->response(
						array(
							"status"=>false,
							"error"=>$e->getMessage(),
							"length"=>0
						),400
					);
		}
	}
	public function ExpireAssignment_post(){
		try{
			$id = $this->input->post('id'); //assignment_id
			$data = array(
            'mysteryShopper_id' => $this->input->post('mystery_shopper_id'),
            'mysteryShopper_assignment_status' => 'Expired',


        );
			//print_r($data);
        $this->Assignment_model->update($id,$data);

			$length = count($data);
			$this->response(
						array(
							"status"=>true,
							"data"=>$data,
							"length"=>$length
						),200
					);
		}catch (Exception $e){
			$this->response(
						array(
							"status"=>false,
							"error"=>$e->getMessage(),
							"length"=>0
						),400
					);
		}
	}
	public function ExpireTakkenAssignment_post(){
		try{
			$id = $this->input->post('id'); //assignment_id
			$data = array(
            'mysteryShopper_id' => $this->input->post('mystery_shopper_id'),
            'mysteryShopper_assignment_status' => 'Expired',

        );
        $user_id = $this->input->post('mystery_shopper_id');
           $takenAssignment = array(
            'takenAssignment' => $this->input->post('takenAssignment'),


        );
		$this->User_model->update($user_id,$takenAssignment);
			//print_r($data);
        $this->Assignment_model->update($id,$data);

			$length = count($data);
			$this->response(
						array(
							"status"=>true,
							"data"=>$data,
							"length"=>$length
						),200
					);
		}catch (Exception $e){
			$this->response(
						array(
							"status"=>false,
							"error"=>$e->getMessage(),
							"length"=>0
						),400
					);
		}
	}



	public function edit_assignment_get($id){
		try{
			$data = $this->Assignment_model->get_all_edit($id);
			$length = count($data);
			$this->response(
						array(
							"status"=>true,
							"data"=>$data,
							"length"=>$length
						),200
					);
		}catch (Exception $e){
			$this->response(
						array(
							"status"=>false,
							"error"=>$e->getMessage(),
							"length"=>0
						),400
					);
		}
	}

	public function all_review_get(){
		try{
			$data = $this->Assignment_model->get_all_review();
			$length = count($data);
			$this->response(
						array(
							"status"=>true,
							"data"=>$data,
							"length"=>$length
						),200
					);
		}catch (Exception $e){
			$this->response(
						array(
							"status"=>false,
							"error"=>$e->getMessage(),
							"length"=>0
						),400
					);
		}
	}
	public function all_review_delivery_get(){
		try{
			$data = $this->Assignment_model->get_all_review_delivery();
			$length = count($data);
			$this->response(
						array(
							"status"=>true,
							"data"=>$data,
							"length"=>$length
						),200
					);
		}catch (Exception $e){
			$this->response(
						array(
							"status"=>false,
							"error"=>$e->getMessage(),
							"length"=>0
						),400
					);
		}
	}

	public function edit_assignment_detail_get($id){
		try{
			$data = $this->Assignment_model->edit_searchnm($id);
			$length = count($data);
			$this->response(
						array(
							"status"=>true,
							"data"=>$data,
							"length"=>$length
						),200
					);
		}catch (Exception $e){
			$this->response(
						array(
							"status"=>false,
							"error"=>$e->getMessage(),
							"length"=>0
						),400
					);
		}
	}
	public function edit_assignment_detail_delivery_get($id){
		try{
			$data = $this->Assignment_model->edit_searchnm_delivery($id);
			$length = count($data);
			$this->response(
						array(
							"status"=>true,
							"data"=>$data,
							"length"=>$length
						),200
					);
		}catch (Exception $e){
			$this->response(
						array(
							"status"=>false,
							"error"=>$e->getMessage(),
							"length"=>0
						),400
					);
		}
	}




	public function AddMysteryShopper_post(){
        try{


        $userData = array(
         'user_name' => $this->input->post('user_name'),
         'user_password' => $this->input->post('user_password'),
         'user_email' => $this->input->post('user_email'),
         'user_type' => 'MYSTERYSHOPPER',

       );

        $this->User_model->add($userData);
        //print_r($shopperData);


       $usrId = $this->User_model->user_added_id();

       if($this->input->post('mysteryShopper_contact_number')=='' && $this->input->post('mysteryShopper_profile_image')==''){
       $mysteryShopperData = array(
           'mysteryShopper_name' => $this->input->post('mysteryShopper_name'),
          // 'mysteryShopper_nic' => $this->input->post('mysteryShopper_nic'),
          // 'mysteryShopper_card_type' => $this->input->post('mysteryShopper_card_type'),
          // 'mysteryShopper_bank_name' => $this->input->post('mysteryShopper_bank_name'),
           'mysteryShopper_address' => $this->input->post('mysteryShopper_address'),
           'mysteryShopper_email' => $this->input->post('mysteryShopper_email'),
          // 'mysteryShopper_account_no' => $this->input->post('mysteryShopper_account_no'),
           // 'mysteryShopper_video' =>  $this->input->post('mysteryShopper_video'),
           'mysteryShopper_contact_number' => $this->input->post('mysteryShopper_contact_number'),
           // 'mysteryShopper_profile_image' =>  $this->input->post('mysteryShopper_profile_image'),
           'user_id' => $usrId,
          // 'mysteryShopper_category' => $this->input->post('mysteryShopper_category'),
          // 'mysteryShopper_travel_field' => $this->input->post('mysteryShopper_travel_field')


       );
   }else{
   	$mysteryShopperData = array(
           'mysteryShopper_name' => $this->input->post('mysteryShopper_name'),
           //'mysteryShopper_nic' => $this->input->post('mysteryShopper_nic'),
           //'mysteryShopper_card_type' => $this->input->post('mysteryShopper_card_type'),
           //'mysteryShopper_bank_name' => $this->input->post('mysteryShopper_bank_name'),
           'mysteryShopper_address' => $this->input->post('mysteryShopper_address'),
           'mysteryShopper_email' => $this->input->post('mysteryShopper_email'),
           //'mysteryShopper_account_no' => $this->input->post('mysteryShopper_account_no'),
          // 'mysteryShopper_video' =>  $this->input->post('mysteryShopper_video'),
           'mysteryShopper_contact_number' => $this->input->post('mysteryShopper_contact_number'),
          // 'mysteryShopper_profile_image' =>  $this->input->post('mysteryShopper_profile_image'),
           'user_id' => $usrId,
           //'mysteryShopper_category' => $this->input->post('mysteryShopper_category'),
           //'mysteryShopper_travel_field' => $this->input->post('mysteryShopper_travel_field')
       );
   }

        $this->MysteryShopper_model->add($mysteryShopperData);
        redirect(base_url().'index.php/Web/login_view');
        $combineResult = array_merge($userData,$mysteryShopperData);
            $length = count($combineResult);
            $this->response(
                        array(
                            "status"=>true,
                            "data"=>'agya',
                            "length"=>'20'
                        ),200
                    );

        }catch (Exception $e){
            $this->response(
                        array(
                            "status"=>false,
                            "error"=>$e->getMessage(),
                            "length"=>0
                        ),400
                    );
        }
    }

    public function updateMysteryShopper_post(){
		try{


       $id = $this->input->post('user_id');
       $shopperData = array(
            'mysteryShopper_name' => $this->input->post('mysteryShopper_name'),
            'mysteryShopper_nic' => $this->input->post('mysteryShopper_nic'),
            'mysteryShopper_card_type' => $this->input->post('mysteryShopper_card_type'),
            'mysteryShopper_bank_name' => $this->input->post('mysteryShopper_bank_name'),
            'mysteryShopper_address' => $this->input->post('mysteryShopper_address'),
            'mysteryShopper_email' => $this->input->post('mysteryShopper_email'),
            'mysteryShopper_account_no' => $this->input->post('mysteryShopper_account_no'),
            'mysteryShopper_contact_number' => $this->input->post('mysteryShopper_contact_number'),
            'mysteryShopper_profile_image' =>  $this->input->post('mysteryShopper_profile_image'),
            'mysteryShopper_category' => $this->input->post('mysteryShopper_category'),
            'mysteryShopper_travel_field' => $this->input->post('mysteryShopper_travel_field'),
            'mysteryShopper_account_contact' => $this->input->post('mysteryShopper_account_contact'),


            );


        $this->MysteryShopper_model->update($id,$shopperData);
        redirect(base_url().'index.php/MysteryShopperLoggedin');
			$length = count($shopperData);
			$this->response(
						array(
							"status"=>true,
							"data"=>$shopperData,
							"length"=>$length
						),200
					);
		}catch (Exception $e){
			$this->response(
						array(
							"status"=>false,
							"error"=>$e->getMessage(),
							"length"=>0
						),400
					);
		}
	}

	public function updateMysteryShopper_contact_post(){
		try{


       $id = $this->input->post('user_id');
       $shopperData = array(
            'mysteryShopper_nic' => $this->input->post('mysteryShopper_nic'),
            'mysteryShopper_account_contact' => $this->input->post('mysteryShopper_account_contact'),

            );


        $this->MysteryShopper_model->update($id,$shopperData);
        //redirect(base_url().'index.php/MysteryShopperLoggedin');
			$length = count($shopperData);
			$this->response(
						array(
							"status"=>true,
							"data"=>$shopperData,
							"length"=>$length
						),200
					);
		}catch (Exception $e){
			$this->response(
						array(
							"status"=>false,
							"error"=>$e->getMessage(),
							"length"=>0
						),400
					);
		}
	}


	public function allUser_get(){
		try{
			$data = $this->User_model->get_all();
			$length = count($data);
			$this->response(
						array(
							"status"=>true,
							"data"=>$data,
							"length"=>$length
						),200
					);
		}catch (Exception $e){
			$this->response(
						array(
							"status"=>false,
							"error"=>$e->getMessage(),
							"length"=>0
						),400
					);
		}
	}

	public function UsersLogin_post()
	{
		try{


			  $user_email = $this->input->post('user_name');
			  $user_password=$this->input->post('user_password');
			  $type=$this->input->post('type');
			$data = $this->Main_model->loginViaEmail($user_email,$user_password,$type);


			$length = count($data);
			$this->response(
				array(
					"status" =>true,
					"data" =>$data,
					"length"=>$length

				),200
			);

		}catch(Exception $e){

			$this->response(
				array(
					"status" => false,
					"error" =>$e->getMessage(),
					"length"=>0

				),400



			);

		}
	}

	public function UsersPasswordReset_post()
	{
		try{


			  $user_id = $this->input->post('user_id');

			   $updatePassword = array(
            'user_password' => $this->input->post('user_password'),


                        );

			$data = $this->User_model->rest_user_password($user_id,$updatePassword );


			$length = count($data);
			$this->response(
				array(
					"status" =>true,
					"data" =>$data,
					"length"=>$length

				),200
			);

		}catch(Exception $e){

			$this->response(
				array(
					"status" => false,
					"error" =>$e->getMessage(),
					"length"=>0

				),400



			);

		}
	}

public function allClient_get(){

        //get all open status assignment

        try{

            $data = $this->Client_model->get_all();

            $length = count($data);

            $this->response(

                        array(

                            "status"=>true,

                            "data"=>$data,

                            "length"=>$length

                        ),200

                    );

        }catch (Exception $e){

            $this->response(

                        array(

                            "status"=>false,

                            "error"=>$e->getMessage(),

                            "length"=>0

                        ),400

                    );

        }

    }


	public function updateRatting_post()
	{
		try{


			$usrId = $this->User_model->user_added_id();


			$data = array(
				'mysteryShopper_ratting' => $this->input->post('mysteryShopper_ratting'),
				 );


			$data = $this->MysteryShopper_model->update_ratting($usrId,$data);


			$length = count($data);
			$this->response(
				array(
					"status" =>true,
					"data" =>$data,
					"length"=>$length

				),200
			);

		}catch(Exception $e){

			$this->response(
				array(
					"status" => false,
					"error" =>$e->getMessage(),
					"length"=>0

				),400



			);

		}
	}

	public function takken_pending_assignments_get($id){
		try{
			$data = $this->Assignment_model->user_pending_assignments($id);
			$user_id = $this->input->post('mystery_shopper_id');
			 $takenAssignment = array(
                          'takenAssignment' => $this->input->post('takenAssignment'),
                                    );

		$this->User_model->update($user_id,$takenAssignment);

			$length = count($data);
			$this->response(
						array(
							"status"=>true,
							"data"=>$data,
							"length"=>$length
						),200
					);
		}catch (Exception $e){
			$this->response(
						array(
							"status"=>false,
							"error"=>$e->getMessage(),
							"length"=>0
						),400
					);
		}
	}

	public function allAssignment_get(){
		//get all open status assignment
		try{
			$data = $this->Assignment_model->get_all_open_status();
			$length = count($data);
			$this->response(
						array(
							"status"=>true,
							"data"=>$data,
							"length"=>$length
						),200
					);
		}catch (Exception $e){
			$this->response(
						array(
							"status"=>false,
							"error"=>$e->getMessage(),
							"length"=>0
						),400
					);
		}
	}

	public function assignment_detail_get($id){
		try{
			$data = $this->Assignment_model->searchnm($id);
			$length = count($data);
			$this->response(
						array(
							"status"=>true,
							"data"=>$data,
							"length"=>$length
						),200
					);
		}catch (Exception $e){
			$this->response(
						array(
							"status"=>false,
							"error"=>$e->getMessage(),
							"length"=>0
						),400
					);
		}
	}

	public function get_assignment_post(){
		try{
			$id = $this->input->post('id'); //assignment_id
			$user_id = $this->input->post('mystery_shopper_id');
			$data = array(
            'mysteryShopper_id' => $this->input->post('mystery_shopper_id'),
            'mysteryShopper_assignment_status' => 'Working',
        );

        $takenAssignment = array(
            'takenAssignment' => $this->input->post('takenAssignment'),
        );
		$this->User_model->update($user_id,$takenAssignment);
		$this->Assignment_model->update($id,$data);

		$shopper_assignment = array(
			'shopper_id'=>$this->input->post('mystery_shopper_id'),
			'assignment_id'=>$id,
			'status' => 'Working',
		);
		print_r($shopper_assignment);
		$this->Shopper_Assignment->add($shopper_assignment);

			$length = count($data);
			$this->response(
						array(
							"status"=>true,
							"data"=>$data,
							"length"=>$length
						),200
					);
		}catch (Exception $e){
			$this->response(
						array(
							"status"=>false,
							"error"=>$e->getMessage(),
							"length"=>0
						),400
					);
		}
	}

public function get_client_from_user_id_post(){
		try{
			$id = $this->input->post('id'); //user_id


        $data = $this->Client_model->search_by_user_id($id);

			$length = count($data);
			$this->response(
						array(
							"status"=>true,
							"data"=>$data,
							"length"=>$length
						),200
					);
		}catch (Exception $e){
			$this->response(
						array(
							"status"=>false,
							"error"=>$e->getMessage(),
							"length"=>0
						),400
					);
		}
	}


	public function get_client_assignments_from_user_id_post(){
		try{
			$id = $this->input->post('id'); //client_id


        $data = $this->Assignment_model->get_all_client_assignments($id);

			$length = count($data);
			$this->response(
						array(
							"status"=>true,
							"data"=>$data,
							"length"=>$length
						),200
					);
		}catch (Exception $e){
			$this->response(
						array(
							"status"=>false,
							"error"=>$e->getMessage(),
							"length"=>0
						),400
					);
		}
	}

	// public function allOutlets_get(){
	// 	try{
	// 		$data = $this->outlet_model->getAllOutlets($this->get('param'));
	// 		$length = count($data);
	// 		$this->response(
	// 					array(
	// 						"status"=>true,
	// 						"data"=>$data,
	// 						"length"=>$length
	// 					),200
	// 				);
	// 	}catch (Exception $e){
	// 		$this->response(
	// 					array(
	// 						"status"=>false,
	// 						"error"=>$e->getMessage(),
	// 						"length"=>0
	// 					),400
	// 				);
	// 	}
	// }

	// public function allParams_get(){
	// 	try{
	// 		$data = $this->outlet_model->getAllParams($this->get('sap_code'));
	// 		$length = count($data);
	// 		$this->response(
	// 				array(
	// 						"status"=>true,
	// 						"data"=>$data,
	// 						"length"=>$length
	// 				),200
	// 		);
	// 	}catch (Exception $e){
	// 		$this->response(
	// 				array(
	// 						"status"=>false,
	// 						"error"=>$e->getMessage(),
	// 						"length"=>0
	// 				),400
	// 		);
	// 	}
	// }

	// public function details_get(){
	// 	try{
	// 		$data = $this->outlet_model->getAllParams($this->get('sap_code'));

	// 		$arr = array();
	// 		$i=0;
	// 		$j=0;
	// 		$k=0;
	// 		$nfr = array();
	// 		$facility = array();
	// 		$product = array();

	// 		foreach($data as $row){
	// 			$arr['name_of_outlets'] = $row['name_of_outlets'];
	// 			$arr['address'] = $row['address'];
	// 			if ($row['search_param']=='HSD' || $row['search_param']=='PMG' || $row['search_param']=='CNG' || $row['search_param']=='HOBC' || $row['search_param']=='E-10'){
	// 				$param = array('param'=>$row['search_param'],'path'=>base_url('images/'.$row['search_param'].'.png'));
	// 				$product[$i] = $param;
	// 				$i++;
	// 			}else if ($row['search_param']=='ATM' || $row['search_param']=='Restaurants' || $row['search_param']=='Business Centre' || $row['search_param']=='Shop Stop' ){
	// 				if ($row['search_param']=='Restaurants'){
	// 					if ($this->get('sap_code')=='101606'){
	// 						$param = array('param'=>$row['search_param'],'path'=>base_url('images/Subway.png'));
	// 					}else {
	// 						$param = array('param'=>$row['search_param'],'path'=>base_url('images/Walls.png'));
	// 					}
	// 				}else{
	// 					$param = array('param'=>$row['search_param'],'path'=>base_url('images/'.$row['search_param'].'.png'));
	// 				}
	// 				$nfr[$j] = $param;
	// 				$j++;
	// 			}else if ($row['search_param']=='Mosque' || $row['search_param']=='Car Wash' || $row['search_param']=='Cards' || $row['search_param']=='QOCM' || $row['search_param']=='Speedy Oil Change' || $row['search_param']=='Tyre Shop'){
	// 				$param = array('param'=>$row['search_param'],'path'=>base_url('images/'.$row['search_param'].'.png' ));
	// 				$facility[$k] = $param;
	// 				$k++;
	// 			}
	// 		}

	// 		$arr['nfr'] = $nfr;
	// 		$arr['product'] = $product;
	// 		$arr['facility'] = $facility;

	// 		$length = count($data);

	// 		$this->response(
	// 				array(
	// 						"status"=>true,
	// 						"data"=>$arr,
	// 						"length"=>$length
	// 				),200
	// 		);
	// 	}catch (Exception $e){
	// 		$this->response(
	// 				array(
	// 						"status"=>false,
	// 						"error"=>$e->getMessage(),
	// 						"length"=>0
	// 				),400
	// 		);
	// 	}
	// }

	// public function allAtmOutlets_get(){
	// 	try{
	// 		$data = $this->outlet_model->getAllAtmOutlets();
	// 		$length = count($data);
	// 		$this->response(
	// 				array(
	// 						"status"=>true,
	// 						"data"=>$data,
	// 						"length"=>$length
	// 				),200
	// 		);
	// 	}catch (Exception $e){
	// 		$this->response(
	// 				array(
	// 						"status"=>false,
	// 						"error"=>$e->getMessage(),
	// 						"length"=>0
	// 				),400
	// 		);
	// 	}
	// }

	// public function all247Outlets_get(){
	// 	try{
	// 		$data = $this->outlet_model->getAll247Outlets();
	// 		$length = count($data);
	// 		$this->response(
	// 				array(
	// 						"status"=>true,
	// 						"data"=>$data,
	// 						"length"=>$length
	// 				),200
	// 		);
	// 	}catch (Exception $e){
	// 		$this->response(
	// 				array(
	// 						"status"=>false,
	// 						"error"=>$e->getMessage(),
	// 						"length"=>0
	// 				),400
	// 		);
	// 	}
	// }

	// public function allCngOutlets_get(){
	// 	try{
	// 		$data = $this->outlet_model->getAllCngOutlets();
	// 		$length = count($data);
	// 		$this->response(
	// 				array(
	// 						"status"=>true,
	// 						"data"=>$data,
	// 						"length"=>$length
	// 				),200
	// 		);
	// 	}catch (Exception $e){
	// 		$this->response(
	// 				array(
	// 						"status"=>false,
	// 						"error"=>$e->getMessage(),
	// 						"length"=>0
	// 				),400
	// 		);
	// 	}
	// }

	// public function allTyreShopOutlets_get(){
	// 	try{
	// 		$data = $this->outlet_model->getAllTyreShopOutlets();
	// 		$length = count($data);
	// 		$this->response(
	// 				array(
	// 						"status"=>true,
	// 						"data"=>$data,
	// 						"length"=>$length
	// 				),200
	// 		);
	// 	}catch (Exception $e){
	// 		$this->response(
	// 				array(
	// 						"status"=>false,
	// 						"error"=>$e->getMessage(),
	// 						"length"=>0
	// 				),400
	// 		);
	// 	}
	// }

	// public function allStopShopOutlets_get(){
	// 	try{
	// 		$data = $this->outlet_model->getAllStopShopOutlets();
	// 		$length = count($data);
	// 		$this->response(
	// 				array(
	// 						"status"=>true,
	// 						"data"=>$data,
	// 						"length"=>$length
	// 				),200
	// 		);
	// 	}catch (Exception $e){
	// 		$this->response(
	// 				array(
	// 						"status"=>false,
	// 						"error"=>$e->getMessage(),
	// 						"length"=>0
	// 				),400
	// 		);
	// 	}
	// }

	// public function allServiceStationOutlets_get(){
	// 	try{
	// 		$data = $this->outlet_model->getAllServiceStationOutlets();
	// 		$length = count($data);
	// 		$this->response(
	// 				array(
	// 						"status"=>true,
	// 						"data"=>$data,
	// 						"length"=>$length
	// 				),200
	// 		);
	// 	}catch (Exception $e){
	// 		$this->response(
	// 				array(
	// 						"status"=>false,
	// 						"error"=>$e->getMessage(),
	// 						"length"=>0
	// 				),400
	// 		);
	// 	}
	// }
}

?>