<?php
/**
 * @Author: Phu Hoang
 * @Date:   2016-07-08 01:39:31
 * @Last Modified by:   Phu Hoang
 * @Last Modified time: 2016-07-13 00:49:07
 */

$this->startSetup();

$table = $this->getConnection()
    ->newTable($this->getTable('paketid_booking/result'))
    ->addColumn(
        'entity_id',
        Varien_Db_Ddl_Table::TYPE_INTEGER,
        null,
        array(
            'identity'  => true,
            'nullable'  => false,
            'primary'   => true,
        ),
        'Boooking Result ID'
    )
    ->addColumn(
        'order_id',
        Varien_Db_Ddl_Table::TYPE_INTEGER,
        null,
        array(
            'unsigned'  => true,
            'nullable'  => false,
            'primary'   => true,
        ),
        'Order ID'
    )
    ->addColumn(
        'booking_id',
        Varien_Db_Ddl_Table::TYPE_INTEGER,
        null,
        array(
            'unsigned'  => true,
            'nullable'  => false,
            'primary'   => true,
        ),
        'Booking ID'
    )
    ->addColumn(
        'created_by_user_id',
        Varien_Db_Ddl_Table::TYPE_INTEGER,
        null,
        array(
            'unsigned'  => true,
            'nullable'  => false,
            'primary'   => true,
        ),
        'User ID From API'
    )
    ->addColumn(
        'from_full',
        Varien_Db_Ddl_Table::TYPE_TEXT, '64k',
        array(
            'nullable'  => false,
        ),
        'Full From-Address'
    )
    ->addColumn(
        'from_email',
        Varien_Db_Ddl_Table::TYPE_TEXT, 255,
        array(),
        'From Email'
    )
    ->addColumn(
        'from_name',
        Varien_Db_Ddl_Table::TYPE_TEXT, 255,
        array(),
        'From Name'
    )
    ->addColumn(
        'from_phone',
        Varien_Db_Ddl_Table::TYPE_TEXT, 255,
        array(),
        'From Phone'
    )
    ->addColumn(
        'from_address',
        Varien_Db_Ddl_Table::TYPE_TEXT, 255,
        array(),
        'From Address'
    )
    ->addColumn(
        'from_zip_code',
        Varien_Db_Ddl_Table::TYPE_TEXT, 255,
        array(),
        'From Zip Code'
    )
    ->addColumn(
        'from_country_code',
        Varien_Db_Ddl_Table::TYPE_TEXT, 255,
        array(),
        'From Country Code'
    )
    ->addColumn(
        'to_full',
        Varien_Db_Ddl_Table::TYPE_TEXT, '64k',
        array(
            'nullable'  => false,
        ),
        'Full To-Address'
    )
    ->addColumn(
        'to_email',
        Varien_Db_Ddl_Table::TYPE_TEXT, 255,
        array(),
        'To Email'
    )
    ->addColumn(
        'to_name',
        Varien_Db_Ddl_Table::TYPE_TEXT, 255,
        array(),
        'To Name'
    )
    ->addColumn(
        'to_phone',
        Varien_Db_Ddl_Table::TYPE_TEXT, 255,
        array(),
        'To Phone'
    )
    ->addColumn(
        'to_address',
        Varien_Db_Ddl_Table::TYPE_TEXT, 255,
        array(),
        'To Address'
    )
    ->addColumn(
        'to_zip_code',
        Varien_Db_Ddl_Table::TYPE_TEXT, 255,
        array(),
        'To Zip Code'
    )
    ->addColumn(
        'to_country_code',
        Varien_Db_Ddl_Table::TYPE_TEXT, 255,
        array(),
        'To Country Code'
    )
    ->addColumn(
        'note',
        Varien_Db_Ddl_Table::TYPE_TEXT, '64k',
        array(
            'nullable'  => false,
        ),
        'Note'
    )
    ->addColumn(
        'content',
        Varien_Db_Ddl_Table::TYPE_TEXT, '64k',
        array(
            'nullable'  => false,
        ),
        'Content'
    )
    ->addColumn(
        'message',
        Varien_Db_Ddl_Table::TYPE_TEXT, '64k',
        array(
            'nullable'  => false,
        ),
        'Message'
    )
    ->addColumn(
        'image',
        Varien_Db_Ddl_Table::TYPE_TEXT, 255,
        array(),
        'Image'
    )
    ->addColumn(
        'insured_value',
        Varien_Db_Ddl_Table::TYPE_DECIMAL, '14,2',
        array(
           'default'=>0
        ),
        'Insured Value'
    )
    ->addColumn(
        'max_tariff',
        Varien_Db_Ddl_Table::TYPE_DECIMAL, '14,2',
        array(
           'default'=>0
        ),
        'Max Tariff'
    )
    ->addColumn(
        'booking_code',
        Varien_Db_Ddl_Table::TYPE_TEXT, 255,
        array(),
        'Booking Code'
    )
    ->addColumn(
        'reference_code',
        Varien_Db_Ddl_Table::TYPE_TEXT, 255,
        array(),
        'Reference Code'
    )
    ->addColumn(
        'booking_date',
        Varien_Db_Ddl_Table::TYPE_DATE, null,
        array(),
        'Booking Date'
    )
    ->addColumn(
        'expiry_date',
        Varien_Db_Ddl_Table::TYPE_DATE, null,
        array(),
        'Expiry Date'
    )
    ->addColumn(
        'status',
        Varien_Db_Ddl_Table::TYPE_SMALLINT, null,
        array(),
        'Status'
    )
    ->addColumn(
        'created_from',
        Varien_Db_Ddl_Table::TYPE_TEXT, 255,
        array(),
        'Created From'
    )
    ->addColumn(
        'created_on',
        Varien_Db_Ddl_Table::TYPE_DATETIME,
        null,
        array(),
        'Created On'
    )
    ->addColumn(
        'updated_on',
        Varien_Db_Ddl_Table::TYPE_DATETIME,
        null,
        array(),
        'Updated On'
    )
    ->addIndex(
        $this->getIdxName(
            'paketid_booking/result',
            array('order_id')
        ),
        array('order_id')
    )
    ->addForeignKey(
        $this->getFkName(
            'paketid_booking/result',
            'order_id',
            'sales/order',
            'entity_id'
        ),
        'order_id',
        $this->getTable('sales/order'),
        'entity_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE,
        Varien_Db_Ddl_Table::ACTION_CASCADE
    )
    ->setComment('Booking Result Table');

$this->getConnection()->createTable($table);

$this->endSetup();