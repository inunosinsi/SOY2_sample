<?php
/**
 * @entity User
 */
abstract class UserDAO extends SOY2DAO {

	/**
	 * @return id
	 * @trigger onInsert
	 */
	abstract function insert(User $bean);

	/**
	 * @trigger onUpdate
	 */
	abstract function update(User $bean);

	/**
	 * @return list
	 */
	abstract function get();

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