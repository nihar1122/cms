<?php
/**
 * Identity Model Class
 *
 * @package    Gleez\User
 * @author     Gleez Team
 * @copyright  (c) 2011-2014 Gleez Technologies
 * @license    http://gleezcms.org/license
 */
class Model_Identity extends ORM {

	/**
	 * Table columns
	 * @var array
	 */
	protected $_table_columns = array(
		'id'            => array( 'type' => 'int' ),
		'user_id'       => array( 'type' => 'int' ),
		'recipient'     => array( 'type' => 'int' ),
		'provider'      => array( 'type' => 'string' ),
		'provider_id'   => array( 'type' => 'string' ),
		'refresh_token' => array( 'type' => 'string' ),
	);

	protected $_belongs_to = array(
		'user' => array('foreign_key' => 'user_id')
	);

	/**
	 * Validates that this identity is unique
	 * @param string URL to validate
	 * @return bool True if the URL is unique, false otherwise.
	 */
	public static function unique_identity($identity)
	{
		return (bool) DB::select(array(DB::expr('COUNT(provider)'), 'total'))
			->from('identities')
			->where('provider', '=', $identity)
			->execute()
			->get('total');
	}

	public function login()
	{

	}
}
