<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hop_custom_members_listing_mcp
{
	public function index()
	{

	}

	public function fetch_members_data()
	{
		$members_ids = ee()->input->post('m_ids');
		// var_dump($members_ids);
		$query = ee()->db->select('*')
			->from('member_data')
			->where_in('member_id', $members_ids)
			->get();

		$member_custom_data = array();
		foreach ($query->result() as $row)
		{
			$member_data = array(
				'first_name' => $row->m_field_id_5,
				'last_name' => $row->m_field_id_4,
			);
			$member_custom_data[$row->member_id] = $member_data;
		}

		// Send that back as JSON
		header('Content-Type: application/json');
		echo json_encode($member_custom_data);
		exit();
	}
}