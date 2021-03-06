<?php
/**
 * Created by PhpStorm.
 */

/**
 * Concrete Item for Shop_Cart Class
 *
 * @author domenico domenico@translated.net / ostico@gmail.com
 * Date: 15/04/14
 * Time: 15.17
 *
 */
class Shop_ItemHTSQuoteJob extends Shop_AbstractItem {

    /**
     * These items will be the only accepted in setOffset/unsetOffset methods and ArrayAccess
     *
     * @see Shop_AbstractItem::$__storage
     * @see Shop_AbstractItem::offsetSet
     * @see Shop_AbstractItem::offsetUnset
     *
     * @var array
     */
    protected $__storage = array(
            'id'             => null,
            'quantity'       => 1,
            'project_name'   => null,
            'name'           => null,
            'quote_pid'      => null,
            'source'         => null,
            'target'         => null,
            'price'          => 0,
            'price_currency' => 0,
            'words'          => 0,
            'show_info'      => null,
            'delivery_date'  => null,
            'currency'       => 'EUR',
            'timezone'       => '0',
            'subject'        => 'general'
    );

    /**
     *
     * Because of compatibility with php 5.2 we can't use late static bindings in the abstract class ( introduced in php 5.3 )
     *
     * So we can't use 'new static' reserved word, we have to use 'new self'
     *
     * Workaround: declare this method into an interface, don't implement it in the abstract class
     * and declare real method every time in the same manner into the children
     *
     * @param $storage
     *
     * @return mixed
     *
     * @throws LogicException/DomainException
     */
    public static function getInflate( $storage ){
        $obj = new self();
        foreach( $storage as $key => $value ){
            $obj->offsetSet( $key, $value );
        }
        return $obj;
    }

}