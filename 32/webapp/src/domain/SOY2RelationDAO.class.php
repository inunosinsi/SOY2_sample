<?php
/**
 * @entity SOY2Relation
 */
abstract class SOY2RelationDAO extends SOY2DAO {

	abstract function insert(SOY2Relation $bean);

	/**
	 * @query sample_id = sampleId
	 */
	abstract function update(SOY2Relation $bean);

	/**
	 * @return object
	 */
	abstract function getBySampleId(int $sampleId);
}