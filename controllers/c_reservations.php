<?php
class reservations_controller extends base_controller {

    public function __construct() {
        parent::__construct();

        # Make sure user is logged in if they want to use anything in this controller
        if(!$this->user) {
            die("Members only. <a href='/users/login'>Login</a>");
        }
    }

    public function add($error = NULL) {

        # Setup view to add
        $this->template->content = View::instance('v_reservations_add');
        $this->template->title   = "New Reservation";

        # Pass error data to the view
            $this->template->content->error = $error;

        # Render template
        echo $this->template;

    }

    public function p_add() {

         if(empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['pickup_time']) || empty($_POST['pickup_location'])
			 || empty($_POST['dropoff_location'])) {
            Router::redirect("/reservations/add/error");
            //   echo 'Please fill all fields and submit again';
        }
        else {

        # Associate this reservation with this user
        $_POST['user_id']  = $this->user->user_id;
        $_POST['pickup_time'] = date("Y-m-d H:i:s", $_POST['pickup_time']);

        # Unix timestamp of when this reservation was created / modified
        $_POST['created']  = Time::now();
        $_POST['modified'] = Time::now();

        # Insert
        # Note we didn't have to sanitize any of the $_POST data because we're using the insert method which does it for us
        DB::instance(DB_NAME)->insert('reservations', $_POST);

        # Quick and dirty feedback
        //echo "Your reservation has been added. <a href='/reservations/add'> Do you want to add another reservation ? </a>";

        # To view list of active reservations
        Router::redirect("/reservations/reservations");

    }
    }




    public function reservations() {

    # Set up the View
    $this->template->content = View::instance("v_reservations_reservations");
    $this->template->title   = "Reservations";

    # Build the query to get all the users
   // $q = "SELECT *     FROM reservations";

	  $q = "SELECT *
        FROM reservations
        WHERE user_id = ".$this->user->user_id." order by reservation_id desc";

    # Execute the query to get all the users.
    # Store the result array in the variable $users
    $reservations = DB::instance(DB_NAME)->select_rows($q);

    # Build the query to figure out what reservations does this user already have?
    # I.e. who are they following
    $q = "SELECT *
        FROM reservations
        WHERE user_id = ".$this->user->user_id;



    # Pass data (reservations) to the view
    $this->template->content->reservations       = $reservations;


    # Render the view
    echo $this->template;
    }


public function open($reservation_id) {

    # Set up the View
    $this->template->content = View::instance("v_reservations_index");
    $this->template->title   = "Reservations";

    # Build the query to get all the users
  // $q = "SELECT *        FROM reservations ";

		$q = "SELECT *
        FROM reservations
        WHERE reservation_id = ".$reservation_id;

    # Execute the query to get all the users.
    # Store the result array in the variable $users
    $reservations = DB::instance(DB_NAME)->select_rows($q);

    # Build the query to figure out what reservation does this user already have?
    # I.e. who are they following
    $q = "SELECT *
        FROM reservations
        WHERE reservation_id = ".$reservation_id;


    # Pass data (reservation) to the view
    $this->template->content->reservations       = $reservations;


    # Render the view
    echo $this->template;



}



}