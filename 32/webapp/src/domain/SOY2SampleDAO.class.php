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
	 * @return array
	 */
	function getOpenStatusList(){
		$sql = "SELECT is_open, COUNT(is_open) AS count_is_open FROM soy2_sample GROUP BY is_open";
		try{
			$results = $this->executeQuery($sql);
		}catch(Exception $e){
			$results = array();
		}
		if(!count($results)) return array();
		
		$list = array();
		foreach($results as $res){
			$list[$res["is_open"]] = $res["count_is_open"];
		}
		return $list;
	}

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