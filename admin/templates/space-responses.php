<?php

	// MULTIPLE DELETION
	if( isset( $_POST['action'] ) && $_POST['action'] == 'trash' && isset( $_POST['guests'] ) && is_array( $_POST['guests'] ) && count( $_POST['guests'] ) ){
		$guest_ids = $_POST['guests'];
		SPACE_DB_GUEST::getInstance()->delete_rows( $_POST['guests'] );
	}

	$url = admin_url( 'admin.php?page='.$_GET['page'] );
	$url_has_changed = false;

	if( isset( $_POST['filter_by_survey'] ) && $_POST['filter_by_survey'] ){
		$url .= '&survey='.$_POST['filter_by_survey'];
		$url_has_changed = true;
	}

	if( isset( $_POST['s'] ) && $_POST['s']  ){
		$url .= '&s='.$_POST['s'];
		$url_has_changed = true;
	}

	if( $url_has_changed ){
		_e("<script>location.href='$url';</script>");
	}

?>
<h1 class='wp-heading-inline'>Responses</h1>
<form action="<?php _e( $url );?>" method="POST" data-behaviour="space-form-table">
<?php

	$data = array();

	$spaceResponsesTable = new SPACE_RESPONSES_LIST_TABLE;

	$spaceResponsesTable->prepare_items();

	$spaceResponsesTable->search_box( 'Search', 'search-id' );

	$spaceResponsesTable->display();

?>
</form>
