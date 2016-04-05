<?php

namespace BossEdu\Model\Map;

use BossEdu\Model\Instruction;
use BossEdu\Model\InstructionQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'instruction' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class InstructionTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'BossEdu.Model.Map.InstructionTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'instruction';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\BossEdu\\Model\\Instruction';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'BossEdu.Model.Instruction';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the id field
     */
    const COL_ID = 'instruction.id';

    /**
     * the column name for the class field
     */
    const COL_CLASS = 'instruction.class';

    /**
     * the column name for the start_date field
     */
    const COL_START_DATE = 'instruction.start_date';

    /**
     * the column name for the end_date field
     */
    const COL_END_DATE = 'instruction.end_date';

    /**
     * the column name for the event_code field
     */
    const COL_EVENT_CODE = 'instruction.event_code';

    /**
     * the column name for the lecture_code field
     */
    const COL_LECTURE_CODE = 'instruction.lecture_code';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Class', 'StartDate', 'EndDate', 'EventCode', 'LectureCode', ),
        self::TYPE_CAMELNAME     => array('id', 'class', 'startDate', 'endDate', 'eventCode', 'lectureCode', ),
        self::TYPE_COLNAME       => array(InstructionTableMap::COL_ID, InstructionTableMap::COL_CLASS, InstructionTableMap::COL_START_DATE, InstructionTableMap::COL_END_DATE, InstructionTableMap::COL_EVENT_CODE, InstructionTableMap::COL_LECTURE_CODE, ),
        self::TYPE_FIELDNAME     => array('id', 'class', 'start_date', 'end_date', 'event_code', 'lecture_code', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Class' => 1, 'StartDate' => 2, 'EndDate' => 3, 'EventCode' => 4, 'LectureCode' => 5, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'class' => 1, 'startDate' => 2, 'endDate' => 3, 'eventCode' => 4, 'lectureCode' => 5, ),
        self::TYPE_COLNAME       => array(InstructionTableMap::COL_ID => 0, InstructionTableMap::COL_CLASS => 1, InstructionTableMap::COL_START_DATE => 2, InstructionTableMap::COL_END_DATE => 3, InstructionTableMap::COL_EVENT_CODE => 4, InstructionTableMap::COL_LECTURE_CODE => 5, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'class' => 1, 'start_date' => 2, 'end_date' => 3, 'event_code' => 4, 'lecture_code' => 5, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('instruction');
        $this->setPhpName('Instruction');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\BossEdu\\Model\\Instruction');
        $this->setPackage('BossEdu.Model');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('instruction_id_seq');
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('class', 'Class', 'INTEGER', false, null, 1);
        $this->addColumn('start_date', 'StartDate', 'DATE', true, null, null);
        $this->addColumn('end_date', 'EndDate', 'DATE', true, null, null);
        $this->addForeignKey('event_code', 'EventCode', 'VARCHAR', 'el_have', 'event_code', true, 15, null);
        $this->addForeignKey('lecture_code', 'LectureCode', 'VARCHAR', 'el_have', 'lecture_code', true, 15, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ElHave', '\\BossEdu\\Model\\ElHave', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':event_code',
    1 => ':event_code',
  ),
  1 =>
  array (
    0 => ':lecture_code',
    1 => ':lecture_code',
  ),
), null, null, null, false);
        $this->addRelation('PiLink', '\\BossEdu\\Model\\PiLink', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':instruction_id',
    1 => ':id',
  ),
), null, null, 'PiLinks', false);
        $this->addRelation('PiStatus', '\\BossEdu\\Model\\PiStatus', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':instruction_id',
    1 => ':id',
  ),
), null, null, 'PiStatuses', false);
        $this->addRelation('IsrLink', '\\BossEdu\\Model\\IsrLink', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':instruction_id',
    1 => ':id',
  ),
), null, null, 'IsrLinks', false);
        $this->addRelation('MiMaterial', '\\BossEdu\\Model\\MiMaterial', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':instruction_id',
    1 => ':id',
  ),
), null, null, 'MiMaterials', false);
        $this->addRelation('Presentation', '\\BossEdu\\Model\\Presentation', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':instruction_id',
    1 => ':id',
  ),
), null, null, 'Presentations', false);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }
    
    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? InstructionTableMap::CLASS_DEFAULT : InstructionTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Instruction object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = InstructionTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = InstructionTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + InstructionTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = InstructionTableMap::OM_CLASS;
            /** @var Instruction $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            InstructionTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();
    
        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = InstructionTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = InstructionTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Instruction $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                InstructionTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(InstructionTableMap::COL_ID);
            $criteria->addSelectColumn(InstructionTableMap::COL_CLASS);
            $criteria->addSelectColumn(InstructionTableMap::COL_START_DATE);
            $criteria->addSelectColumn(InstructionTableMap::COL_END_DATE);
            $criteria->addSelectColumn(InstructionTableMap::COL_EVENT_CODE);
            $criteria->addSelectColumn(InstructionTableMap::COL_LECTURE_CODE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.class');
            $criteria->addSelectColumn($alias . '.start_date');
            $criteria->addSelectColumn($alias . '.end_date');
            $criteria->addSelectColumn($alias . '.event_code');
            $criteria->addSelectColumn($alias . '.lecture_code');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(InstructionTableMap::DATABASE_NAME)->getTable(InstructionTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(InstructionTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(InstructionTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new InstructionTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Instruction or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Instruction object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InstructionTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \BossEdu\Model\Instruction) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(InstructionTableMap::DATABASE_NAME);
            $criteria->add(InstructionTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = InstructionQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            InstructionTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                InstructionTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the instruction table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return InstructionQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Instruction or Criteria object.
     *
     * @param mixed               $criteria Criteria or Instruction object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InstructionTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Instruction object
        }

        if ($criteria->containsKey(InstructionTableMap::COL_ID) && $criteria->keyContainsValue(InstructionTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.InstructionTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = InstructionQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // InstructionTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
InstructionTableMap::buildTableMap();
