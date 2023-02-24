<?php
/**
 * @entity SOY2Sample
 */
abstract class SOY2SampleDAO extends SOY2DAO {

	/**
	 * @return id
	 * @trigger onInsert
	 */
	abstract function insert(SOY2Sample $bean);

	/**
	 * @trigger onUpdate
	 */
	abstract function update(SOY2Sample $bean);

	/**
	 * @return list
	 * @query is_open = :isOpen
	 */
	abstract function get(int $isOpen);

	/**
	 * @return object
	 */
	abstract function getById(int $id);

	/**
	 * @final
	 */
	function onInsert(SOY2DAO_Query $query, array $binds){
		$binds[":createDate"] = time();
		$binds[":updateDate"] = time();
		return array($query, $binds);
	}

	/**
	 * @final
	 */
	function onUpdate(SOY2DAO_Query $query, array $binds){
		$binds[":updateDate"] = time();
		return array($query, $binds);
	}
}