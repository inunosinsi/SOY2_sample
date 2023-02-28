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
	 * @group is_open
	 * @having count(is_open) > 2
	 */
	abstract function get();

	/**
	 * @return object
	 */
	abstract function getById(int $id);

	/**
	 * @return list
	 */
	abstract function getByIsOpen(int $isOpen);

	/**
	 * @columns count(*) as object_count
	 * @return column_object_count
	 */
	abstract function count();

	/**
	 * @columns count(*) as object_count
	 * @return column_object_count
	 */
	abstract function countByIsOpen(int $isOpen);

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