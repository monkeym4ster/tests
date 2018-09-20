<?php
/**
 * 迭代器模式 （Iterator），又叫做游标（Cursor）模式。
 * 另外，当需要对聚集有多种方式遍历时，可以考虑去使用迭代器模式。
 *
 * 提供一种方法访问一个容器（Container）对象中各个元素，而又不需暴露该对象的内部细节。
 * 当你需要访问一个聚合对象，而且不管这些对象是什么都需要遍历的时候，就应该考虑使用迭代器模式。
 * 迭代器模式为遍历不同的聚集结构提供如开始、下一个、是否结束、当前哪一项等统一的接口。
 *
 * php标准库（SPL）中提供了迭代器接口 Iterator，要实现迭代器模式，实现该接口即可。
 */

class Sample implements Iterator
{
    private $_items;

    public function __construct($items)
    {
        $this->_items = $items;
    }

    public function current()
    {
        // TODO: Implement current() method.
        return current($this->_items);
    }

    public function next()
    {
        // TODO: Implement next() method.
        next($this->_items);
    }

    public function key()
    {
        // TODO: Implement key() method.
        return key($this->_items);
    }

    public function valid()
    {
        // TODO: Implement valid() method.
        return ($this->current() !== false);
    }

    public function rewind()
    {
        // TODO: Implement rewind() method.
        var_dump($this->_items);
        return reset($this->_items);
    }
}

//client
$data = [1, 2, 3];
$sa = new Sample($data);
print_r($sa);
foreach ($sa as $key => $value) {
    echo "$key:$value\n";
}
