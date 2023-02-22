<?php
/**
 * @entity SOY2Sample
 */
abstract class SOY2SampleDAO extends SOY2DAO {

	/**
	 * @return id
	 */
	abstract function insert(SOY2Sample $bean);

	abstract function update(SOY2Sample $bean);

	abstract function get();

	/**
	 * @return object
	 */
	abstract function getById($id);
}